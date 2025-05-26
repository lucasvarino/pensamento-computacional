<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuporteMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $mailSubject;
    public string $messageBody;

    public function __construct($name, $email, $mailSubject, $messageBody)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mailSubject = $mailSubject;
        $this->messageBody = $messageBody;
    }

    public function build(): self
    {
        return $this->subject($this->mailSubject)
            ->replyTo($this->email, $this->name)
            ->view('emails.suporte');
    }
}