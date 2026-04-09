<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdoptionRequestStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $name;
    public $animalName;
    public $status;
    public $emailMessage;
    public $visitDate;
    public $volunteerName;
    public $actionUrl;

    public function __construct(string $subjectLine, string $name, string $animalName, string $status, string $emailMessage, ?string $visitDate = null, ?string $volunteerName = null, ?string $actionUrl = null)
    {
        $this->subjectLine = $subjectLine;
        $this->name = $name;
        $this->animalName = $animalName;
        $this->status = $status;
        $this->emailMessage = $emailMessage;
        $this->visitDate = $visitDate;
        $this->volunteerName = $volunteerName;
        $this->actionUrl = $actionUrl;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectLine,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.adoption_request_status',
            with: [
                'name' => $this->name,
                'animalName' => $this->animalName,
                'status' => $this->status,
                'emailMessage' => $this->emailMessage,
                'visitDate' => $this->visitDate,
                'volunteerName' => $this->volunteerName,
                'actionUrl' => $this->actionUrl,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
