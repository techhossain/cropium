<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Payment extends Mailable
{
    use Queueable, SerializesModels;

    protected $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.payment')
            ->with(['amount' => $this->amount])
            ->from('maher@cintechbd.com', 'Maher Hossain')
            ->subject('Payment Confirmation');
        // ->attach(public_path('/attachements/project.pdf'));
    }
}
