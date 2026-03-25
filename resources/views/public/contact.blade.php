@extends('layouts.adopter.app')

@section('title', 'Contacto | SDAANIM')

@section('content')
<div style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
    <div style="text-align: center; margin-bottom: 40px;">
        <h2>Ponte en Contacto</h2>
        <p>¿Tienes dudas o quieres apoyarnos de alguna otra forma? ¡Escríbenos!</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <h3>Información de Contacto</h3>
            <p><strong>📍 Ubicación:</strong> Barranquilla, Colombia</p>
            <p><strong>📞 Teléfono:</strong> +57 300 123 4567</p>
            <p><strong>✉️ Email:</strong> contacto@sdaanim.com</p>
            <hr style="border: 0.5px solid #eee; margin: 20px 0;">
            <p><strong>SÍGUENOS:</strong></p>
            <p>Facebook | Instagram | Twitter</p>
        </div>

        <form style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom: 5px;">Nombre</label>
                <input type="text" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom: 5px;">Asunto</label>
                <input type="text" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom: 5px;">Mensaje</label>
                <textarea style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px;" rows="4"></textarea>
            </div>
            <button type="button" style="width: 100%; background: #2e8b57; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer;">Enviar Mensaje</button>
        </form>
    </div>
</div>
@endsection
