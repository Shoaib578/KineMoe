@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h2>All Comments</h2>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Comment</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment->id }}</th>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection