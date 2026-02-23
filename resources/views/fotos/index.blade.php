
@foreach($fotos as $foto)

    <p>ID de la foto: {{ $foto->id }}</p>
    <p>URL de la foto: {{ $foto->url }}</p>

    <img src="{{Storage::url($foto->url)}}" width="400px">

    <p>Likes: {{ $foto->likesRecibidos->count() }}  </p>

    <hr>
@endforeach


