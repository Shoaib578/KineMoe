@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Create Catalog</h2>
    <form action="{{ route('admin.catalogs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="catalog_title">Catalog Title</label>
            <input type="text" class="form-control" id="catalog_title" name="catalog_title" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
