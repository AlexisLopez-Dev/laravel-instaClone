
<form action="{{route('fotos.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="foto">
    <button type="submit">Subir foto</button>
</form>
