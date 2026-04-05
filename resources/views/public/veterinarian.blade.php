@extends('layouts.adopter.app')

@section('title', 'Quiero ser Veterinario')

@section('content')
<style>
    .role-page {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 20px 50px;
    }
    .role-hero {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 30px;
        background: #eaf5fb;
        border-radius: 25px;
        padding: 35px;
        box-shadow: 0 10px 35px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }
    .role-hero h1 {
        margin: 0 0 15px;
        font-size: 2.4rem;
        color: #0f4f6f;
    }
    .role-hero p {
        line-height: 1.8;
        color: #2f4f60;
        font-size: 1rem;
    }
    .role-hero .hero-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 10px 24px rgba(0,0,0,0.08);
    }
    .role-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 35px;
    }
    .role-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    }
    .role-card h3 {
        margin-top: 0;
        color: #0f4f6f;
    }
    .role-card ul {
        padding-left: 18px;
        color: #3b5565;
    }
    .role-card ul li {
        margin-bottom: 10px;
    }
    .role-form {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }
    .role-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #0f4f6f;
    }
    .role-form input,
    .role-form textarea,
    .role-form select {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 18px;
        border: 1px solid #d7e6ef;
        border-radius: 12px;
        font-size: 0.95rem;
        color: #2f4f60;
        background: #f8fbff;
    }
    .role-form textarea { min-height: 110px; resize: vertical; }
    .role-form button {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 999px;
        background: #0f4f6f;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: transform 0.2s ease, background 0.2s ease;
    }
    .role-form button:hover {
        background: #0a3b54;
        transform: translateY(-1px);
    }
    .alert-success {
        max-width: 1100px;
        margin: 20px auto;
        padding: 16px 20px;
        border-radius: 15px;
        background: #dfefff;
        color: #0f4f6f;
        border: 1px solid #bed6ed;
    }
    .alert-error {
        max-width: 1100px;
        margin: 20px auto;
        padding: 16px 20px;
        border-radius: 15px;
        background: #fde6e6;
        color: #7f1f1f;
        border: 1px solid #f1c6c6;
    }
</style>

<div class="role-page">
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert-error">
            <ul style="margin:0; padding-left: 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="role-hero">
        <div>
            <h1>Conviértete en Veterinario</h1>
            <p>Si eres profesional en medicina veterinaria y querés ayudar a nuestros peluditos del refugio, tu experiencia es clave para su bienestar y recuperación.</p>
            <div class="role-card" style="margin-top: 20px;">
                <h3>Tu apoyo puede ser:</h3>
                <ul>
                    <li>Atención médica en el refugio.</li>
                    <li>Seguimiento de animales en adopción.</li>
                    <li>Asesoría en campañas de salud y esterilización.</li>
                </ul>
            </div>
        </div>
        <div class="hero-card">
            <img src="{{ asset('img/Veterinarios.jpeg') }}" alt="Veterinario" style="width: 100%; border-radius: 18px; object-fit: cover; height: 100%;">
        </div>
    </div>

    <div class="role-grid">
        <div class="role-card">
            <h3>Requisitos</h3>
            <ul>
                <li>Título profesional veterinario.</li>
                <li>Experiencia en atención de perros y gatos.</li>
                <li>Compromiso con el cuidado y la salud animal.</li>
            </ul>
        </div>
        <div class="role-card">
            <h3>Qué buscamos</h3>
            <ul>
                <li>Disponibilidad para consultas y procedimientos.</li>
                <li>Responsabilidad en seguimiento de tratamientos.</li>
                <li>Vocación por el trabajo en equipo.</li>
            </ul>
        </div>
    </div>

    <div class="role-form">
        <h2 style="margin-top:0; color:#0f4f6f;">Inscríbete como Veterinario</h2>
        <form action="{{ route('inscriptions.store') }}" method="POST">
            @csrf
            <input type="hidden" name="ins_tipo_rol" value="veterinario">
            <label for="ins_documento">Documento</label>
            <input type="text" id="ins_documento" name="ins_documento" value="{{ old('ins_documento') }}" required>

            <label for="ins_nombre">Nombre completo</label>
            <input type="text" id="ins_nombre" name="ins_nombre" value="{{ old('ins_nombre') }}" required>

            <label for="ins_email">Correo electrónico</label>
            <input type="email" id="ins_email" name="ins_email" value="{{ old('ins_email') }}" required>

            <label for="ins_telefono">Teléfono</label>
            <input type="text" id="ins_telefono" name="ins_telefono" value="{{ old('ins_telefono') }}">

            <label for="ins_direccion">Dirección</label>
            <input type="text" id="ins_direccion" name="ins_direccion" value="{{ old('ins_direccion') }}">

            <label for="ins_especialidad">Especialidad</label>
            <input type="text" id="ins_especialidad" name="ins_especialidad" value="{{ old('ins_especialidad') }}" placeholder="Ej: Medicina interna, cirugía, anestesia">

            <label for="ins_experiencia_anos">Años de experiencia</label>
            <input type="number" id="ins_experiencia_anos" name="ins_experiencia_anos" value="{{ old('ins_experiencia_anos') }}" min="0">

            <label for="ins_certificado">Certificado o título</label>
            <input type="text" id="ins_certificado" name="ins_certificado" value="{{ old('ins_certificado') }}" placeholder="Nombre de la institución o título">

            <label for="ins_tipo_ayuda">Tipo de apoyo que puedes brindar</label>
            <select id="ins_tipo_ayuda" name="ins_tipo_ayuda" required>
                <option value="">Selecciona una opción</option>
                <option value="Consultas" {{ old('ins_tipo_ayuda') == 'Consultas' ? 'selected' : '' }}>Consultas</option>
                <option value="Cirugías" {{ old('ins_tipo_ayuda') == 'Cirugías' ? 'selected' : '' }}>Cirugías</option>
                <option value="Urgencias" {{ old('ins_tipo_ayuda') == 'Urgencias' ? 'selected' : '' }}>Urgencias</option>
                <option value="Campañas de salud" {{ old('ins_tipo_ayuda') == 'Campañas de salud' ? 'selected' : '' }}>Campañas de salud</option>
            </select>

            <label for="ins_comentario">Háblanos de tu experiencia</label>
            <textarea id="ins_comentario" name="ins_comentario" placeholder="Describe tu experiencia clínica, voluntariados previos o disponibilidad.">{{ old('ins_comentario') }}</textarea>

            <button type="submit">Inscribirme</button>
        </form>
    </div>
</div>
@endsection
