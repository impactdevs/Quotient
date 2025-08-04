<div class="mb-3 row">
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

<div class="border row border-5 border-success">
    <p>Select what user categories the expense should be attached too.</p>

    <div class="mb-3 col">
        <label for="usertokenfield" class="form-label">Users</label>
        <input type="text" class="form-control" id="usertokenfield" />
        <input type="hidden" name="category[users]" id="user_ids"
            value="{{ old('category.users', isset($expense) ? (isset($expense->category['users']) ? $expense->category['users'] : 'All') : 'All') }}" />
    </div>

    <div class="mb-3 col">
        <label for="departmenttokenfield" class="form-label">Departments</label>
        <input type="text" class="form-control" id="departmenttokenfield" />
        <input type="hidden" name="category[departments]" id="department_ids"
            value="{{ old('category.departments', isset($expense) ? (isset($expense->category['departments']) ? $expense->category['departments'] : '') : '') }}" />
    </div>

    <div class="mb-3 col">
        <label for="positiontokenfield" class="form-label">Positions</label>
        <input type="text" class="form-control" id="positiontokenfield" />
        <input type="hidden" name="category[positions]" id="position_ids"
            value="{{ old('category.positions', isset($expense) ? (isset($expense->category['positions']) ? $expense->category['positions'] : '') : '') }}" />
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

            // Initialize User Tokenfield
            $('#usertokenfield').tokenfield({
                    autocomplete: {
                        source: userSource.map(user => user.name),
                        delay: 100
                    },
                    showAutocompleteOnFocus: true
                })
                .on('tokenfield:createtoken', function(event) {
                    const tokenValue = event.attrs.value;
                    let userId;

                    if (tokenValue === 'All Users') {
                        userId = 'All';
                    } else {
                        const user = userSource.find(u => u.name === tokenValue);
                        userId = user ? user.id : null;
                    }

                    if (userId) {
                        let currentIds = $('#user_ids').val().split(',').filter(Boolean);

                        if (userId === 'All') {
                            currentIds = ['All'];
                        } else {
                            currentIds = currentIds.filter(id => id !== 'All');
                            if (!currentIds.includes(userId)) {
                                currentIds.push(userId);
                            }
                        }

                        $('#user_ids').val(currentIds.join(','));
                    } else {
                        event.preventDefault();
                    }
                })
                .on('tokenfield:removedtoken', function(e) {
                    const tokenValue = e.attrs.value;
                    let userId;

                    if (tokenValue === 'All Users') {
                        userId = 'All';
                    } else {
                        const user = userSource.find(u => u.name === tokenValue);
                        userId = user ? user.id : null;
                    }

                    if (userId) {
                        let currentIds = $('#user_ids').val().split(',').filter(Boolean);
                        currentIds = currentIds.filter(id => id !== userId);
                        $('#user_ids').val(currentIds.join(','));
                    }
                });

            // Initialize Department Tokenfield
            $('#departmenttokenfield').tokenfield({
                    autocomplete: {
                        source: departmentSource.map(d => d.department_name),
                        delay: 100
                    },
                    showAutocompleteOnFocus: true
                })
                .on('tokenfield:createtoken', function(event) {
                    const tokenValue = event.attrs.value;
                    const department = departmentSource.find(d => d.department_name === tokenValue);
                    if (department) {
                        const currentIds = $('#department_ids').val().split(',').filter(Boolean);
                        currentIds.push(department.department_id);
                        $('#department_ids').val(currentIds.join(','));

                        console.log('departments', currentIds)
                    }
                })
                .on('tokenfield:removedtoken', function(e) {
                    const tokenValue = e.attrs.value;
                    const department = departmentSource.find(d => d.department_name === tokenValue);
                    if (department) {
                        let currentIds = $('#department_ids').val().split(',').filter(Boolean);
                        currentIds = currentIds.filter(id => id !== department.department_id);
                        $('#department_ids').val(currentIds.join(','));
                    }
                });

            // Initialize Position Tokenfield
            $('#positiontokenfield').tokenfield({
                    autocomplete: {
                        source: positionSource.map(p => p.position_name),
                        delay: 100
                    },
                    showAutocompleteOnFocus: true
                })
                .on('tokenfield:createtoken', function(event) {
                    const tokenValue = event.attrs.value;
                    const position = positionSource.find(p => p.position_name === tokenValue);
                    if (position) {
                        const currentIds = $('#position_ids').val().split(',').filter(Boolean);
                        currentIds.push(position.position_id);
                        $('#position_ids').val(currentIds.join(','));
                    }
                })
                .on('tokenfield:removedtoken', function(e) {
                    const tokenValue = e.attrs.value;
                    const position = positionSource.find(p => p.position_name === tokenValue);
                    if (position) {
                        let currentIds = $('#position_ids').val().split(',').filter(Boolean);
                        currentIds = currentIds.filter(id => id !== position.position_id);
                        $('#position_ids').val(currentIds.join(','));
                    }
                });

            // Populate initial tokens for Users
            const initialUserIds = $('#user_ids').val().split(',').filter(Boolean);
            initialUserIds.forEach(id => {
                if (id === 'All') {
                    $('#usertokenfield').tokenfield('createToken', 'All Users');
                } else {
                    const user = userSource.find(u => u.id === id);
                    if (user) {
                        $('#usertokenfield').tokenfield('createToken', user.name);
                    }
                }
            });

            // Populate initial tokens for Departments
            const initialDeptIds = $('#department_ids').val().split(',').filter(Boolean);
            initialDeptIds.forEach(id => {
                const dept = departmentSource.find(d => d.department_id === id);
                if (dept) {
                    $('#departmenttokenfield').tokenfield('createToken', dept.department_name);
                }
            });

            // Populate initial tokens for Positions
            const initialPosIds = $('#position_ids').val().split(',').filter(Boolean);
            initialPosIds.forEach(id => {
                const pos = positionSource.find(p => p.position_id === id);
                if (pos) {
                    $('#positiontokenfield').tokenfield('createToken', pos.position_name);
                }
            });
        });
    </script>
@endpush
