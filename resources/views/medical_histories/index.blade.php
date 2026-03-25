@extends('layouts.vet.app')

@section('title', 'Historial Médico | SDAANIM')

@section('content')
<div style="max-width: 1000px; margin: 30px auto; padding: 20px;">
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
        <img src="{{ asset('img/' . $animal->Anim_foto) }}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #7FFFD4;">
        <h2>Historial de {{ $animal->Anim_nombre }}</h2>
    </div>

    <!-- FORMULARIO NUEVO REGISTRO -->
    <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-bottom: 40px; border-left: 5px solid #20B2AA;">
        <h3>Agregar Nueva Nota Médica</h3>
        <form action="{{ route('vet.history.store') }}" method="POST">
            @csrf
            <input type="hidden" name="Anim_id" value="{{ $animal->Anim_id }}">
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Diagnóstico / Descripción</label>
                <textarea name="His_descripcion" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" rows="3"></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Tratamiento / Observaciones</label>
                <textarea name="His_tratamiento" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" rows="2"></textarea>
            </div>

            <button type="submit" style="background: linear-gradient(90deg, #7FFFD4, #20B2AA); color: #333; font-weight: bold; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer;">Guardar Registro</button>
        </form>
    </div>

    <!-- LINEA DE TIEMPO / HISTORIAL -->
    <h3>Registros Anteriores</h3>
    @forelse($histories as $history)
        <div style="background: white; padding: 20px; border-radius: 12px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px;">
                <strong style="color: #20B2AA;">📅 {{ $history->His_fecha }}</strong>
                <small>Vet: {{ $history->vet->name }}</small>
            </div>
            <p><strong>Hallazgos:</strong> {{ $history->His_descripcion }}</p>
            @if($history->His_tratamiento)
                <p><strong>Tratamiento:</strong> {{ $history->His_tratamiento }}</p>
            @endif
        </div>
    @empty
        <p>No hay registros médicos previos para este animal.</p>
    @endforelse
</div>
@endsection
