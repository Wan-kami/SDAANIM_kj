<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Show donation info/form.
     */
    public function create()
    {
        return view('donations.create');
    }

    /**
     * Store donation record.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Don_monto' => 'required|numeric|min:1000',
            'Don_metodo_pago' => 'required|string|in:Nequi,PayPal,Daviplata,Bancolombia',
        ]);

        Donation::create([
            'Usu_documento' => Auth::id(), // Auth::id() returns the primary key which is Usu_documento
            'Don_monto' => $data['Don_monto'],
            'Don_metodo_pago' => $data['Don_metodo_pago'],
            'Don_fecha' => now(),
        ]);

        return back()->with('success', '¡Gracias por tu donación! Tu apoyo es fundamental.');
    }
}
