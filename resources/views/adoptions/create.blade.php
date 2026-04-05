@extends('layouts.adopter.app')

@section('title', 'Solicitud de Adopción')

@section('content')
<main class="formulario-adopcion" style="max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <a href="{{ route('adopta') }}" style="display: inline-block; margin-bottom: 20px; background: #f1f5f9; color: #475569; padding: 8px 15px; border-radius: 8px; text-decoration: none; font-weight: bold;">← Volver</a>
    <section class="intro-formulario" style="text-align: center; margin-bottom: 30px;">
        <h2>Solicitud de Adopción</h2>
        <p>Formulario para aplicar a la adopción de un animal.</p>
    </section>

    <!-- RESUMEN DEL ANIMAL -->
    <section class="animal-resumen" style="background:#f4f4f4; padding:20px; margin-bottom:25px; border-radius:10px; display:flex; align-items:center; gap:20px;">
        <img src="{{ asset('img/' . $animal->Anim_foto) }}" style="width:120px; height:120px; border-radius:10px; object-fit:cover;">
        <div>
            <h3>{{ $animal->Anim_nombre }}</h3>
            <p><strong>Raza:</strong> {{ $animal->Anim_raza }}</p>
            <p><strong>Edad:</strong> {{ $animal->Anim_edad }}</p>
        </div>
    </section>

    <form action="{{ route('adopter.adoption.store') }}" method="POST">
        @csrf
        <input type="hidden" name="animal_id" value="{{ $animal->Anim_id }}">

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Motivo de adopción</label>
            <textarea name="motivo" rows="3" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" placeholder="¿Por qué deseas adoptar a este animal?"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px;">¿Tienes otras mascotas?</label>
            <input type="text" name="otras_mascotas" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" placeholder="Ej: 1 perro, 2 gatos">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Tipo de vivienda</label>
            <select name="tipo_vivienda" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                <option value="">Seleccione...</option>
                <option value="Casa">Casa</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Finca">Finca</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Tiempo disponible p/animal</label>
            <input type="text" name="tiempo_disponible" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" placeholder="Ej: 2 horas al día">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Comentarios adicionales</label>
            <textarea name="comentarios" rows="3" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" placeholder="Alguna otra información relevante"></textarea>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" style="background:#2e8b57; color:white; padding:12px 30px; border:none; border-radius:8px; font-weight:bold; cursor:pointer;">Enviar Solicitud</button>
            <a href="{{ route('adopta') }}" style="margin-left:15px; text-decoration:none; color:#666; font-weight:bold;">Volver</a>
        </div>
    </form>
</main>
@endsection
