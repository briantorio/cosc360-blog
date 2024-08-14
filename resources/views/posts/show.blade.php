@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <div class="mt-3">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    </div>
@endsection
