<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Instagram</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">

<nav class="bg-white border-b border-gray-200 sticky top-0 z-10">
    <div class="max-w-5xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('fotos.index') }}" class="text-xl font-bold tracking-tight">Mini Instagram</a>

        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('fotos.create') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800">+ Subir foto</a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 hover:text-red-600">Cerrar sesión</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Login</a>
                <a href="{{ route('registro.form') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">Registrarme</a>
            @endguest
        </div>
    </div>
</nav>

<main class="max-w-5xl mx-auto py-8 px-4">
    @yield('content')
</main>

</body>
</html>
