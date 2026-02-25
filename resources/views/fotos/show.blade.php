@extends('layout')
@section('content')

    <div class="mb-4">
        <a href="{{ route('fotos.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center gap-1">
            &larr; Volver al feed
        </a>
    </div>

    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
        <div class="p-4 flex justify-between items-center border-b border-gray-100">
            <span class="font-bold text-gray-900">{{ $foto->user->name }}</span>
            <span class="text-xs text-gray-400">ID: {{ $foto->id }}</span>
        </div>

        <div class="bg-gray-100 flex justify-center">
            <img src="{{ Storage::url($foto->url) }}" alt="Foto" class="w-full h-auto">
        </div>

        <div class="p-4">
            <div class="flex items-center justify-between mb-2">

                <form action="{{ route('fotos.like', $foto) }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-600 font-bold text-lg">
                        ❤️ {{ $foto->likesRecibidos->count() }}
                    </button>
                </form>

                <div class="flex space-x-4 text-sm font-semibold">
                    @can('update', $foto)
                        <a href="{{ route('fotos.edit', $foto->id) }}" class="text-gray-500 hover:text-blue-600">Editar</a>
                    @endcan

                    @can('delete', $foto)
                        <form action="{{ route('fotos.destroy', $foto) }}" method="POST" class="m-0">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-600">Borrar</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </article>

@endsection
