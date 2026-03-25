<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    /**
     * Show form to request adoption.
     */
    public function create($animal_id)
    {
        $animal = Animal::findOrFail($animal_id);
        return view('adoptions.create', compact('animal'));
    }

    /**
     * Store request.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'animal_id' => 'required|exists:animals,Anim_id',
            'motivo' => 'required|string',
            'otras_mascotas' => 'nullable|string',
            'tipo_vivienda' => 'required|string',
            'tiempo_disponible' => 'required|string',
            'comentarios' => 'nullable|string',
        ]);

        AdoptionRequest::create([
            'Usu_documento' => Auth::user()->Usu_documento,
            'Anim_id' => $data['animal_id'],
            'Soli_motivo' => $data['motivo'],
            'Soli_otras_mascotas' => $data['otras_mascotas'],
            'Soli_tipo_vivienda' => $data['tipo_vivienda'],
            'Soli_tiempo_disponible' => $data['tiempo_disponible'],
            'Soli_comentarios' => $data['comentarios'],
            'Soli_estado' => 'Pendiente',
        ]);

        return redirect()->route('adopter.requests')->with('success', 'Solicitud enviada correctamente.');
    }

    /**
     * List user's requests.
     */
    public function userRequests()
    {
        $requests = AdoptionRequest::where('Usu_documento', Auth::user()->Usu_documento)
            ->with('animal')
            ->latest()
            ->get();
        return view('adoptions.user_index', compact('requests'));
    }

    /**
     * Admin list.
     */
    public function adminIndex()
    {
        $requests = AdoptionRequest::with(['animal', 'user'])->latest()->get();
        $volunteers = \App\Models\User::where('role', 'Voluntario')->get();
        return view('admin.adoptions.index', compact('requests', 'volunteers'));
    }

    /**
     * Approve or reject request.
     */
    public function approve(Request $request, $id)
    {
        $solicitud = AdoptionRequest::findOrFail($id);
        
        $data = $request->validate([
            'estado' => 'required|in:Aprobada,Rechazada,Pendiente',
            'voluntario_doc' => 'nullable|exists:users,Usu_documento'
        ]);

        $solicitud->update([
            'Soli_estado' => $data['estado'],
            'Soli_voluntario' => $data['voluntario_doc'],
        ]);

        // If approved, mark animal as adopted
        if ($data['estado'] === 'Aprobada') {
            $solicitud->animal->update(['Anim_estado' => 'Adoptado']);
        } else {
            // If changed from Aprobada to something else, mark as Available
            $solicitud->animal->update(['Anim_estado' => 'Disponible']);
        }

        return back()->with('success', 'Estado de la solicitud actualizado.');
    }
}
