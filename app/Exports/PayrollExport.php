<?php

namespace App\Exports;

use App\Models\PayrollRecord;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayrollExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return PayrollRecord::with('employee')->get();
    }

    public function headings(): array
    {
        return [
            'Employee Name',
            'Start Pay Period',
            'End Pay Period',
            'Gross Salary (UGX)',
            'PAYE (UGX)',
            'NSSF Employee (UGX)',
            'Net Salary (UGX)',
        ];
    }

    public function map($payrollRecord): array
    {
        return [
            $payrollRecord->employee->first_name . ' ' . $payrollRecord->employee->last_name,
            $payrollRecord->start_pay_period->format('Y-m-d'),
            $payrollRecord->end_pay_period->format('Y-m-d'),
            number_format($payrollRecord->gross_salary),  // Format numbers
            number_format($payrollRecord->paye),
            number_format($payrollRecord->nssf_employee),
            number_format($payrollRecord->net_salary),
        ];
    }

    // Optional: Set column widths
    public function columnWidths(): array
    {
        return [
            'A' => 25,  // Employee Name
            'B' => 20,  // Start Date
            'C' => 20,  // End Date
            'D' => 20,  
            'E' => 15,
            'F' => 20,
            'G' => 20,
        ];
    }
}