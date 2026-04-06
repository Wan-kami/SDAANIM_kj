<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Aprobada</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #2d7d46 0%, #1f5530 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .header p {
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 30px 20px;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .info-box {
            background-color: #e9f7ec;
            border-left: 4px solid #2d7d46;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-box h3 {
            color: #1f5530;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .credentials {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 6px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
        }
        .credentials-label {
            font-weight: bold;
            color: #495057;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .credential {
            font-size: 16px;
            color: #212529;
            margin-bottom: 12px;
            word-break: break-all;
        }
        .credential-value {
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            margin-top: 5px;
            color: #2d7d46;
            font-weight: bold;
        }
        .steps {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .steps h3 {
            color: #1f5530;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .step {
            margin-bottom: 12px;
            display: flex;
            gap: 15px;
        }
        .step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            background-color: #2d7d46;
            color: white;
            border-radius: 50%;
            font-weight: bold;
            flex-shrink: 0;
        }
        .step-text {
            color: #555;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        .warning {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 12px 15px;
            border-radius: 4px;
            margin: 15px 0;
            font-size: 13px;
            color: #856404;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            font-size: 12px;
            color: #6c757d;
        }
        .btn {
            display: inline-block;
            background-color: #2d7d46;
            color: white;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin: 15px 0;
            text-align: center;
        }
        .btn:hover {
            background-color: #1f5530;
        }
    </style>
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
