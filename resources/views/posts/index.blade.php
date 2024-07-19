@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @forelse($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @empty
            <li>No posts available.</li>
        @endforelse
    </ul>
@endsection
