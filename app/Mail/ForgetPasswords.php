<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class ForgetPasswords extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(User $user)
    {
        return $this->view('password_email')
                    ->subject('Reset your password')
                    ->with([
                        'user' => $this->user,
                        'token' =>$this->token
                    ]);
    }
}
