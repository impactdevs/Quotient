<x-app-layout>
    <div class="mt-3">
        <!-- Summary Cards -->
        <div class="mb-4 row g-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="border-0 shadow-sm card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-secondary">Total Expenses</h6>
                                <h3 class="mb-0">{{ Number::currency($totalExpenses) }}</h3>
                            </div>
                            <div class="p-3 text-white bg-primary rounded-circle">
                                <i class="bi bi-cash-stack fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="border-0 shadow-sm card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-secondary">Avg. per Expense</h6>
                                <h3 class="mb-0">{{ Number::currency($averageExpense) }}</h3>
                            </div>
                            <div class="p-3 text-white bg-info rounded-circle">
                                <i class="bi bi-graph-up fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more summary cards as needed -->
        </div>

        <div class="border-0 shadow-sm card">
            <div class="card-body">
                <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <h5 class="mb-3 card-title mb-md-0">Expense Records</h5>
                    @can('can add an event')
                        <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-2"></i>Add New Expense
                        </a>
                    @endcan
                </div>

                <!-- Search and Filters -->
                <div class="mb-4 row g-3">
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
                    <table class="table mb-0 align-middle table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="ps-4">#</th>
                                <th scope="col">Employee</th>
                                <th scope="col">Category</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                {{-- <th scope="col">Status</th> --}}
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
                                                    {{ substr(optional($expense->user->employee)->first_name, 0, 1) }}
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
                                        <div class="flex-wrap gap-2 d-flex">
                                            <!-- Your existing badge code with improved styling -->
                                            @php
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
                                        @if ($expense->receipt_path)
                                            <a href="{{ asset('storage/' . $expense->receipt_path) }}"
                                                class="btn btn-icon btn-sm btn-outline-secondary"
                                                data-bs-toggle="tooltip" title="Download Receipt">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        @else
                                            <span>No receipt</span>
                                        @endif
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
                                        <div class="py-5 text-center">
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
                <div class="mt-4 d-flex justify-content-between align-items-center">
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
