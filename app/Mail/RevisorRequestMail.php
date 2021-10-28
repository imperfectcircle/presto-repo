<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RevisorRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $revisor;
    public function __construct($revisor)
    {
        $this->revisor = $revisor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->revisor['email'])
            ->view('mails/revisorRequest');
    }
}
