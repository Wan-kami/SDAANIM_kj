@extends('layouts.vet.app')

@section('title', 'Lista de Animales | SDAANIM')

@section('content')
<div style="max-width: 1000px; margin: 30px auto; padding: 20px;">
    <a href="{{ route('dashboard') }}" style="display: inline-block; margin-bottom: 20px; background: #f1f5f9; color: #475569; padding: 8px 15px; border-radius: 8px; text-decoration: none; font-weight: bold;">← Volver al Inicio</a>
    <h2>Animales Registrados</h2>
    <p>Selecciona un animal para ver su historial médico o agregar registros.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-top: 30px;">
        @foreach($animals as $animal)
            <div style="background: white; border-radius: 15px; padding: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid #7FFFD4;">
                <img src="{{ asset('img/' . ($animal->Anim_foto ?? 'placeholder.jpg')) }}" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 10px;">
                <h3>{{ $animal->Anim_nombre }}</h3>
                <p>{{ $animal->Anim_raza }} - {{ $animal->Anim_edad }}</p>
                <a href="{{ route('vet.history', $animal->Anim_id) }}" style="display: inline-block; margin-top: 10px; background: #20B2AA; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; font-weight: bold;">Ver Historial Médico</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
