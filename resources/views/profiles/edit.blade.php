@extends('layouts.adopter.app')

@section('title', 'Mi Perfil | SDAANIM')

@section('content')
<div style="max-width: 700px; margin: 30px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 30px;">Mi Perfil</h2>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('adopter.profile') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Nombre Completo</label>
            <input type="text" name="name" value="{{ $user->name }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Correo Electrónico</label>
            <input type="email" name="email" value="{{ $user->email }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Teléfono</label>
            <input type="text" name="Usu_telefono" value="{{ $user->Usu_telefono }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Dirección</label>
            <input type="text" name="Usu_direccion" value="{{ $user->Usu_direccion }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
        </div>

        <hr style="margin: 30px 0; border: 0.5px solid #eee;">
        
        <p style="color: #666; font-size: 0.9em; margin-bottom: 15px;">Deja en blanco si no deseas cambiar la contraseña.</p>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold;">Nueva Contraseña</label>
            <input type="password" name="password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; font-weight: bold;">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
        </div>

        <button type="submit" style="width: 100%; background: #2e8b57; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer;">
            Actualizar Perfil
        </button>
    </form>
</div>
@endsection
