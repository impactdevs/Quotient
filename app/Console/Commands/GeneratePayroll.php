<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\PayrollRecord;
use App\Models\Scopes\EmployeeScope;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GeneratePayroll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-payroll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating payroll for your employees';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employees = DB::table('employees')->get();
        $currentDate = Carbon::now();
        $startPayPeriod = $currentDate->startOfMonth()->toDateString();
        $endPayPeriod = $currentDate->endOfMonth()->toDateString();

        foreach ($employees as $employee) {
            $grossSalary = $employee->basic_salary;

            $payrollComponents = PayrollRecord::calculateAll($grossSalary, $currentDate);

            PayrollRecord::create([
                'employee_id' => $employee->employee_id,
                'gross_salary' => $grossSalary,
                'paye' => $payrollComponents['paye'],
                'nssf_employee' => $payrollComponents['nssf_employee'],
                'nssf_employer' => $payrollComponents['nssf_employer'],
                'net_salary' => $payrollComponents['net_salary'],
                'start_pay_period' => $startPayPeriod,
                'end_pay_period' => $endPayPeriod,
            ]);

            $this->info("Payroll generated for {$employee->first_name} ({$employee->employee_id})");
        }

        $this->info("Payroll generation done");
    }
}