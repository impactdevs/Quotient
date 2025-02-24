<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\PayrollRecord;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;



class PayrollController extends Controller
{
    // List all payroll records
    public function index(Request $request)
    {
        $query = PayrollRecord::with('employee')
            ->when($request->employee_id, function ($q) use ($request) {
                return $q->where('employee_id', $request->employee_id);
            })
            ->when($request->start_date, function ($q) use ($request) {
                return $q->where('end_pay_period', '>=', $request->start_date);
            })
            ->when($request->end_date, function ($q) use ($request) {
                return $q->where('start_pay_period', '<=', $request->end_date);
            })
            ->when($request->department_id, function ($q) use ($request) {
                return $q->whereHas('employee', function($q) use ($request) {
                    $q->where('department_id', $request->department_id);
                });
            })
            ->orderBy('created_at', 'desc');
    
        return view('pay-roll.index', [
            'payrollRecords' => $query->paginate(10),
            'employees' => Employee::orderBy('first_name')->get(),
            'departments' => Department::orderBy('department_name')->get()  // Fetch departments to display in the filter
        ]);
    }
    


    public function downloadPayslip(PayrollRecord $payroll)
    {
        $pdf = Pdf::loadView('pay-roll.show', compact('payroll'));
        return $pdf->download("payslip-{$payroll->pay_period}.pdf");
    }
}
