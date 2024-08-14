@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>
    
    <div class="mb-3">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Back to Dashboard</a>
    </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
