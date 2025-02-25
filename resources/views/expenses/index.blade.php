<x-app-layout>
    <div class="mt-3">
        <!-- Summary Cards -->
        <div class="row mb-4 g-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-secondary">Total Expenses</h6>
                                <h3 class="mb-0">{{ Number::currency($totalExpenses) }}</h3>
                            </div>
                            <div class="bg-primary text-white p-3 rounded-circle">
                                <i class="bi bi-cash-stack fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-secondary">Avg. per Expense</h6>
                                <h3 class="mb-0">{{ Number::currency($averageExpense) }}</h3>
                            </div>
                            <div class="bg-info text-white p-3 rounded-circle">
                                <i class="bi bi-graph-up fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more summary cards as needed -->
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                    <h5 class="card-title mb-3 mb-md-0">Expense Records</h5>
                    @can('can add an event')
                        <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-2"></i>Add New Expense
                        </a>
                    @endcan
                </div>

                <!-- Search and Filters -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control" placeholder="Search expenses...">
                    </div>
                    <div class="col-6 col-md-3">
                        <select class="form-select">
                            <option>Filter by Status</option>
                            <!-- Add options -->
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <select class="form-select">
                            <option>Filter by Category</option>
                            <!-- Add options -->
                        </select>
                    </div>
                </div>

                <!-- Enhanced Table -->
                <div class="table-responsive rounded-3">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="ps-4">#</th>
                                <th scope="col">Employee</th>
                                <th scope="col">Category</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Spent On</th>
                                <th scope="col">Receipt</th>
                                <th scope="col" class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($expenses as $index => $expense)
                                <tr class="position-relative">
                                    <td class="ps-4 fw-medium text-muted">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <!-- Add employee avatar if available -->
                                                <span class="avatar-title bg-secondary rounded-circle">
                                                    {{ substr($expense->user->employee->first_name, 0, 1) }}
                                                </span>
                                            </div>
                                            <div>
                                                {{ $expense->user->employee->first_name . ' ' . $expense->user->employee->last_name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">
                                            {{ $expense->expense_type }}
                                        </span>
                                    </td>
                                    <td class="fw-medium">{{ Number::currency($expense->amount) }}</td>
                                    <td>{{ $expense->date->format('M d, Y') }}</td>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'approved' => 'success',
                                                'rejected' => 'danger',
                                            ];
                                        @endphp
                                        <span
                                            class="badge bg-{{ $statusColors[strtolower($expense->status)] ?? 'secondary' }}">
                                            {{ $expense->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <!-- Your existing badge code with improved styling -->
                                            @php
                                                // Assume training_category contains comma-separated IDs for each category
                                                $userIds = explode(',', $expense->category['users'] ?? '');
                                                $departmentIds = explode(',', $expense->category['departments'] ?? '');
                                                $positionIds = explode(',', $expense->category['positions'] ?? '');

                                            @endphp
                                            @foreach ($userIds as $id)
                                                @if ($id === 'All')
                                                    <span class="badge bg-primary bg-opacity-10 text-primary">All
                                                        Users</span>
                                                @elseif (!empty($id) && isset($options['users'][$id]))
                                                    <span class="badge bg-primary bg-opacity-10 text-primary">
                                                        {{ $options['users'][$id] ?? 'Unknown User' }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ asset('storage/' . $expense->receipt_path) }}"
                                            class="btn btn-icon btn-sm btn-outline-secondary" data-bs-toggle="tooltip"
                                            title="Download Receipt">
                                            <i class="bi bi-download"></i>
                                        </a>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-icon btn-outline-secondary" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('can edit an expense')
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('expenses.edit', $expense->id) }}">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </a>
                                                    </li>
                                                @endcan
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('expenses.show', $expense->id) }}">
                                                        <i class="bi bi-eye"></i> View
                                                    </a>
                                                </li>
                                                @can('can delete an expense')
                                                    <li>
                                                        <form action="{{ route('expenses.destroy', $expense->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <div class="text-center py-5">
                                            <i class="bi bi-file-earmark-excel fs-1 text-muted"></i>
                                            <h5 class="mt-3">No expenses found</h5>
                                            <p class="text-muted">Start by adding a new expense record</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Enhanced Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing {{ $expenses->firstItem() }} - {{ $expenses->lastItem() }} of
                        {{ $expenses->total() }} entries
                    </div>
                    <div class="pagination-wrapper">
                        {!! $expenses->appends(['search' => request()->get('search'), 'position' => request()->get('position')])->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
