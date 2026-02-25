<form action="{{ route('registro.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Tu nombre" required>
    <input type="email" name="email" placeholder="Tu correo" required>
    <input type="password" name="password" placeholder="Tu contraseña" required>
    <button type="submit">Registrarse</button>
</form>
