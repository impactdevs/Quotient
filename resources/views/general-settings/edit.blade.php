<x-app-layout>
    <h5 class="text-center mt-5">Edit a setting</h5>
    <div class="mt-3">
        <form method="POST" action="{{ route('general-settings.update', $generalSetting->id) }}" accept-charset="UTF-8"
            class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include ('general-settings.form', ['formMode' => 'edit'])
        </form>
    </div>
</x-app-layout>
