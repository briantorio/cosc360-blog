@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        
        <div class="mt-3">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
