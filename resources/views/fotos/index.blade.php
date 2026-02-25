<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>

</form>

@foreach($fotos as $foto)

    <p>ID de la foto: {{ $foto->id }}</p>
    <img src="{{Storage::url($foto->url)}}" width="400px">

    <form action="{{route('fotos.like', $foto)}}" method="POST">
        @csrf
        <button type="submit">Dar like</button>
    </form>

    <p>Likes: {{ $foto->likesRecibidos->count() }} </p>

    <hr>
@endforeach


