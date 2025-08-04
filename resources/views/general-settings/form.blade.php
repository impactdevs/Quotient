<div class="row mb-3">
    <div class="col-md-12">
        <x-forms.input name="nssf_cap" label="NSSF Cap" type="number" id="nssf_cap" placeholder="Enter NSSF Cap"
            value="{{ old('nssf_cap', $generalSetting->nssf_cap ?? '') }}" />
    </div>

    <div class="col-md-12">
        <x-forms.input name="employee_nssf_rate" label="Employee nssf rate" type="number" id="employee_nssf_rate"
            placeholder="Enter Employee nssf rate"
            value="{{ old('employee_nssf_rate', $generalSetting->employee_nssf_rate ?? '') }}" />
    </div>

    <div class="col-md-12">
        <x-forms.input name="employer_nssf_rate" label="Employer NSSF Rate" type="number" id="rate"
            placeholder="Employer NSSF Rate"
            value="{{ old('employer_nssf_rate', $generalSetting->employer_nssf_rate ?? '') }}" />
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
