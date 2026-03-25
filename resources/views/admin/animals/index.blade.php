@extends('layouts.admin.app')

@section('title', 'Gestión de Animales | SDAANIM')

@section('content')
<div style="max-width: 1100px; margin: 30px auto; padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2>Animales en el Refugio</h2>
        <a href="{{ route('admin.animals.create') }}" style="background: #2e8b57; color: white; padding: 10px 20px; border-radius: 8px; font-weight: bold; text-decoration: none;">+ Agregar Animal</a>
    </div>
    
    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <thead style="background: #2e8b57; color: white;">
            <tr>
                <th style="padding: 12px;">Foto</th>
                <th style="padding: 12px;">Nombre</th>
                <th style="padding: 12px;">Raza</th>
                <th style="padding: 12px;">Estado</th>
                <th style="padding: 12px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
                <tr style="border-bottom: 1px solid #eee; text-align: center;">
                    <td style="padding: 12px;"><img src="{{ asset('img/' . $animal->Anim_foto) }}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"></td>
                    <td style="padding: 12px;">{{ $animal->Anim_nombre }}</td>
                    <td style="padding: 12px;">{{ $animal->Anim_raza }}</td>
                    <td style="padding: 12px;">{{ $animal->Anim_estado }}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('admin.animals.edit', $animal->Anim_id) }}" style="color: #007bff; font-weight: bold; margin-right: 10px;">Editar</a>
                        <a href="#" style="color: #dc3545; font-weight: bold;">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
