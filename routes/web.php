@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Mis Tareas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($tasks->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Observado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <form action="{{ route('volunteer.tasks.updateStatus', ['id' => $task->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pendiente" {{ $task->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="en_proceso" {{ $task->status == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                                <option value="completado" {{ $task->status == 'completado' ? 'selected' : '' }}>Completado</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('volunteer.tasks.toggleObserved', ['id' => $task->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                {{ $task->observed ? 'Desmarcar' : 'Observar' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tienes tareas asignadas.</p>
    @endif
</div>
@endsection