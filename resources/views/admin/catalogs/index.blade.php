@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Catalogs</h2>
    <a href="{{ route('admin.catalogs.create') }}" class="btn btn-primary mb-3">Add New Catalog</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogs as $catalog)
                <tr>
                    <td>{{ $catalog->id }}</td>
                    <td>{{ $catalog->catalog_title }}</td>
                    <td>
                        <form action="{{ route('admin.catalogs.destroy', $catalog) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
