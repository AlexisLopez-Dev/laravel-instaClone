<a href="{{route('fotos.index')}}">Volver a inicio</a>

<p>Foto subida por: {{$foto->user->name}}</p>
<p>ID de la foto: {{ $foto->id }}</p>
<a href="{{route('fotos.show', $foto)}}">
    <img src="{{Storage::url($foto->url)}}" width="400px">
</a>

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
