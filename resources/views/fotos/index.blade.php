@extends('layout')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($fotos as $foto)
            <article class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm flex flex-col hover:shadow-md transition">

                <div class="p-3 flex justify-between items-center border-b border-gray-100">
                    <span class="font-semibold text-sm truncate">{{ $foto->user->name }}</span>

                    <span class="text-xs text-gray-400">{{ $foto->created_at->diffForHumans() }}</span>
                </div>

                <a href="{{ route('fotos.show', $foto) }}" class="block bg-gray-100 aspect-square group relative overflow-hidden">
                    <img src="{{ Storage::url($foto->url) }}" alt="Foto" class="w-full h-full object-cover group-hover:opacity-90 transition">
                </a>

                <div class="p-3 mt-auto flex justify-between items-center bg-gray-50">
                    <form action="{{ route('fotos.like', $foto) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-600 font-bold flex items-center gap-1 text-sm">
                            ❤️ {{ $foto->likes_recibidos_count }}
                        </button>
                    </form>

                    <div class="flex space-x-3 text-xs font-semibold">
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

            </article>
        @endforeach

    </div>

    <div class="mt-8">
        {{ $fotos->links() }}
    </div>

@endsection
