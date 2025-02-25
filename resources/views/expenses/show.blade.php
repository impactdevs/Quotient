<x-app-layout>
    <div class="container mt-5">
        <h5 class="mb-4">
            <i class="fas fa-calendar-alt"></i> Expense Details
        </h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="event_name">
                        <i class="fas fa-tag"></i> Employee:
                    </label>
                    <p class="border p-2 rounded bg-light">
                        {{ $expense->user->employee->first_name . ' ' . $expense->user->employee->last_name }}</p>
                </div>
                <div class="form-group mb-3">
                    <label for="event_start_date">
                        <i class="fas fa-share-alt-square"></i> Category
                    </label>
                    <p class="border p-2 rounded bg-light">{{ $expense->expense_type }}</p>
                </div>
                <div class="form-group mb-3">
                    <label for="event_end_date">
                        <i class="fas fa-money"></i> Amount
                    </label>
                    <p class="border p-2 rounded bg-light">{{ $expense->amount }}</p>
                </div>
                <div class="form-group mb-3">
                    <label for="event_description">
                        <i class="fas fa-calendar"></i> Date
                    </label>
                    <p class="border p-2 rounded bg-light">{{ $expense->date->format('d/m/Y') }}</p>
                </div>
                <div class="form-group mb-3">
                    <label for="event_description">
                        <i class="fas fa-address-book"></i> Description
                    </label>
                    <p class="border p-2 rounded bg-light">{{ $expense->description }}</p>
                </div>
                @if ($expense->receipt_path)
                    <div class="form-group mb-3">
                        <label for="event_description">
                            <i class="fas fa-address-book"></i> <img
                                src="{{ asset('storage/' . $expense->receipt_path) }}" />
                        </label>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
