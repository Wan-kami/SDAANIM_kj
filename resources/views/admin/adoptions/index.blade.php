@extends('layouts.admin.app')

@section('title', 'Solicitudes de Adopción | SDAANIM')

@section('content')
<div style="max-width: 1200px; margin: 30px auto; padding: 20px;">
    <h2>Solicitudes de Adopción Recibidas</h2>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-top: 20px;">
        <thead style="background: #2e8b57; color: white;">
            <tr>
                <th style="padding: 12px;">Fecha</th>
                <th style="padding: 12px;">Solicitante</th>
                <th style="padding: 12px;">Animal</th>
                <th style="padding: 12px;">Estado</th>
                <th style="padding: 12px;">Voluntario Asignado</th>
                <th style="padding: 12px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
                <tr style="border-bottom: 1px solid #eee; text-align: center;">
                    <td style="padding: 12px;">{{ $request->Soli_fecha }}</td>
                    <td style="padding: 12px;">{{ $request->user->name }}</td>
                    <td style="padding: 12px;">{{ $request->animal->Anim_nombre }}</td>
                    <td style="padding: 12px;">
                        <span style="padding: 4px 10px; border-radius: 20px; font-size: 0.85em; font-weight: bold; 
                            background: {{ $request->Soli_estado == 'Pendiente' ? '#fff3cd' : ($request->Soli_estado == 'Aprobada' ? '#d4edda' : '#f8d7da') }};
                            color: {{ $request->Soli_estado == 'Pendiente' ? '#856404' : ($request->Soli_estado == 'Aprobada' ? '#155724' : '#721c24') }};">
                            {{ $request->Soli_estado }}
                        </span>
                    </td>
                    <td style="padding: 12px;">
                        <form action="{{ route('admin.requests.approve', $request->Soli_id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="estado" value="{{ $request->Soli_estado }}">
                            <select name="voluntario_doc" onchange="this.form.submit()" style="padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
                                <option value="">Sin asignar</option>
                                @foreach($volunteers as $vol)
                                    <option value="{{ $vol->Usu_documento }}" {{ $request->Soli_voluntario == $vol->Usu_documento ? 'selected' : '' }}>
                                        {{ $vol->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td style="padding: 12px;">
                        <div style="display: flex; gap: 5px; justify-content: center;">
                            <form action="{{ route('admin.requests.approve', $request->Soli_id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="estado" value="Aprobada">
                                <button type="submit" style="background: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Aprobar</button>
                            </form>
                            <form action="{{ route('admin.requests.approve', $request->Soli_id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="estado" value="Rechazada">
                                <button type="submit" style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Rechazar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
