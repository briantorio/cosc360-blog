<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show($_id)
    {
        $post = Post::where('_id', $_id)->first();
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return $post;
    }
}


