@extends('layout')
@section('content')

    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 text-center">Editar Foto</h2>

        <div class="mb-6 flex justify-center">
            <img src="{{ Storage::url($foto->url) }}" alt="Foto actual" class="h-32 rounded object-cover border border-gray-200">
        </div>

        <form action="{{ route('fotos.update', $foto->id) }}" method="post" enctype="multipart/form-data" class="flex flex-col gap-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Subir nueva imagen (reemplaza a la anterior)</label>
                <input type="file" name="foto" required
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition">
                Actualizar foto
            </button>
        </form>
    </div>

@endsection
