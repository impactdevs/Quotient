<x-app-layout>
    <h5 class="text-center mt-5">Add Tax Configuration</h5>
    <div class="mt-3">
        <form method="POST" action="{{ route('tax-configurations.store') }}" accept-charset="UTF-8" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @include ('tax-configurations.form', ['formMode' => 'create'])
        </form>
    </div>
</x-app-layout>