<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $user = Auth::user();
        return view('admin.dashboard', ['user' => $user]);
    }
}

