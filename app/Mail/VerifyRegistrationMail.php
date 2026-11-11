<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $verificationUrl
    ) {}

    public function build()
    {
        return $this->subject('Verifikasi Email - Tadah Uwuk')
            ->view('emails.verify-registration');
    }
}
