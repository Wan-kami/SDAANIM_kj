<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDAANIM - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- HEADER COMPLETO -->
    <header class="main-header">
        <div class="header-top">
            <div class="logo">
                <img src="{{ asset('img/a.png') }}" alt="logo">
                <span>Esperanza Animal BQ</span>
            </div>

            <nav class="nav-menu">
                <a href="{{ url('/') }}">Inicio</a>
                <a href="#">Quienes somos</a>
                <a href="#">Adopta</a>
                <a href="#">Dona</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn">Apóyanos ▾</a>
                    <div class="dropdown-content">
                        <a href="#">Voluntario</a>
                        <a href="#">Veterinario</a>
                    </div>
                </div>
            </nav>

            <div class="search-container">
                <nav class="nav-right">
                    <button onclick="window.location.href='{{ route('register') }}'" class="filtro">Registrarse</button>
                </nav>
                <div class="usuario">
                    <a href="#"><img src="{{ asset('img/usuario.png') }}" alt="Usuario" id="usuario-icon"></a>
                </div>
            </div>
        </div>
    </header>

    <br><br><br><br>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; margin: 0 auto 20px; max-width: 400px; border-radius: 8px; text-align: center; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <!-- LOGIN -->
    <div class="login-container">
        <h2>Inicia Sesión</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input
                type="text"
                name="Usu_documento"
                placeholder="Número de Documento"
                value="{{ old('Usu_documento') }}"
                required
                autofocus
            />
            @error('Usu_documento')
                <p style="color: red; font-size: 0.8rem;">{{ $message }}</p>
            @enderror

            <input
                type="password"
                name="password"
                placeholder="Contraseña"
                required
            />
            @error('password')
                <p style="color: red; font-size: 0.8rem;">{{ $message }}</p>
            @enderror

            {{-- El rol se maneja automáticamente en el controlador tras el login, pero lo mantenemos visualmente si es necesario --}}
            <select name="rol_visual" disabled title="El rol se detectará automáticamente">
                <option value="">Tu rol se detectará al entrar</option>
            </select>

            <button type="submit" class="btn" name="login">Ingresar</button>
        </form>

        <div class="social-login">
            <button class="google-btn">Continuar con Google</button>
            <button class="facebook-btn">Continuar con Facebook</button>
        </div>

        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>

        <br><br>
        <a href="{{ url('/') }}" class="btn volver-btn">Regresar</a>
    </div>
</body>
</html>
