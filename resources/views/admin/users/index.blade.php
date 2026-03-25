@extends('layouts.admin.app')

@section('title', 'Gestión de Usuarios | SDAANIM')

@section('content')
<div style="max-width: 1100px; margin: 30px auto; padding: 20px;">
    <h2>Usuarios del Sistema</h2>
    <p>Administra los roles y estados de los usuarios registrados.</p>
    
    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-top: 20px;">
        <thead style="background: #2e8b57; color: white;">
            <tr>
                <th style="padding: 12px;">Documento</th>
                <th style="padding: 12px;">Nombre</th>
                <th style="padding: 12px;">Email</th>
                <th style="padding: 12px;">Rol</th>
                <th style="padding: 12px;">Estado</th>
                <th style="padding: 12px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr style="border-bottom: 1px solid #eee; text-align: center;">
                    <td style="padding: 12px;">{{ $user->Usu_documento }}</td>
                    <td style="padding: 12px;">{{ $user->name }}</td>
                    <td style="padding: 12px;">{{ $user->email }}</td>
                    <td style="padding: 12px;">
                        <span style="padding: 4px 10px; border-radius: 20px; font-size: 0.85em; font-weight: bold; background: #e9f7ef; color: #2e8b57;">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td style="padding: 12px;">
                        <span style="color: {{ $user->status == 'Activo' ? '#28a745' : '#dc3545' }}; font-weight: bold;">
                            {{ $user->status }}
                        </span>
                    </td>
                    <td style="padding: 12px;">
                        <button style="background: #20B2AA; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Editar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
