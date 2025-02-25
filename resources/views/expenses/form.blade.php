<div class="row mb-3">
    <div class="col-md-6">
        <x-forms.input name="date" label="Date" type="date" id="date"
            value="{{ old('date', isset($expense) && $expense->date ? $expense->date->toDateString() : '') }}" />
    </div>
    <div class="col-md-6">
        <x-forms.dropdown name="expense_type" label="Category" id="expense_type" :options="$expenses" :selected="$expense->expense_type ?? ''" />
    </div>
    <div class="col-md-6">
        <x-forms.text-area name="description" label="Expense Description" id="description" :value="old('description', $expense->description ?? '')" />
    </div>

    <div class="col-md-6">
        <x-forms.input name="amount" label="Amount" type="text" id="amount" placeholder="Enter amount"
            value="{{ old('amount', $expense->amount ?? '') }}" />
    </div>

    <div class="col-md-6">
        <x-forms.upload name="receipt_path" label="Receipt" id="receipt_path"
            value="{{ old('receipt_path', $expense->receipt_path ?? '') }}" />
        <div id="receipt-path-preview" class="mt-3"></div> <!-- Preview container -->
    </div>
</div>

<div class="row border border-5 border-success">
    <p>Select what user categories the expense should be attached too.</p>

    <div class="mb-3 col">
        <label for="usertokenfield" class="form-label">Participants</label>
        <input type="text" class="form-control" id="usertokenfield" />
        <input type="hidden" name="category[users]" id="user_ids" value="All" />
    </div>

    <div class="mb-3 col">
        <label for="departmenttokenfield" class="form-label">Departments</label>
        <input type="text" class="form-control" id="departmenttokenfield" />
        <input type="hidden" name="category[departments]" id="department_ids" />
    </div>

    <div class="mb-3 col">
        <label for="positiontokenfield" class="form-label">Positions</label>
        <input type="text" class="form-control" id="positiontokenfield" />
        <input type="hidden" name="category[positions]" id="position_ids" />
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            const users = @json($users);
            const departments = @json($departments);
            const positions = @json($positions);

            const userSource = Object.entries(users).map(([id, name]) => ({
                id,
                name
            }));
            const departmentSource = Object.entries(departments).map(([department_id, department_name]) => ({
                department_id,
                department_name
            }));
            const positionSource = Object.entries(positions).map(([position_id, position_name]) => ({
                position_id,
                position_name
            }));

            // Users Tokenfield
            $('#usertokenfield').tokenfield({
                autocomplete: {
                    source: userSource.map(user => user.name),
                    delay: 100
                },
                showAutocompleteOnFocus: true
            }).on('tokenfield:createtoken', function(event) {
                const token = event.attrs;
                const userId = userSource.find(user => user.name === token.value)?.id;
                if (userId) {
                    const currentIds = $('#user_ids').val().split(',').filter(Boolean);
                    currentIds.push(userId);
                    $('#user_ids').val(currentIds.join(','));
                }
            });

            // Departments Tokenfield
            $('#departmenttokenfield').tokenfield({
                autocomplete: {
                    source: departmentSource.map(department => department.department_name),
                    delay: 100
                },
                showAutocompleteOnFocus: true
            }).on('tokenfield:createtoken', function(event) {
                const token = event.attrs;
                const departmentId = departmentSource.find(department => department.department_name ===
                    token.value)?.department_id;
                if (departmentId) {
                    const currentIds = $('#department_ids').val().split(',').filter(Boolean);
                    currentIds.push(departmentId);
                    $('#department_ids').val(currentIds.join(','));
                }
            });

            // Positions Tokenfield
            $('#positiontokenfield').tokenfield({
                autocomplete: {
                    source: positionSource.map(position => position.position_name),
                    delay: 100
                },
                showAutocompleteOnFocus: true
            }).on('tokenfield:createtoken', function(event) {
                const token = event.attrs;
                const positionId = positionSource.find(position => position.position_name === token.value)
                    ?.position_id;
                if (positionId) {
                    const currentIds = $('#position_ids').val().split(',').filter(Boolean);
                    currentIds.push(positionId);
                    $('#position_ids').val(currentIds.join(','));
                }
            });
        });
    </script>
@endpush
