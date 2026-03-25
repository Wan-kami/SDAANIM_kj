@extends('layouts.adopter.app')

@section('title', 'Quiénes Somos | Esperanza Animal BQ')

@section('content')
<style>
    .quienes-somos { max-width: 1000px; margin: 40px auto; padding: 20px; font-family: 'Open Sans', sans-serif; }
    .banner-quienes { background: linear-gradient(135deg, #2d7d46, #4caf50); color: white; padding: 60px 20px; text-align: center; border-radius: 20px; margin-bottom: 50px; box-shadow: 0 10px 30px rgba(45, 125, 70, 0.2); }
    .banner-quienes h2 { font-family: 'Pacifico', cursive; font-size: 3em; margin-bottom: 15px; }
    .banner-quienes p { font-size: 1.2em; opacity: 0.9; }
    
    .seccion { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px; border-left: 8px solid #2d7d46; transition: 0.3s; }
    .seccion:hover { transform: translateX(10px); }
    .seccion h3 { color: #2d7d46; font-size: 1.8em; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
    .seccion p { color: #555; line-height: 1.8; font-size: 1.1em; }
    
    .valores ul { list-style: none; padding: 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; }
    .valores li { background: #e9f7ef; color: #2d7d46; padding: 15px; border-radius: 12px; font-weight: bold; text-align: center; transition: 0.3s; }
    .valores li:hover { background: #2d7d46; color: white; transform: scale(1.05); }
</style>

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
