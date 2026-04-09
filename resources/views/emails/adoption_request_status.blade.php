<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de solicitud de adopción</title>
    <link rel="stylesheet" href="{{ asset('css/shared/email.css') }}">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h1>Actualización de adopción</h1>
            </div>
            <div class="content">
                <p>Hola <strong>{{ $name }}</strong>,</p>
                <p>{{ $emailMessage }}</p>

                <div class="info-box">
                    <p><strong>Mascota:</strong> {{ $animalName }}</p>
                    <p><strong>Estado:</strong> {{ $status }}</p>
                    @if(!empty($visitDate))
                        <p><strong>Fecha de visita:</strong> {{ $visitDate }}</p>
                    @endif
                    @if(!empty($volunteerName))
                        <p><strong>Voluntario asignado:</strong> {{ $volunteerName }}</p>
                    @endif
                </div>

                @if(!empty($actionUrl))
                    <p>
                        <a class="btn" href="{{ $actionUrl }}">Ver mi solicitud</a>
                    </p>
                @endif

                <p>Gracias por confiar en Esperanza Animal BQ. Cualquier duda, estamos para ayudarte.</p>
            </div>
            <div class="footer">
                <p>Esperanza Animal BQ</p>
                <p>© {{ date('Y') }} Esperanza Animal BQ. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
