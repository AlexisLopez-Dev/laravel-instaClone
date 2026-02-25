<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

<a href="{{route('fotos.create')}}">Subir foto</a>

@foreach($fotos as $foto)
    <p>ID de la foto: {{ $foto->id }}</p>
    <img src="{{Storage::url($foto->url)}}" width="400px">

    <a href="{{route('fotos.edit', $foto->id)}}">Editar</a>

    <form action="{{route('fotos.destroy', $foto)}}" method="POST">
        @csrf @method('DELETE')
        <button type="submit">Borrar</button>
    </form>

    <form action="{{route('fotos.like', $foto)}}" method="POST">
        @csrf
        <button type="submit">Dar like</button>
    </form>

    <p>Likes: {{ $foto->likesRecibidos->count() }} </p>



    <hr>
@endforeach


