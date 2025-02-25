<x-app-layout>
    <h5 class="text-center mt-5">Edit an Expense</h5>
    <div class="mt-3">
        <form method="POST" action="{{ route('expenses.update', $expense->id) }}" accept-charset="UTF-8"
            class="form-horizontal" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include ('expenses.form', ['formMode' => 'edit'])
        </form>
    </div>
</x-app-layout>
