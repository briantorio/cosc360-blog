<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        
        $roles = ['admin', 'user'];

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,author,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.users.create')
                             ->with('error', 'Failed to create user: ' . $e->getMessage());
        }

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }
    public function index()
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $roles = ['admin', 'user'];

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if (!Auth::user() || !Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users' . $user->id,
            'role' => 'required|string|in:admin,author,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $user->id)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.users.edit', $user->id)
                             ->with('error', 'Failed to update user: ' . $e->getMessage());
        }

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
