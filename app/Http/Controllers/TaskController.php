<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Mostrar tareas para el voluntario/veterinario actual.
     */
    public function index()
    {
        $tasks = Task::where('Usu_documento', Auth::user()->Usu_documento)
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * MARCAR tarea como completada por voluntario/veterinario.
     */
    public function complete(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task->Usu_documento != Auth::user()->Usu_documento) {
            abort(403, 'No autorizado.');
        }

        $task->update([
            'Tar_estado' => 'Completada',
            'Tar_comentario' => $request->get('comentario'),
        ]);

        return back()->with('success', 'Tarea completada exitosamente.');
    }

    /**
     * ACTUALIZAR comentario de la tarea.
     */
    public function updateComment(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task->Usu_documento != Auth::user()->Usu_documento) {
            abort(403, 'No autorizado.');
        }

        $task->update([
            'Tar_comentario' => $request->get('comentario'),
        ]);

        return back()->with('success', 'Comentario de la tarea actualizado exitosamente.');
    }

    /**
     * ACTUALIZAR estado de la tarea (pendiente, observación, en proceso, etc.)
     */
    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'Tar_estado' => 'required|in:Pendiente,Observación,En Proceso,Completada',
        ]);

        $task->update(['Tar_estado' => $request->Tar_estado]);

        return back()->with('success', 'Estado de la tarea actualizado.');
    }

    /**
     * LISTAR todas las tareas para el ADMIN, con voluntarios y veterinarios
     */
    public function adminIndex()
    {
        $tasks = Task::with('user')->latest()->get();

        // Traer voluntarios Y veterinarios (con case correcto)
        $volunteers = User::whereIn('role', ['Voluntario', 'Veterinario'])->get();

        // Traer disponibilidad futura de cada voluntario/veterinario
        $availabilities = Availability::whereIn('Usu_documento', $volunteers->pluck('Usu_documento'))
            ->where('Ava_date', '>=', now()->toDateString())
            ->orderBy('Ava_date')
            ->orderBy('Ava_start_time')
            ->get()
            ->groupBy('Usu_documento');

        return view('admin.tasks.index', compact('tasks', 'volunteers', 'availabilities'));
    }

    /**
     * CREAR una tarea desde el admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'Usu_documento' => 'required|exists:users,Usu_documento',
            'Tar_titulo' => 'required|string|max:255',
            'Tar_descripcion' => 'nullable|string',
            'Tar_fecha_limite' => 'required|date',
            'Tar_hora' => 'nullable',
            'Tar_base' => 'nullable|string|max:255',
        ]);

        // Validar disponibilidad
        $usuarioRequerido = User::find($request->Usu_documento);
        if ($usuarioRequerido && in_array($usuarioRequerido->role, ['Voluntario', 'Veterinario'])) {
            $hasAvailability = Availability::where('Usu_documento', $request->Usu_documento)
                ->where('Ava_date', $request->Tar_fecha_limite)
                ->exists();

            if (!$hasAvailability) {
                throw ValidationException::withMessages([
                    'Usu_documento' => 'Rol fuera de disponibilidad para la fecha límite indicada.'
                ]);
            }
        }

        Task::create([
            'Usu_documento' => $request->Usu_documento,
            'Tar_titulo' => $request->Tar_titulo,
            'Tar_descripcion' => $request->Tar_descripcion,
            'Tar_fecha_asignacion' => now(),
            'Tar_fecha_limite' => $request->Tar_fecha_limite,
            'Tar_hora' => $request->Tar_hora,
            'Tar_base' => $request->Tar_base,
            'Tar_estado' => 'Pendiente',
        ]);

        return back()->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Asignar voluntario/veterinario a una tarea existente
     */
    public function assignVolunteer(Request $request, $taskId)
    {
        $request->validate([
            'voluntario_doc' => 'required|exists:users,Usu_documento',
            'Tar_fecha_limite' => 'required|date',
            'Tar_hora' => 'nullable',
        ]);

        // Validar disponibilidad
        $usuarioRequerido = User::find($request->voluntario_doc);
        if ($usuarioRequerido && in_array($usuarioRequerido->role, ['Voluntario', 'Veterinario'])) {
            $hasAvailability = Availability::where('Usu_documento', $request->voluntario_doc)
                ->where('Ava_date', $request->Tar_fecha_limite)
                ->exists();

            if (!$hasAvailability) {
                throw ValidationException::withMessages([
                    'voluntario_doc' => 'Rol fuera de disponibilidad para la fecha indicada.'
                ]);
            }
        }

        $task = Task::findOrFail($taskId);
        $task->Usu_documento = $request->voluntario_doc;
        $task->Tar_fecha_limite = $request->Tar_fecha_limite;
        $task->Tar_hora = $request->Tar_hora;
        $task->save();

        return redirect()->route('admin.tasks.index')->with('success', 'Voluntario/Veterinario asignado correctamente.');
    }
}