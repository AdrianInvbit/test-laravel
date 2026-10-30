<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'test-laravel') — test-laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('home') }}">test-laravel</a>
            <nav class="nav" aria-label="Principal">
                <a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>Inicio</a>
                <a href="{{ route('products.index') }}" @class(['active' => request()->routeIs('products.*')])>Productos</a>
                <a href="{{ url('/api/health') }}">Health</a>
            </nav>
        </div>
    </header>

    <main class="container main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>test-laravel v0.1.0 · Laboratorio ClonVercel · Sin base de datos</p>
        </div>
    </footer>
</body>
</html>
