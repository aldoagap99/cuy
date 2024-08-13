<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Continent</th>
            <th>Language</th>
            <th>Currency</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($countries as $country)
        <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->name }}</td>
            <td>{{ $country->continent }}</td>
            <td>{{ $country->language }}</td>
            <td>{{ $country->currency }}</td>
            <td>{{ $country->created_at }}</td>
            <td>{{ $country->updated_at }}</td>
            <td>{{ $country->status }}</td>
            <td>
                <a href="{{ route('countries.item', $country->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('countries.update', $country->id) }}" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
