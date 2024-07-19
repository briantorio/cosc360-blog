@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>
    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <label for="content">content:</label>
        <textarea id="content" name="content">{{ old('content', $post->content) }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Update</button>
    </form>
    
    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
