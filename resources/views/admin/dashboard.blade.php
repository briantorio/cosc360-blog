@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ $user->name }} to the admin panel!</p>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-2 mb-md-0">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-block">Manage Users</a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary btn-block">Manage Posts</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="text-center">
            <a href="{{ url('/home') }}" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>
</div>
@endsection
