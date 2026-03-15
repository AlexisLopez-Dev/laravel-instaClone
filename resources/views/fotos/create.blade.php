@extends('layout')
@section('content')
    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
        <h2 class="text-xl font-bold mb-4">Subir nueva foto</h2>

        <form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Selecciona una imagen</label>
                <input type="file" name="foto" required
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                @error('foto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Subir foto
            </button>
        </form>
    </div>
@endsection
