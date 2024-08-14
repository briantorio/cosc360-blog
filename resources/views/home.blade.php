@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome, :name, To The Cosc360 Blog By Brian!', ['name' => auth()->user()->name]) }}

                    <!-- Navigation to /posts -->
                    <div class="mt-4">
                        <a href="{{ url('/posts') }}" class="btn btn-primary">
                            {{ __('View Posts') }}
                        </a>
                    </div>

                    <!-- Navigation to /admin for admins -->
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <div class="mt-4">
                            <a href="{{ url('/admin') }}" class="btn btn-secondary">
                                {{ __('Admin Dashboard') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
