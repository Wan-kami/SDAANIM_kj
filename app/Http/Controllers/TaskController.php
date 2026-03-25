<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * List tasks for the logged in volunteer.
     */
    public function index()
    {
        $tasks = Task::where('Usu_documento', Auth::user()->Usu_documento)
            ->latest()
            ->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Mark task as completed with a optional comment.
     */
    public function complete(Request $request, $id)
    {
        $task = Task::where('Tar_id', $id)
            ->where('Usu_documento', Auth::user()->Usu_documento)
            ->firstOrFail();

        $task->update([
            'Tar_estado' => 'Completada',
            'Tar_comentario' => $request->input('comentario')
        ]);

        return back()->with('success', 'Tarea marcada como completada.');
    }

    /**
     * Admin view to manage tasks.
     */
    public function adminIndex()
    {
        $tasks = Task::with('user')->latest()->get();
        $volunteers = User::where('role', 'Voluntario')->get();
        return view('admin.tasks.index', compact('tasks', 'volunteers'));
    }

    /**
     * Admin store task.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Usu_documento' => 'required|exists:users,Usu_documento',
            'Tar_titulo' => 'required|string|max:255',
            'Tar_descripcion' => 'required|string',
            'Tar_fecha_limite' => 'required|date',
        ]);

        Task::create([
            'Usu_documento' => $data['Usu_documento'],
            'Tar_titulo' => $data['Tar_titulo'],
            'Tar_descripcion' => $data['Tar_descripcion'],
            'Tar_fecha_limite' => $data['Tar_fecha_limite'],
            'Tar_fecha_asignacion' => now(),
            'Tar_estado' => 'Pendiente',
        ]);

        return back()->with('success', 'Tarea asignada exitosamente.');
    }
}
