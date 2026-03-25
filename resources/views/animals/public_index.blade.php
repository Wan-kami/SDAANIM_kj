@extends('layouts.adopter.app')

@section('title', 'Adopta un Amigo')

@section('styles')
<style>
    .adopta-section { padding: 40px 20px; max-width: 1200px; margin: 0 auto; text-align: center; }
    .adopta-filtros { margin: 30px 0; }
    .filtro-btn { padding: 8px 15px; border-radius: 20px; border: 2px solid #ff6b6b; color: #ff6b6b; text-decoration: none; margin-right: 10px; transition: 0.3s; }
    .filtro-btn:hover, .filtro-btn.activo { background-color: #ff6b6b; color: white; }
    .adopta-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-top: 30px; }
    .adopta-card { background: white; border-radius: 10px; padding: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: 0.3s; }
    .adopta-card:hover { transform: translateY(-5px); }
    .adopta-card img { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; }
    .adoptar-btn { display: inline-block; margin-top: 15px; background: #2e8b57; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; }
</style>
@endsection

@section('content')
<section class="adopta-section">
    <h2>Adopta</h2>
    <p>Encuentra a tu nuevo mejor amigo 🐾. Tenemos muchos peluditos esperando un hogar lleno de amor.</p>

    <!-- FILTROS -->
    <div class="adopta-filtros">
        <a href="{{ route('adopta', ['etapa' => 'todos']) }}" class="filtro-btn {{ $etapaFiltro == 'todos' ? 'activo' : '' }}">Todos</a>
        <a href="{{ route('adopta', ['etapa' => 'cachorro']) }}" class="filtro-btn {{ $etapaFiltro == 'cachorro' ? 'activo' : '' }}">Cachorros</a>
        <a href="{{ route('adopta', ['etapa' => 'joven']) }}" class="filtro-btn {{ $etapaFiltro == 'joven' ? 'activo' : '' }}">Jóvenes</a>
        <a href="{{ route('adopta', ['etapa' => 'adulto']) }}" class="filtro-btn {{ $etapaFiltro == 'adulto' ? 'activo' : '' }}">Mayores</a>
    </div>

    <!-- CARDS -->
    <div class="adopta-grid">
        @forelse($animals as $animal)
            <div class="adopta-card">
                <img src="{{ asset('img/' . $animal->Anim_foto) }}" alt="{{ $animal->Anim_nombre }}">
                <h3>{{ $animal->Anim_nombre }}</h3>
                <p><strong>Raza:</strong> {{ $animal->Anim_raza }}</p>
                <p><strong>Edad:</strong> {{ $animal->Anim_edad }}</p>
                <p><strong>Sexo:</strong> {{ $animal->Anim_sexo }}</p>
                <a href="{{ route('adopter.adoption.create', $animal->Anim_id) }}" class="adoptar-btn">❤️ Adoptame</a>
            </div>
        @empty
            <p>No hay animales disponibles actualmente 🐾</p>
        @endforelse
    </div>
</section>
@endsection
