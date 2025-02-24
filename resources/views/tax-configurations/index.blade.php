<x-app-layout>
    <div class="mt-3">
        <h5 class="text-center mt-5">Tax Configurations</h5>
        <div class="mt-3">
            <a href="{{ route('tax-configurations.create') }}" class="btn btn-primary">Add</a>
        </div>

        <div class="mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Minimum Amount</th>
                        <th>Maximum Amount</th>
                        <th>Rate</th>
                        <th>Effective Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($confs as $conf)
                        <tr>
                            <td>{{ Number::currency($conf->min_amount) }}</td>
                            <td>{{ Number::currency($conf->max_amount) }}</td>
                            <td>{{ Number::percentage($conf->rate) }}</td>
                            <td>{{ $conf->effective_date->format('F j, Y') }}</td>
                            <td>
                                <a href="{{ route('tax-configurations.edit', $conf->id) }}"
                                    class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('tax-configurations.destroy', $conf->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm(&quot;Are you sure?&quot;)">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-app-layout>
