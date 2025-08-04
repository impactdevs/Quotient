<x-app-layout>
    <div class="">
        <h5 class="text-center mt-5">General Settings</h5>
        <div class="mt-3">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>NSSF Cap</th>
                        <td>
                            {{ Number::currency($settings->nssf_cap) }}
                        </td>
                    </tr>

                    <tr>
                        <th>Employee NSSF Rate</th>
                        <td>
                            {{ Number::percentage($settings->employee_nssf_rate) }}
                        </td>
                    </tr>

                    <tr>
                        <th>Employer NSSF Rate</th>
                        <td>
                            {{ Number::percentage($settings->employer_nssf_rate) }}
                        </td>
                    </tr>

                    <tr>
                        <th>Payroll Frequency</th>
                        <td>
                            {{ $settings->payroll_frequency }}
                        </td>
                    </tr>

                        <tr>
                            <th>Actions</th>
                            <td>
                                <a href="{{ route('general-settings.edit', $settings->id) }}"
                                    class="btn btn-primary">Edit Settings</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
</x-app-layout>
