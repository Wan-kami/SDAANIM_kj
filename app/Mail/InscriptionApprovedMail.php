<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $documento;
    public $passwordTemporal;
    public $rol;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $email, $documento, $passwordTemporal, $rol)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->documento = $documento;
        $this->passwordTemporal = $passwordTemporal;
        $this->rol = ucfirst($rol);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Tu solicitud ha sido aprobada! 🎉 - Esperanza Animal BQ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inscription_approved',
            with: [
                'nombre' => $this->nombre,
                'documento' => $this->documento,
                'passwordTemporal' => $this->passwordTemporal,
                'rol' => $this->rol,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
