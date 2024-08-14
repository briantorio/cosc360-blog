@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
        @if ($posts->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No posts found.</p>
        @endif
    </div>
@endsection
