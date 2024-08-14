@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin panel!</p>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Manage Posts</a>
        </div>
    </div>
</div>
@endsection
