@extends('layouts.adopter.app')

@section('title', 'Adopta un Amigo')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/adopter/animals.css') }}">
@endsection

@section('content')
<section class="adopta-section">
    <h1 style="color: #2e8b57; margin-bottom: 10px; font-weight: 800;">
        Adopta un Amigo 🐾
    </h1>

    <p style="color: #64748b; margin-bottom: 40px;">
        Encuentra el compañero perfecto para tu hogar.
    </p>

    <!-- FILTROS -->
    <div class="adopta-filtros">
        <a href="{{ route('adopta', ['etapa' => 'todos']) }}" 
           class="filtro-btn {{ $etapaFiltro == 'todos' ? 'activo' : '' }}">
           Todos
        </a>

        <a href="{{ route('adopta', ['etapa' => 'cachorro']) }}" 
           class="filtro-btn {{ $etapaFiltro == 'cachorro' ? 'activo' : '' }}">
           Cachorros
        </a>

        <a href="{{ route('adopta', ['etapa' => 'joven']) }}" 
           class="filtro-btn {{ $etapaFiltro == 'joven' ? 'activo' : '' }}">
           Jóvenes
        </a>

        <a href="{{ route('adopta', ['etapa' => 'adulto']) }}" 
           class="filtro-btn {{ $etapaFiltro == 'adulto' ? 'activo' : '' }}">
           Adultos
        </a>
    </div>

    <!-- CARDS -->
    <div class="premium-grid">
        @forelse($animals as $animal)
            <div class="premium-card">
                <img src="{{ asset('img/' . ($animal->Anim_foto ?? 'placeholder.jpg')) }}" 
                     alt="{{ $animal->Anim_nombre }}">

                <div>
                    <h3>{{ $animal->Anim_nombre }}</h3>

                    <p>
                        {{ $animal->Anim_raza }} • {{ $animal->Anim_sexo }} <br>
                        {{ $animal->Anim_edad }}
                    </p>

                    <a href="{{ route('adopter.adoption.create', $animal->Anim_id) }}" 
                       class="premium-btn-adopter">
                        ¡Quiero Adoptarlo! ❤️
                    </a>
                </div>
            </div>
        @empty
            <p class="no-animals">
                No hay peluditos disponibles por ahora 🐾
            </p>
        @endforelse
    </div>
</section>
@endsection