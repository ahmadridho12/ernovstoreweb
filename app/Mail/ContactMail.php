<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $messageBody;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $messageBody)
    {
        $this->email = $email;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->email)
                    ->subject('New Contact Message')
                    ->view('emails.contact')
                    ->with([
                        'email' => $this->email,
                        'messageBody' => $this->messageBody,
                    ]);
    }
}
