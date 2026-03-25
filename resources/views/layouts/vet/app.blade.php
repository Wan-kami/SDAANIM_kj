<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Panel Veterinario</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
    <style>
        body { margin: 0; font-family: 'Open Sans', sans-serif; background: #f4f7f6; color: #333; overflow-x: hidden; }
        .admin-header { background: linear-gradient(90deg, #7FFFD4, #20B2AA); color: white; padding: 12px 25px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .admin-header .logo { display: flex; align-items: center; gap: 10px; }
        .admin-header h2 { font-family: 'Pacifico', cursive; font-size: 1.8em; margin: 0; color: white; }
        
        .notif-toggle { background-color: white; color: #20B2AA; border: none; padding: 8px 14px; border-radius: 8px; cursor: pointer; font-weight: bold; transition: 0.3s; }
        .notif-sidebar { position: fixed; top: 0; right: -320px; width: 300px; height: 100%; background: #fff; box-shadow: -2px 0 10px rgba(0,0,0,0.2); transition: right 0.4s ease; z-index: 1000; padding: 20px; }
        .notif-sidebar.active { right: 0; }
        .notif-sidebar h3 { text-align: center; color: #20B2AA; margin-bottom: 20px; }
        .notif-sidebar a { display: block; padding: 12px; color: #333; border-bottom: 1px solid #eee; border-radius: 5px; }
        .notif-sidebar a:hover { background-color: #e0fff9; }
        .close-btn { position: absolute; top: 10px; right: 15px; background: transparent; border: none; font-size: 20px; cursor: pointer; color: #20B2AA; }

        main { padding: 40px 20px; max-width: 1200px; margin: 0 auto; min-height: 80vh; }
        footer { background: #20B2AA; color: white; text-align: center; padding: 15px 0; margin-top: 40px; font-size: 0.9em; }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <img src="{{ asset('img/a.png') }}" alt="Logo">
            <h2>Esperanza Animal BQ</h2>
        </div>
        <div>
            <button class="notif-toggle" onclick="toggleSidebar()">🔔 Notificaciones</button>
            <span style="margin-left:15px; font-weight:bold;">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline; margin-left:10px;">
                @csrf
                <button type="submit" style="background:none; border:none; color:white; font-weight:bold; cursor:pointer;">Cerrar sesión</button>
            </form>
        </div>
    </header>

    <div id="notifSidebar" class="notif-sidebar">
        <button class="close-btn" onclick="toggleSidebar()">✖</button>
        <h3>Notificaciones</h3>
        <a href="{{ route('vet.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('vet.animals') }}">🏥 Ver Animales</a>
        <a href="{{ route('adopter.profile') }}">📊 Mi Perfil</a>
    </div>

    <main>
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; margin: 20px auto; max-width: 1100px; border-radius: 8px; text-align: center; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('welcome'))
            <script>
                alert("{{ session('welcome') }}");
            </script>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>© 2025 Esperanza Animal BQ | Panel Veterinario</p>
    </footer>

    <script>
        function toggleSidebar() {
            document.getElementById("notifSidebar").classList.toggle("active");
        }
    </script>
</body>
</html>
