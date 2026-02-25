
<form action="{{route('fotos.update', $foto->id)}}" method="post" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input type="file" name="foto">
    <button type="submit">Subir foto</button>
</form>
