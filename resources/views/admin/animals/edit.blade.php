@extends('layouts.admin.app')

@section('title', 'Editar Animal | SDAANIM')

@section('content')
<div style="max-width: 800px; margin: 30px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <h2>Editar Peludito: {{ $animal->Anim_nombre }}</h2>
    <form action="{{ route('admin.animals.update', $animal->Anim_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label style="display:block; margin-bottom: 5px;">Nombre</label>
                <input type="text" name="Anim_nombre" value="{{ $animal->Anim_nombre }}" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Raza</label>
                <input type="text" name="Anim_raza" value="{{ $animal->Anim_raza }}" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Edad</label>
                <input type="text" name="Anim_edad" value="{{ $animal->Anim_edad }}" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Sexo</label>
                <select name="Anim_sexo" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    <option value="Macho" {{ $animal->Anim_sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                    <option value="Hembra" {{ $animal->Anim_sexo == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                </select>
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Estado</label>
                <select name="Anim_estado" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    <option value="Disponible" {{ $animal->Anim_estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Adoptado" {{ $animal->Anim_estado == 'Adoptado' ? 'selected' : '' }}>Adoptado</option>
                    <option value="En tratamiento" {{ $animal->Anim_estado == 'En tratamiento' ? 'selected' : '' }}>En tratamiento</option>
                </select>
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Foto (Opcional)</label>
                <input type="file" name="Anim_foto" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                @if($animal->Anim_foto)
                    <small>Actual: {{ $animal->Anim_foto }}</small>
                @endif
            </div>
        </div>
        <div style="margin-top: 20px;">
            <label style="display:block; margin-bottom: 5px;">Historia</label>
            <textarea name="Anim_historia" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" rows="4">{{ $animal->Anim_historia }}</textarea>
        </div>
        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <button type="submit" style="background: #20B2AA; color: white; border: none; padding: 12px 25px; border-radius: 8px; font-weight: bold; cursor: pointer;">Actualizar Animal</button>
            <a href="{{ route('admin.animals.index') }}" style="background: #ccc; color: #333; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
