@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <h1>Posts</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ url('/home') }}" class="btn btn-primary">Back to Home</a>
        </div>

        <ul class="list-group">
            @forelse($posts as $post)
                <li class="list-group-item">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </li>
            @empty
                <li class="list-group-item">No posts available.</li>
            @endforelse
        </ul>
    </div>
@endsection
