@extends('layouts.admin.app')

@section('title', 'Panel de Control | Esperanza Animal BQ')

@section('styles')
<style>
    .admin-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px; }
    .stat-card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-top: 5px solid #2e8b57; }
    .stat-card h3 { font-size: 2.5em; color: #2e8b57; margin: 10px 0; }
    .stat-card p { color: #666; font-weight: bold; text-transform: uppercase; font-size: 0.8em; }

    .admin-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; }
    .admin-card { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; text-align: center; }
    .admin-card:hover { transform: translateY(-10px); }
    .admin-card .icon { font-size: 50px; margin-bottom: 20px; display: block; }
    .admin-card h4 { font-size: 1.4em; color: #333; margin-bottom: 15px; }
    .admin-card p { color: #777; margin-bottom: 25px; }
    .admin-card .btn-manage { background: #2e8b57; color: white; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; display: inline-block; transition: 0.3s; }
    .admin-card .btn-manage:hover { background: #246d43; transform: scale(1.05); }
</style>
@endsection

@section('content')
<div style="margin-bottom: 40px; text-align: center;">
    <h1 style="font-family: 'Pacifico', cursive; color: #2e8b57; font-size: 2.8em;">Panel de Administración 🐾</h1>
    <p style="color: #666;">Gestiona todos los aspectos de la fundación desde un solo lugar.</p>
</div>

<div class="admin-stats">
    <div class="stat-card">
        <p>Animales</p>
        <h3>{{ \App\Models\Animal::count() }}</h3>
    </div>
    <div class="stat-card">
        <p>Usuarios</p>
        <h3>{{ \App\Models\User::count() }}</h3>
    </div>
    <div class="stat-card">
        <p>Solicitudes</p>
        <h3>{{ \App\Models\AdoptionRequest::count() }}</h3>
    </div>
    <div class="stat-card">
        <p>Productos</p>
        <h3>{{ \App\Models\Product::count() }}</h3>
    </div>
</div>

<div class="admin-grid">
    <div class="admin-card">
        <span class="icon">🐾</span>
        <h4>Gestión de Animales</h4>
        <p>Añade nuevos rescatados, actualiza sus fotos y gestiona su información.</p>
        <a href="{{ route('admin.animals.index') }}" class="btn-manage">Administrar</a>
    </div>

    <div class="admin-card">
        <span class="icon">📋</span>
        <h4>Solicitudes de Adopción</h4>
        <p>Revisa, aprueba o rechaza las peticiones de los adoptantes.</p>
        <a href="{{ route('admin.requests.index') }}" class="btn-manage">Ver Solicitudes</a>
    </div>

    <div class="admin-card">
        <span class="icon">👥</span>
        <h4>Control de Usuarios</h4>
        <p>Administra las cuentas de adoptantes, voluntarios y veterinarios.</p>
        <a href="{{ route('admin.users.index') }}" class="btn-manage">Gestionar Usuarios</a>
    </div>

    <div class="admin-card">
        <span class="icon">📝</span>
        <h4>Asignar Tareas</h4>
        <p>Asigna actividades diarias a los voluntarios de la fundación.</p>
        <a href="{{ route('admin.tasks.index') }}" class="btn-manage">Ver Tareas</a>
    </div>
</div>
@endsection
