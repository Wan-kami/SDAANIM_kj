<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $rol;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $email, $rol)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->rol = ucfirst($rol);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Actualización sobre tu solicitud - Esperanza Animal BQ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inscription_rejected',
            with: [
                'nombre' => $this->nombre,
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
