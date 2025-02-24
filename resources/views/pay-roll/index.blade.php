<x-app-layout>
    <div class="container mt-1 h-100">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('pay-roll.index') }}">
                    <div class="row mb-3 align-items-end">
                        <div class="col-md-2">
                            <label>Employee</label>
                            <select name="employee_id" class="form-select">
                                <option value="">All Employees</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->employee_id }}"
                                        {{ request('employee_id') == $employee->employee_id ? 'selected' : '' }}>
                                        {{ $employee->first_name }} {{ $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Department</label>
                            <select name="department_id" class="form-select">
                                <option value="">All Departments</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_id }}"
                                        {{ request('department_id') == $department->department_id ? 'selected' : '' }}>
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control"
                                value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            <a href="{{ route('pay-roll.index') }}" class="btn btn-secondary">Clear</a>
                            <a href="{{ route('pay-roll.export') }}" class="btn btn-success">Export</a>
                        </div>
                    </div>
                </form>


                <!-- Payroll Table -->
                <table class="table table-hover">
                    <!-- Table header remains the same -->
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th colspan="2">Pay Period</th>
                            <th>Gross Salary (UGX)</th>
                            <th>PAYE (UGX)</th>
                            <th>NSSF Employee (UGX)</th>
                            <th>Net Salary (UGX)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table body remains the same -->
                        @foreach ($payrollRecords as $record)
                            <tr>
                                <td>{{ $record->employee->first_name . ' ' . $record->employee->last_name }}</td>
                                <td><span class="d-block">{{ $record->start_pay_period->format('Y-m-d') }}</span></td>
                                <td><span class="d-block">{{ $record->end_pay_period->format('Y-m-d') }}</span></td>
                                <td>{{ number_format($record->gross_salary) }}</td>
                                <td>{{ number_format($record->paye) }}</td>
                                <td>{{ number_format($record->nssf_employee) }}</td>
                                <td>{{ number_format($record->net_salary) }}</td>
                                <td>
                                    <a href="{{ route('payroll.payslip', $record->id) }}"
                                        class="btn btn-sm btn-info">Payslip</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $payrollRecords->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
