<x-app-layout>
    <h5 class="text-center mt-5">Add a Setting</h5>
    <div class="mt-3">
        <form method="POST" action="{{ route('general-settings.store') }}" accept-charset="UTF-8" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @include ('general-settings.form', ['formMode' => 'create'])
        </form>
    </div>
</x-app-layout>