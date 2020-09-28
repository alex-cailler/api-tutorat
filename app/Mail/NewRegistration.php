<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * NewRegistration constructor.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tutorat.fr inscription !')
            ->view('mails.new_registration');
    }

}
