<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>State_id</th>
            <th>IsCapital</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->state_id }}</td>
            <td>{{ $city->isCapital }}</td>
            <td>{{ $city->status }}</td>
            <td>
                <a href="{{ route('cities.item', $city->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('cities.update', $city->id) }}" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>