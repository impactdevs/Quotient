<x-app-layout>
    <h5 class="text-center mt-5">Edit Tax Configuration</h5>
    <div class="mt-3">
        <form method="POST" action="{{ route('tax-configurations.update', $taxConfiguration->id) }}" accept-charset="UTF-8"
            class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include ('tax-configurations.form', ['formMode' => 'edit'])
        </form>
    </div>
</x-app-layout>
