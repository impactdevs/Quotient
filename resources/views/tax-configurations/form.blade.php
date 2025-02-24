<div class="row mb-3">
    <div class="col-md-12">
        <x-forms.input name="min_amount" label="Minimum Amount" type="number" id="min_amount"
            placeholder="Enter Minimum Amount" value="{{ old('min_amount', $taxConfiguration->min_amount ?? '') }}" />
    </div>

    <div class="col-md-12">
        <x-forms.input name="max_amount" label="Maximum Amount" type="number" id="max_amount"
            placeholder="Enter Maximum Amount" value="{{ old('max_amount', $taxConfiguration->max_amount ?? '') }}" />
    </div>

    <div class="col-md-12">
        <x-forms.input name="rate" label="Rate" type="number" id="rate"
            placeholder="Enter Rate" value="{{ old('rate', $taxConfiguration->rate ?? '') }}" />
    </div>

    <div class="col-md-6">
        <x-forms.input name="effective_date" label="Effective Date" type="date" id="effective_date"
            value="{{ old('effective_date', isset($taxConfiguration) && $taxConfiguration->effective_date ? $taxConfiguration->effective_date->toDateString() : '') }}" />
    </div>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
