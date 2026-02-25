<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Tu correo" required>
    <input type="password" name="password" placeholder="Tu contraseña" required>
    <button type="submit">Entrar</button>
</form>
