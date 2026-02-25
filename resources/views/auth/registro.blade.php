@extends('layout')
@section('content')

    <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm max-w-sm mx-auto mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-900">Crear una cuenta</h2>

        <form action="{{ route('registro.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nombre</label>
                <input type="text" name="name" placeholder="Tu nombre" required
                       class="w-full border border-gray-300 rounded-md p-2 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Correo electrónico</label>
                <input type="email" name="email" placeholder="tu@correo.com" required
                       class="w-full border border-gray-300 rounded-md p-2 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Contraseña</label>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full border border-gray-300 rounded-md p-2 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 mt-2 rounded-md hover:bg-blue-600 transition">
                Registrarse
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-500">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Inicia sesión</a>
        </div>
    </div>

@endsection
