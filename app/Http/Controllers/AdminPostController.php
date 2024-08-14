<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminPostController extends Controller
{
    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($validatedData);

        return Redirect::route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validatedData);

        return Redirect::route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $post->delete();

        return Redirect::route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}

