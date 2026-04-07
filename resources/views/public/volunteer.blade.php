@extends('layouts.adopter.app')

@section('title', 'Quiero ser Voluntario')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/shared/pages.css') }}">

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
            <h1>Conviértete en Voluntario</h1>
            <p>Ayuda con el cuidado, transporte, alimentación y bienestar de los animales. Tú puedes ser la diferencia para perros y gatos que necesitan compañía, amor y atención.</p>
            <div class="role-card" style="margin-top: 20px;">
                <h3>¿Qué hacemos juntos?</h3>
                <ul>
                    <li>Recogida de donaciones y entrega de alimentos.</li>
                    <li>Apoyo en jornadas de adopción y eventos.</li>
                    <li>Cuidado diario de peluditos en el refugio.</li>
                </ul>
            </div>
        </div>
        <div class="hero-card">
            <img src="{{ asset('img/Volun.jpg') }}" alt="Voluntario" style="width: 100%; border-radius: 18px; object-fit: cover; height: 100%;">
        </div>
    </div>

    <div class="role-grid">
        <div class="role-card">
            <h3>Requisitos</h3>
            <ul>
                <li>Amar a los animales.</li>
                <li>Ser mayor de 16 años o venir acompañado de un adulto.</li>
                <li>Tener ganas de sumar y aprender.</li>
            </ul>
        </div>
        <div class="role-card">
            <h3>Beneficios</h3>
            <ul>
                <li>Formar parte de un equipo comprometido.</li>
                <li>Participar en actividades con mascotas.</li>
                <li>Recibir reconocimiento por tu tiempo y dedicación.</li>
            </ul>
        </div>
    </div>

    <div class="role-form">
        <h2 style="margin-top:0; color:#1f4d28;">Inscríbete como Voluntario</h2>
        <form action="{{ route('inscriptions.store') }}" method="POST">
            @csrf
            <input type="hidden" name="ins_tipo_rol" value="voluntario">
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

            <label for="ins_tipo_ayuda">¿En qué te gustaría ayudar?</label>
            <select id="ins_tipo_ayuda" name="ins_tipo_ayuda" required>
                <option value="">Selecciona una opción</option>
                <option value="Transporte" {{ old('ins_tipo_ayuda') == 'Transporte' ? 'selected' : '' }}>Transporte</option>
                <option value="Cuidado" {{ old('ins_tipo_ayuda') == 'Cuidado' ? 'selected' : '' }}>Cuidado</option>
                <option value="Eventos" {{ old('ins_tipo_ayuda') == 'Eventos' ? 'selected' : '' }}>Eventos</option>
                <option value="Otros" {{ old('ins_tipo_ayuda') == 'Otros' ? 'selected' : '' }}>Otros</option>
            </select>

            <label for="ins_comentario">Contanos un poco sobre ti</label>
            <textarea id="ins_comentario" name="ins_comentario" placeholder="¿Tienes experiencia con animales? ¿También puedes apoyar con logística?">{{ old('ins_comentario') }}</textarea>

            <button type="submit">Inscribirme</button>
        </form>
    </div>
</div>
@endsection
