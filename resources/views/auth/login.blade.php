@extends('layout')
@section('content')

    <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm max-w-sm mx-auto mt-12">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-900">Iniciar sesión</h2>

        <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="tu@correo.com" required
                       class="w-full border border-gray-300 rounded-md p-2 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required
                       class="w-full border border-gray-300 rounded-md p-2 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 mt-2 rounded-md hover:bg-blue-600 transition">
                Entrar
            </button>

            <div class="mt-4 border-t border-gray-200 pt-4 text-center">
                <p class="text-sm text-gray-500 mb-3">¿Solo quieres echar un vistazo?</p>
                <button type="button"
                        onclick="document.getElementById('email').value='invitado@gmail.com'; document.getElementById('password').value='invitado1234'; document.querySelector('form').submit();"
                        class="w-full bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-300 rounded-md hover:bg-gray-200 transition">
                    Entrar como Invitado
                </button>
                <p class="text-xs text-gray-400 mt-3">
                    ⚠️ La base de datos y las imágenes se reinician cada noche a las 04:00 AM para mantener la demo limpia.
                </p>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-500">
            ¿No tienes cuenta? <a href="{{ route('registro.form') }}" class="text-blue-500 font-semibold hover:underline">Regístrate</a>
        </div>
    </div>

@endsection
