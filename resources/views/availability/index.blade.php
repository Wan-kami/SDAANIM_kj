@extends(Auth::user()->role == 'Veterinario' ? 'layouts.vet.app' : 'layouts.volunteer.app')

@section('title', 'Mi Disponibilidad | SDAANIM')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/adopter/animals.css') }}">
@endsection

@section('content')
<div class="container">

    <!-- HEADER -->
    <div class="header">
        <h2>Mi Disponibilidad / Horario</h2>
        <a href="{{ route('dashboard') }}" class="btn-volver">← Volver al Panel</a>
    </div>

    <!-- ALERTAS -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORMULARIO AGREGAR -->
    <div class="card">
        <h3>Agregar Nuevo Horario</h3>

        <form action="{{ route(Auth::user()->role == 'Veterinario' ? 'vet.availability.store' : 'volunteer.availability.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div>
                    <label>Fecha</label>
                    <input type="date" name="Ava_date" required min="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label>Hora Inicio</label>
                    <input type="time" name="Ava_start_time" required>
                </div>
                <div>
                    <label>Hora Fin</label>
                    <input type="time" name="Ava_end_time" required>
                </div>
            </div>
            <button type="submit" class="btn-primary">Guardar Disponibilidad</button>
        </form>
    </div>

    <!-- TABLA HORARIOS -->
    <h3>Mis Próximos Horarios</h3>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Estado</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($availabilities as $ava)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($ava->Ava_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($ava->Ava_start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($ava->Ava_end_time)->format('H:i') }}</td>
                    <td><span class="badge">{{ $ava->Ava_status }}</span></td>
                    <td style="text-align:center;">
                        <form action="{{ route(Auth::user()->role == 'Veterinario' ? 'vet.availability.destroy' : 'volunteer.availability.destroy', $ava->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" title="Eliminar">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding:30px; color:#666;">
                        No has programado disponibilidad aún.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection