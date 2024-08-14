@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Post</h1>

        <div class="mb-3">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
