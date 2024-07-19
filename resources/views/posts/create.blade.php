@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create Post</h1>
    
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <label for="content">content:</label>
        <textarea id="content" name="content">{{ old('content') }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Save</button>
    </form>
    
    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
