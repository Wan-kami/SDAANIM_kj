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
    <section class="animal-resumen" style="background:#f4f4f4; padding:20px; margin-bottom:25px; border-radius:10px;">
        <h3 style="margin-top: 0; margin-bottom: 15px;">{{ $animal->Anim_nombre }}</h3>
        
        <div style="display:flex; align-items:center; gap:20px; margin-bottom: 15px;">
            <img src="{{ asset('img/' . $animal->Anim_foto) }}" style="width:120px; height:120px; border-radius:10px; object-fit:cover;">
            <div>
                <p><strong>Raza:</strong> {{ $animal->Anim_raza }}</p>
                <p><strong>Edad:</strong> {{ $animal->Anim_edad }}</p>
            </div>
        </div>
        
        <button type="button" style="background:#1e7e34; color:white; padding:8px 16px; border:none; border-radius:6px; font-weight:bold; cursor:pointer;" onclick="openMedicalHistory()">📋 Ver Historial Médico</button>
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

<!-- Modal para Historial Médico -->
<div id="medicalHistoryModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; border-radius: 12px; max-width: 700px; width: 90%; max-height: 80vh; overflow-y: auto; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.3);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="margin: 0; color: #1e7e34;">📋 Historial Médico - {{ $animal->Anim_nombre }}</h2>
            <button onclick="closeMedicalHistory()" style="background: #e2e8f0; border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 20px; cursor: pointer; display: flex; align-items: center; justify-content: center;">✕</button>
        </div>

        <div id="medicalHistoryContent">
            @if($animal->medicalHistories->count() > 0)
                @foreach($animal->medicalHistories as $history)
                    <div style="background: #f9fafb; padding: 15px; margin-bottom: 15px; border-left: 4px solid #1e7e34; border-radius: 8px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Fecha:</strong></p>
                                <p style="margin: 5px 0; color: #1e293b;">{{ \Carbon\Carbon::parse($history->Hist_fecha)->format('d/m/Y') }}</p>
                            </div>
                            <div>
                                <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Veterinario:</strong></p>
                                <p style="margin: 5px 0; color: #1e293b;">{{ $history->vet->name ?? 'No especificado' }}</p>
                            </div>
                        </div>

                        <div style="margin-top: 10px;">
                            <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Diagnóstico:</strong></p>
                            <p style="margin: 5px 0; color: #1e293b;">{{ $history->Hist_diagnostico ?? 'No especificado' }}</p>
                        </div>

                        <div style="margin-top: 10px;">
                            <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Tratamiento:</strong></p>
                            <p style="margin: 5px 0; color: #1e293b;">{{ $history->Hist_tratamiento ?? 'No especificado' }}</p>
                        </div>

                        @if($history->Hist_observaciones)
                            <div style="margin-top: 10px;">
                                <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Observaciones:</strong></p>
                                <p style="margin: 5px 0; color: #1e293b;">{{ $history->Hist_observaciones }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <div style="text-align: center; padding: 40px 20px; color: #64748b;">
                    <p style="font-size: 16px;">No hay registros de historial médico disponibles.</p>
                    <p style="font-size: 14px;">El animal está en perfecto estado de salud. ✓</p>
                </div>
            @endif
        </div>

        <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #e2e8f0; text-align: right;">
            <button onclick="closeMedicalHistory()" style="background: #1e7e34; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">Cerrar</button>
        </div>
    </div>
</div>

<script>
function openMedicalHistory() {
    document.getElementById('medicalHistoryModal').style.display = 'flex';
}

function closeMedicalHistory() {
    document.getElementById('medicalHistoryModal').style.display = 'none';
}

// Cerrar modal al hacer clic fuera de él
document.getElementById('medicalHistoryModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeMedicalHistory();
    }
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeMedicalHistory();
    }
});
</script>

@endsection
