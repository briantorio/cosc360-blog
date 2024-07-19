<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cosc360 Blog')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Cosc360 Blog</h1>
        <nav>
            <a href="{{ route('posts.index') }}">Home</a>
            <a href="{{ route('posts.create') }}">Create Post</a>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>&copy; {{ date('Y') }} Laravel Blog</p>
    </footer>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
