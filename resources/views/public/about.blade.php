@extends('layouts.adopter.app')

@section('title', 'Quiénes Somos | Esperanza Animal BQ')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/shared/pages.css') }}">

<main class="quienes-somos">
    <section class="banner-quienes">
        <h2>Quiénes Somos</h2>
        <p>Conoce nuestra misión, visión y valores como fundación dedicada al bienestar animal 🐾</p>
    </section>

    <section class="seccion">
        <h3>🐶 Nuestra Misión</h3>
        <p>Quitar la adopción responsable de animales rescatados, ofreciendo un sistema digital que optimice la gestión del refugio, facilite el acceso a la información de los animales en espera y agilice el proceso de adopción. Buscamos mejorar la calidad de vida de los peluditos y fomentar hogares responsables que les brinden amor y cuidado.</p>
    </section>

    <section class="seccion">
        <h3>🌟 Nuestra Visión</h3>
        <p>Para el año 2040 seremos una plataforma líder en adopción responsable de animales en Colombia, reconocida por su innovación tecnológica y su impacto social, expandiendo nuestra solución a múltiples refugios y convirtiéndonos en un referente en la protección animal y el bienestar comunitario.</p>
    </section>

    <section class="seccion valores">
        <h3>💡 Nuestros Valores</h3>
        <ul>
            <li>Compromiso</li>
            <li>Transparencia</li>
            <li>Innovación tecnológica</li>
            <li>Responsabilidad</li>
            <li>Empatía</li>
        </ul>
    </section>
</main>
@endsection
