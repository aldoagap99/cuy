<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country_id</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($states as $state)
        <tr>
            <td>{{ $state->id }}</td>
            <td>{{ $state->name }}</td>
            <td>{{ $state->country_id }}</td>
            <td>{{ $state->status }}</td>
            <td>
                <a href="{{ route('states.item', $state->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('states.update', $state->id) }}" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>