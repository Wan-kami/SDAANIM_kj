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

                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <a href="{{ route('adopter.adoption.create', $animal->Anim_id) }}" 
                           class="premium-btn-adopter" style="flex: 1; text-align: center;">
                            ¡Quiero Adoptarlo! ❤️
                        </a>
                        <button onclick="openAnimalMedicalHistory({{ $animal->Anim_id }}, '{{ $animal->Anim_nombre }}')" 
                                style="background: #e8f5e9; color: #1e7e34; border: 2px solid #1e7e34; padding: 8px 12px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 14px; white-space: nowrap;">
                            📋 Historial
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="no-animals">
                No hay peluditos disponibles por ahora 🐾
            </p>
        @endforelse
    </div>

    <!-- Modal para Historial Médico del Animal -->
    <div id="animalMedicalHistoryModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; border-radius: 12px; max-width: 700px; width: 90%; max-height: 80vh; overflow-y: auto; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.3);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 id="animalModalTitle" style="margin: 0; color: #1e7e34;">📋 Historial Médico</h2>
            <button onclick="closeAnimalMedicalHistory()" style="background: #e2e8f0; border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 20px; cursor: pointer; display: flex; align-items: center; justify-content: center;">✕</button>
        </div>

        <div id="animalMedicalHistoryContent" style="text-align: center;">
            <p style="color: #64748b;">Cargando historial médico...</p>
        </div>

        <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #e2e8f0; text-align: right;">
            <button onclick="closeAnimalMedicalHistory()" style="background: #1e7e34; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">Cerrar</button>
        </div>
    </div>
</div>

<script>
function openAnimalMedicalHistory(animalId, animalName) {
    const modal = document.getElementById('animalMedicalHistoryModal');
    const titleEl = document.getElementById('animalModalTitle');
    const contentEl = document.getElementById('animalMedicalHistoryContent');

    titleEl.textContent = '📋 Historial Médico - ' + animalName;
    contentEl.innerHTML = '<p style="color: #64748b;">Cargando historial médico...</p>';

    // Simular carga de datos (en producción sería una llamada AJAX)
    fetch(`/api/animal/${animalId}/medical-history`)
        .then(response => response.json())
        .then(data => {
            if (data.histories && data.histories.length > 0) {
                let html = '';
                data.histories.forEach(history => {
                    html += `
                        <div style="background: #f9fafb; padding: 15px; margin-bottom: 15px; border-left: 4px solid #1e7e34; border-radius: 8px; text-align: left;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div>
                                    <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Fecha:</strong></p>
                                    <p style="margin: 5px 0; color: #1e293b;">${history.fecha}</p>
                                </div>
                                <div>
                                    <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Veterinario:</strong></p>
                                    <p style="margin: 5px 0; color: #1e293b;">${history.vet}</p>
                                </div>
                            </div>

                            <div style="margin-top: 10px;">
                                <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Diagnóstico:</strong></p>
                                <p style="margin: 5px 0; color: #1e293b;">${history.diagnostico || 'No especificado'}</p>
                            </div>

                            <div style="margin-top: 10px;">
                                <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Tratamiento:</strong></p>
                                <p style="margin: 5px 0; color: #1e293b;">${history.tratamiento || 'No especificado'}</p>
                            </div>

                            ${history.observaciones ? `
                                <div style="margin-top: 10px;">
                                    <p style="margin: 5px 0; font-size: 13px; color: #64748b;"><strong>Observaciones:</strong></p>
                                    <p style="margin: 5px 0; color: #1e293b;">${history.observaciones}</p>
                                </div>
                            ` : ''}
                        </div>
                    `;
                });
                contentEl.innerHTML = html;
            } else {
                contentEl.innerHTML = `
                    <div style="text-align: center; padding: 40px 20px; color: #64748b;">
                        <p style="font-size: 16px;">No hay registros de historial médico disponibles.</p>
                        <p style="font-size: 14px;">El animal está en perfecto estado de salud. ✓</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            contentEl.innerHTML = '<p style="color: #e53e3e; text-align: center;">Error al cargar el historial médico. Por favor, intenta nuevamente.</p>';
        });

    modal.style.display = 'flex';
}

function closeAnimalMedicalHistory() {
    document.getElementById('animalMedicalHistoryModal').style.display = 'none';
}

// Cerrar modal al hacer clic fuera de él
document.getElementById('animalMedicalHistoryModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAnimalMedicalHistory();
    }
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAnimalMedicalHistory();
    }
});
</script>
</section>
@endsection