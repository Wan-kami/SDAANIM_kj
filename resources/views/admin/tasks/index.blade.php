@extends('layouts.admin.app')

@section('title', 'Gestión de Tareas | SDAANIM')

@section('content')
<div style="max-width: 1100px; margin: 30px auto; padding: 20px;">
    <h2>Asignación de Tareas</h2>
    
    <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 40px;">
        <h3>Asignar Nueva Tarea</h3>
        <form action="{{ route('admin.tasks.store') }}" method="POST" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            @csrf
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Título de la Tarea</label>
                <input type="text" name="Tar_titulo" required placeholder="Ej: Alimentar perros, Limpieza patio..." style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Voluntario Responsable</label>
                <select name="Usu_documento" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    <option value="">Seleccione un voluntario</option>
                    @foreach($volunteers as $vol)
                        <option value="{{ $vol->Usu_documento }}">{{ $vol->name }} ({{ $vol->Usu_documento }})</option>
                    @endforeach
                </select>
            </div>
            <div style="grid-column: span 2;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Descripción Detallada</label>
                <textarea name="Tar_descripcion" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" rows="3"></textarea>
            </div>
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Fecha Límite</label>
                <input type="date" name="Tar_fecha_limite" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div style="display: flex; align-items: flex-end;">
                <button type="submit" style="background: #2e8b57; color: white; padding: 12px 25px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; width: 100%;" onmouseover="this.style.background='#246d43'" onmouseout="this.style.background='#2e8b57'">
                    Asignar Tarea ✅
                </button>
            </div>
        </form>
    </div>

    <h3>Historial de Tareas</h3>
    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <thead style="background: #2e8b57; color: white;">
            <tr>
                <th style="padding: 12px;">Voluntario</th>
                <th style="padding: 12px;">Título</th>
                <th style="padding: 12px;">Estado</th>
                <th style="padding: 12px;">Límite</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr style="border-bottom: 1px solid #eee; text-align: center;">
                    <td style="padding: 12px;">{{ $task->user->name }}</td>
                    <td style="padding: 12px;">{{ $task->Tar_titulo }}</td>
                    <td style="padding: 12px;">
                        <span style="padding: 4px 10px; border-radius: 20px; font-size: 0.85em; font-weight: bold; 
                            background: {{ $task->Tar_estado == 'Pendiente' ? '#fff3cd' : '#d4edda' }};
                            color: {{ $task->Tar_estado == 'Pendiente' ? '#856404' : '#155724' }};">
                            {{ $task->Tar_estado }}
                        </span>
                    </td>
                    <td style="padding: 12px;">{{ $task->Tar_fecha_limite }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
