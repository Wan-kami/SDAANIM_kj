<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Esperanza Animal BQ</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shared/premium.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    @yield('styles')
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <img src="{{ asset('img/a.png') }}" alt="Logo">
            <h2>Panel Administrador</h2>
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            @php
                $notifCount = \App\Models\Notification::where('Usu_documento', Auth::user()->Usu_documento)->whereNull('read_at')->count();
            @endphp
            <div style="position: relative; display: inline-block;">
                <button type="button" class="notif-toggle" onclick="toggleSidebar()">🔔</button>
                @if($notifCount > 0)
                    <span id="notifBadge" style="position: absolute; top: -5px; right: -5px; background: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 0.7em; font-weight: bold;">{{ $notifCount }}</span>
                @endif
            </div>
            <span style="font-weight: bold; margin-right: 10px;">{{ Auth::user()->name }}</span>
        </div>
    </header>

    <!-- BARRA LATERAL DE NOTIFICACIONES -->
    <div id="notifSidebar" class="notif-sidebar">
        <button class="close-btn" onclick="toggleSidebar()">✖</button>
        <h3>Notificaciones</h3>
        <div class="notif-list">
            @auth
                @forelse(\App\Models\Notification::where('Usu_documento', Auth::user()->Usu_documento)->latest()->take(8)->get() as $notification)
                    <a href="{{ $notification->Noti_link ?? '#' }}">
                        {{ $notification->Noti_mensaje }}<br>
                        <small style="color: #999;">{{ \Carbon\Carbon::parse($notification->Noti_fecha)->diffForHumans() }}</small>
                    </a>
                @empty
                    <p style="text-align: center; color: #999; font-size: 0.9em;">No tienes notificaciones nuevas.</p>
                @endforelse
            @endauth
        </div>
        
        <div style="margin-top: 20px;">
            <a href="{{ route('admin.activities') }}" style="display: block; background: #f59e0b; color: white; padding: 12px; text-align: center; font-weight: bold; border-radius: 8px; text-decoration: none; margin-bottom: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">📊 Ver Actividades Asignadas</a>
        </div>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;">
        
        <h3 style="font-size: 1.1em;">Menú Admin</h3>
        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('admin.animals.index') }}">🐾 Gestión de Animales</a>
        <a href="{{ route('admin.requests.index') }}">📋 Solicitudes Adopción</a>
        <a href="{{ route('admin.tasks.index') }}">📅 Asignar Nuevas Tareas</a>
        <a href="{{ route('admin.activities') }}">📊 Reporte de Actividades (Filtros)</a>
        <a href="{{ route('admin.users.index') }}">👥 Gestión de Usuarios</a>
        <a href="{{ route('profile.edit') }}">👤 Mi Perfil</a>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        <a href="#" style="color: #666; font-weight: bold;">❓ Ayuda y Soporte</a>
        <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
            @csrf
            <button type="submit" style="width: 100%; text-align: left; padding: 12px; background: transparent; border: none; cursor: pointer; color: #d9534f; font-size: 0.9em; border-radius: 5px; font-family: inherit; transition: 0.3s;" onmouseover="this.style.backgroundColor='#ffe6e6'" onmouseout="this.style.backgroundColor='transparent'">
                🚪 Cerrar sesión
            </button>
        </form>
    </div>

    <main>
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Bloque para mostrar notificación de bienvenida --}}
        @if(session('welcome'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'Bienvenido',
                    text: "{{ session('welcome') }}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>© {{ date('Y') }} Esperanza Animal BQ | Panel Administrador</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("notifSidebar");
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                const badge = document.getElementById("notifBadge");
                if (badge) {
                    fetch('{{ route("notificaciones.leer") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => {
                        if(response.ok) {
                            badge.style.display = 'none';
                        }
                    }).catch(error => console.error('Error:', error));
                }
            }
        }
    </script>
</body>
</html>