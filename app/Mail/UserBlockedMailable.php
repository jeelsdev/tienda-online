<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class UserBlockedMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $emailEncrypt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public User $user, public $reason)
    {
        $this->emailEncrypt = Crypt::encryptString($user->email);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user-blocked')
            ->subject('Cuenta deshabilitada');
    }
}
