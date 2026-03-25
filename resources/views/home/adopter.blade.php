@extends('layouts.adopter.app')

@section('title', 'Mi Panel | Esperanza Animal BQ')

@section('styles')
<style>
    .welcome-container { text-align: center; padding: 40px 20px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-bottom: 40px; }
    .welcome-container h1 { font-family: 'Pacifico', cursive; color: #2d7d46; font-size: 2.5em; margin-bottom: 15px; }
    .adopter-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; }
    .adopter-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 5px solid #2d7d46; transition: 0.3s; }
    .adopter-card:hover { transform: translateY(-10px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    .adopter-card .icon { font-size: 45px; margin-bottom: 15px; display: block; }
    .adopter-card h3 { color: #333; margin-bottom: 15px; }
    .adopter-card p { color: #666; margin-bottom: 20px; font-size: 0.95em; }
    .adopter-card a { background: #2d7d46; color: white; padding: 10px 20px; border-radius: 50px; text-decoration: none; font-weight: bold; }
</style>
@endsection

@section('content')
<div class="welcome-container">
    <h1>¡Hola, {{ Auth::user()->name }}! 🐾</h1>
    <p>Gracias por ser parte de nuestra comunidad y apoyarnos en nuestra misión de rescatar vidas.</p>
</div>

<div class="adopter-grid">
    <div class="adopter-card">
        <span class="icon">🐶</span>
        <h3>Busca un Amigo</h3>
        <p>Explora nuestro catálogo de peluditos que buscan un hogar para siempre.</p>
        <a href="{{ route('adopta') }}">Ver Perros</a>
    </div>
    
    <div class="adopter-card">
        <span class="icon">📋</span>
        <h3>Mis Solicitudes</h3>
        <p>Sigue el estado de tus procesos de adopción en tiempo real.</p>
        <a href="{{ route('adopter.requests') }}">Ver Solicitudes</a>
    </div>

    <div class="adopter-card">
        <span class="icon">❤️</span>
        <h3>Donar</h3>
        <p>Tu aporte ayuda a comprar comida y medicinas para los que aún esperan.</p>
        <a href="{{ route('adopter.donation.create') }}">Hacer Donación</a>
    </div>
</div>
@endsection
