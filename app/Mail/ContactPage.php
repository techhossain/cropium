<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactPage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $name, $email, $message;
    public $subject;

    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-mail')
            ->subject($this->subject)
            ->with(['name' => $this->name])
            ->with(['email' => $this->email])
            ->with(['message' => $this->message])
            ->from('maher@cintechbd.com', $this->name);
    }
}
