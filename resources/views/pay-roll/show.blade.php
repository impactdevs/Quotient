<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payslip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-center card-header">
                        <h3>{{ $companyName ?? 'Your Company Name' }}</h3>
                        <p>{{ $companyAddress ?? 'Company Address' }}</p>
                        <h4>Payroll Payslip</h4>
                        <p>{{ $payroll->start_pay_period->format('d M Y') }} -
                            {{ $payroll->end_pay_period->format('d M Y') }}</p>
                    </div>
                    <div class="card-body">
                        <!-- Payment Information -->
                        <div class="mb-4 row">
                            <div class="col-md-6">
                                <p><strong>Payment Type:</strong> Salary</p>
                                <p><strong>Payment Date:</strong> {{ now()->format('d M Y') }}</p>
                            </div>
                            <div class="text-right col-md-6">
                                <p><strong>Employee ID:</strong> {{ $payroll->employee_id }}</p>
                                <p><strong>Employee Name:</strong>
                                    {{ $payroll->employee->first_name . ' ' . $payroll->employee->last_name }}</p>
                                <p><strong>Department:</strong> {{ optional($payroll->employee->department)->department_name }}
                                </p>
                                <p><strong>Position:</strong> {{ optional($payroll->employee->position)->position_name }}</p>
                            </div>
                        </div>

                        <!-- Earnings and Deductions Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Amount (UGX)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Earnings -->
                                    <tr>
                                        <td><strong>Earnings</strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Gross Salary</td>
                                        <td>{{ number_format($payroll->gross_salary, 2) }}</td>
                                    </tr>

                                    <!-- Deductions -->
                                    <tr>
                                        <td><strong>Deductions</strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>PAYE</td>
                                        <td>{{ number_format($payroll->paye, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>NSSF Employee Contribution</td>
                                        <td>{{ number_format($payroll->nssf_employee, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>NSSF Employer Contribution</td>
                                        <td>{{ number_format($payroll->nssf_employer, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Net Salary</strong></td>
                                        <td><strong>{{ number_format($payroll->net_salary, 2) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Footer with Company Info -->
                        <div class="mt-4 row">
                            <div class="col-6">
                                <p><strong>Company Contact:</strong>
                                    {{ $companyContact ?? 'Company Contact Information' }}</p>
                            </div>
                            <div class="text-right col-6">
                                <p><strong>Signature:</strong> ___________________</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
