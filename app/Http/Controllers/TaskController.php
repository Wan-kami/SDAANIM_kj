<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // <--- Asegúrate de tener esta línea

class TaskController extends Controller
{
    /**
     * Mostrar tareas para el voluntario actual.
     */
    public function index()
    {
        $tasks = Task::where('Usu_documento', Auth::user()->Usu_documento)
            ->latest()
            ->get();

        return view('volunteer.tasks.index', compact('tasks'));
    }

    /**
     * MARCAR tarea como completada por voluntario.
     */
    public function complete($id)
    {
        $task = Task::findOrFail($id);

        if ($task->Usu_documento != Auth::user()->Usu_documento) {
            abort(403, 'No autorizado.');
        }

        $task->update(['Tar_estado' => 'Completada']);

        return back()->with('success', 'Tarea marcada como completada.');
    }

    /**
     * ACTUALIZAR estado de la tarea (opcional: pendiente, en proceso, etc.)
     */
    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'Tar_estado' => 'required|in:Pendiente,En Proceso,Completada',
        ]);

        $task->update(['Tar_estado' => $request->Tar_estado]);

        return back()->with('success', 'Estado de la tarea actualizado.');
    }

    /**
     * LISTAR todas las tareas para el ADMIN
     */
    // Mostrar todas las tareas en admin
    public function adminIndex()
    {
        // Traer todas las tareas con el usuario que las creó
        $tasks = Task::with('user')->latest()->get();

        // Traer todos los voluntarios (ajusta según tu campo de rol)
        $volunteers = User::where('role', 'voluntario')->get();

        return view('admin.tasks.index', compact('tasks', 'volunteers'));
    }

    /**
     * CREAR una tarea desde el admin (opcional)
     */
    public function store(Request $request)
    {
        $request->validate([
            'Usu_documento' => 'required|exists:users,Usu_documento',
            'Tar_titulo' => 'required|string|max:255',
            'Tar_descripcion' => 'nullable|string',
            'Tar_fecha_limite' => 'required|date',
        ]);

        Task::create([
            'Usu_documento' => $request->Usu_documento,
            'Tar_titulo' => $request->Tar_titulo,
            'Tar_descripcion' => $request->Tar_descripcion,
            'Tar_fecha_asignacion' => now(),
            'Tar_fecha_limite' => $request->Tar_fecha_limite,
            'Tar_estado' => 'Pendiente',
        ]);

        return back()->with('success', 'Tarea creada correctamente.');
    }

    // Asignar voluntario a la tarea
    public function assignVolunteer(Request $request, $taskId)
    {
        $request->validate([
            'voluntario_doc' => 'required|exists:users,Usu_documento',
            'Tar_fecha_limite' => 'required|date',
            'Tar_hora' => 'nullable',
        ]);

        $task = Task::findOrFail($taskId);
        $task->Usu_documento = $request->voluntario_doc; // Asignar voluntario
        $task->Tar_fecha_limite = $request->Tar_fecha_limite;
        $task->Tar_hora = $request->Tar_hora;
        $task->save();

        return redirect()->route('admin.tasks.index')->with('success', 'Voluntario asignado correctamente.');
    }

    
}