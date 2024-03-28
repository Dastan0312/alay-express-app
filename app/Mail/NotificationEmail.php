<?php

namespace App\Mail;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $feedback;
    /**
     * Create a new message instance.
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }


     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Feedback Email')
                    ->from($this->feedback->email, $this->feedback->user_name)
                    ->view('emails.notification');
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
