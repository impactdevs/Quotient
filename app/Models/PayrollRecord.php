<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaxConfiguration;
use Illuminate\Support\Facades\DB;

class PayrollRecord extends Model
{
    protected $fillable = [
        'employee_id',
        'gross_salary',
        'paye',
        'nssf_employee',
        'nssf_employer',
        'net_salary',
        'start_pay_period',
        'end_pay_period'
    ];

    // If you want to use casts for certain attributes
    protected $casts = [
        'start_pay_period' => 'date',
        'end_pay_period' => 'date'
    ];

    

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    // Get current NSSF settings
    protected static function getNssfSettings()
    {
        static $settings = null;

        if ($settings === null) {
            $settings = DB::table('general_settings')
                ->orderBy('created_at', 'desc')
                ->first();
        }

        return $settings;
    }

    // Calculate all payroll components at once
    public static function calculateAll($grossSalary)
    {
        $settings = self::getNssfSettings();
        $taxBrackets = TaxConfiguration::where('effective_date', '<=', now())->get();

        $employeeNssf = self::calculateEmployeeNssf($grossSalary, $settings);
        $employerNssf = self::calculateEmployerNssf($grossSalary, $settings);
        $taxableIncome = self::calculateTaxableIncome($grossSalary, $employeeNssf);
        $paye = self::calculatePaye($taxableIncome, $taxBrackets);

        return [
            'paye' => $paye,
            'nssf_employee' => $employeeNssf,
            'nssf_employer' => $employerNssf,
            'net_salary' => $grossSalary - $paye - $employeeNssf,
        ];
    }

    // Uganda PAYE Calculation
    protected static function calculatePaye($taxableIncome, $taxBrackets)
    {
        $paye = 0;
        $remaining = $taxableIncome;

        foreach ($taxBrackets as $bracket) {
            if ($remaining <= 0) break;

            $bracketMax = $bracket->max_amount ?? PHP_INT_MAX;
            $taxableInBracket = min($remaining, $bracketMax - $bracket->min_amount);

            $paye += $taxableInBracket * ($bracket->rate / 100);
            $remaining -= $taxableInBracket;
        }

        return round($paye);
    }

    // NSSF Calculations
    public static function calculateEmployeeNssf($grossSalary, $settings = null)
    {
        $settings = $settings ?? self::getNssfSettings();
        return round(min($grossSalary, $settings->nssf_cap) * ($settings->employee_nssf_rate / 100));
    }

    public static function calculateEmployerNssf($grossSalary, $settings = null)
    {
        $settings = $settings ?? self::getNssfSettings();
        return round(min($grossSalary, $settings->nssf_cap) * ($settings->employer_nssf_rate / 100));
    }

    // Taxable Income Calculation
    public static function calculateTaxableIncome($grossSalary, $employeeNssf)
    {
        return $grossSalary - $employeeNssf;
    }
}
