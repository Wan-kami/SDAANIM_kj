<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Aprobada</title>
    <link rel="stylesheet" href="{{ asset('css/shared/email.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Felicidades! 🎉</h1>
            <p>Tu solicitud ha sido aprobada</p>
        </div>

        <div class="content">
            <div class="greeting">
                <strong>Hola {{ $nombre }},</strong>
                <p style="margin-top: 10px;">
                    ¡Qué buenas noticias! Tu solicitud como {{ $rol }} en <strong>Esperanza Animal BQ</strong> ha sido aprobada.
                </p>
            </div>

            <div class="info-box">
                <h3>Gracias por tu compromiso</h3>
                <p style="font-size: 14px; line-height: 1.6;">
                    Tu dedicación y ganas de ayudar a nuestros peluditos es exactamente lo que necesitamos. Eres parte de un equipo especial comprometido con el bienestar animal.
                </p>
            </div>

            <div class="credentials">
                <div class="credentials-label">Acceso a tu cuenta</div>
                
                <div class="credential">
                    Usuario / Documento
                    <div class="credential-value">{{ $documento }}</div>
                </div>

                <div class="credential">
                    Contraseña Temporal
                    <div class="credential-value">{{ $passwordTemporal }}</div>
                </div>
            </div>

            <div class="warning">
                ⚠️ <strong>Importante:</strong> Esta contraseña es temporal. Al acceder por primera vez, te pediremos que la cambies por una contraseña personal segura.
            </div>

            <div class="steps">
                <h3>Próximos pasos:</h3>
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-text">Ingresa a tu cuenta con tus credenciales</div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-text">Actualiza tu contraseña a una más segura</div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-text">Completa tu perfil y establece tu disponibilidad</div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-text">¡Empieza a ayudar!</div>
                </div>
            </div>

            <center>
                <a href="https://adoptaya.com/login" class="btn">Acceder a mi cuenta</a>
            </center>

            <div style="background-color: #e8f5e9; padding: 15px; border-radius: 6px; margin-top: 20px; font-size: 14px; color: #2e7d32; line-height: 1.6;">
                <strong>¡Un abrazo de parte de todo el equipo!</strong><br>
                Juntos haremos la diferencia para nuestros peluditos. 🐾
            </div>
        </div>

        <div class="footer">
            <p>© 2025 Esperanza Animal BQ. Todos los derechos reservados.</p>
            <p>Si tienes preguntas, contáctanos: contacto@esperanzaanimalbq.com</p>
        </div>
    </div>
</body>
</html>
