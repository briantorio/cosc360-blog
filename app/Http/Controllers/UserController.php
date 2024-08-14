<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        } 

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        } 

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        } 

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,author,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        } 

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        } 

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,author,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $user->id)
                             ->withErrors($validator)
                             ->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        } 

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}




