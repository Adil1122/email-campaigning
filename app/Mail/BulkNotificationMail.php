<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class BulkNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $data;

    public function __construct($user, $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $from = new Address($this->data['fromAddress'], $this->data['category']);
        return new Envelope(
            from: $from,
            subject: $this->data['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $viewMap = [
            'Aquila Tech' => 'emails.aquila_notification',
            'Mutee Art' => 'emails.mutee_art_notification',
            'Synchro Tv' => 'emails.synchro_notification',
        ];
        $view = $viewMap[$this->data['category']];
        
        return new Content(
            view: $view,
            with: [
                'user' => $this->user,
                'data' => $this->data,
            ],
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
