@extends('layout')
@section('content')

    <div class="mb-4">
        <a href="{{ route('fotos.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center gap-1 w-fit">
            &larr; Volver al feed
        </a>
    </div>

    <article class="max-w-3xl mx-auto bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">

        <div class="p-5 flex justify-between items-center border-b border-gray-100">

            <div class="flex flex-col">
                <span class="font-bold text-gray-900 text-lg">{{ $foto->user->name }}</span>

                <span class="text-xs text-gray-500">{{ $foto->created_at->diffForHumans() }}</span>
            </div>

            <span class="text-sm text-gray-400 font-mono">ID: {{ $foto->id }}</span>
        </div>

        <div class="bg-gray-100 flex justify-center">
            <img src="{{ Storage::url($foto->url) }}" alt="Foto de {{ $foto->user->name }}" class="w-full h-auto">
        </div>

        <div class="p-6">
            <div class="flex items-center justify-between">

                <form action="{{ route('fotos.like', $foto) }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-600 font-bold text-xl flex items-center gap-2">
                        ❤️ {{ $foto->likes_recibidos_count }} Likes
                    </button>
                </form>

                <div class="flex space-x-3 text-sm font-semibold">
                    @can('update', $foto)
                        <a href="{{ route('fotos.edit', $foto->id) }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">Editar</a>
                    @endcan

                    @can('delete', $foto)
                        <form action="{{ route('fotos.destroy', $foto) }}" method="POST" class="m-0">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 rounded-md hover:bg-red-100 transition">Borrar</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </article>

@endsection
