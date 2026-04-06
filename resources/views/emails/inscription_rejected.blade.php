<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Revisada</title>
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
            background: linear-gradient(135deg, #d35400 0%, #a04000 100%);
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
            background-color: #fff3e0;
            border-left: 4px solid #d35400;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-box h3 {
            color: #bf360c;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .message-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
            border: 1px solid #e0e0e0;
        }
        .message-section h3 {
            color: #d35400;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .message-text {
            color: #555;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 15px;
        }
        .encouragement {
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 14px;
            color: #1565c0;
            line-height: 1.6;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            font-size: 12px;
            color: #6c757d;
        }
        .contact-info {
            background-color: #f5f5f5;
            padding: 12px;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Actualización sobre tu solicitud</h1>
            <p>Esperanza Animal BQ</p>
        </div>

        <div class="content">
            <div class="greeting">
                <strong>Hola {{ $nombre }},</strong>
            </div>

            <div class="info-box">
                <h3>Información sobre tu solicitud</h3>
                <p style="font-size: 14px; line-height: 1.6;">
                    Después de una cuidadosa revisión, tu solicitud como {{ $rol }} ha sido <strong>rechazada</strong> en esta oportunidad.
                </p>
            </div>

            <div class="message-section">
                <h3>¿Qué pasó?</h3>
                <p class="message-text">
                    Revisamos cuidadosamente tu solicitud y consideramos que, en este momento, no se ajusta completamente a lo que estamos buscando en nuestro equipo.
                </p>
                <p class="message-text">
                    Esto no significa que no tengas el potencial para ser parte de nosotros. Te animamos a volver a postularte en el futuro o contactarnos si tienes preguntas al respecto.
                </p>
            </div>

            <div class="encouragement">
                <strong>🐾 No desistas</strong><br>
                La pasión por los animales es lo que nos une. Si tienes dudas sobre cómo mejorar tu solicitud, nos encantaría ayudarte. Contáctanos para conocer más opciones de colaboración.
            </div>

            <div class="contact-info">
                <strong>📧 Contáctanos:</strong><br>
                Email: contacto@esperanzaanimalbq.com<br>
                Teléfono: +57 1 XXXX XXXX
            </div>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0; font-size: 13px; color: #888; line-height: 1.6;">
                <p>
                    Agradecemos sinceramente tu interés en ser parte de <strong>Esperanza Animal BQ</strong> y el tiempo que dedicaste a completar tu solicitud. 
                </p>
                <p style="margin-top: 10px;">
                    Esperamos poder trabajar contigo en el futuro. 🤝
                </p>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 Esperanza Animal BQ. Todos los derechos reservados.</p>
            <p>Estamos aquí para proteger y cuidar a nuestros peluditos con tu ayuda.</p>
        </div>
    </div>
</body>
</html>
