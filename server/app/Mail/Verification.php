<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Verification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    /*
     message: Seu código para validar seu E-mail é : xxzz
     subject: Verificação de email
     from_name: Web Delivery
     */
    public function __construct(public readonly array $data)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('yagotf.estudos@gmail.com', 'Web Delivery'),
            subject: 'Verificação do email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'pages.email-template.index',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
