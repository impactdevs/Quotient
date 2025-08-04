<x-app-layout>
    <div class="mt-3">
        <form method="POST" action="{{ route('expenses.store') }}" accept-charset="UTF-8" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @include ('expenses.form', ['formMode' => 'create'])
        </form>
    </div>
</x-app-layout>
