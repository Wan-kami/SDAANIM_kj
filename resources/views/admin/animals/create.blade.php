@extends('layouts.admin.app')

@section('title', 'Agregar Animal | SDAANIM')

@section('content')
<div style="max-width: 800px; margin: 30px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <h2>Agregar Nuevo Animal</h2>
    <form action="{{ route('admin.animals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label style="display:block; margin-bottom: 5px;">Nombre</label>
                <input type="text" name="Anim_nombre" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Raza</label>
                <input type="text" name="Anim_raza" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Edad (ej: 2 años, 4 meses)</label>
                <input type="text" name="Anim_edad" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Sexo</label>
                <select name="Anim_sexo" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Estado</label>
                <select name="Anim_estado" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    <option value="Disponible">Disponible</option>
                    <option value="Adoptado">Adoptado</option>
                    <option value="En tratamiento">En tratamiento</option>
                </select>
            </div>
            <div>
                <label style="display:block; margin-bottom: 5px;">Foto</label>
                <input type="file" name="Anim_foto" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </div>
        </div>
        <div style="margin-top: 20px;">
            <label style="display:block; margin-bottom: 5px;">Historia</label>
            <textarea name="Anim_historia" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;" rows="4"></textarea>
        </div>
        <div style="margin-top: 30px; display: flex; gap: 10px;">
            <button type="submit" style="background: #2e8b57; color: white; border: none; padding: 12px 25px; border-radius: 8px; font-weight: bold; cursor: pointer;">Guardar Animal</button>
            <a href="{{ route('admin.animals.index') }}" style="background: #ccc; color: #333; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
