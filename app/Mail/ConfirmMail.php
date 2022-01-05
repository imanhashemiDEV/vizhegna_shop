<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this-> user= $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $u = $this->user;
        return $this->view('emails.email', compact('u'))
            ->subject('this is test')
            ->to('e68a50cc75-7752bc@inbox.mailtrap.io')
            ->with([ "data"=>"foo"])
            ->attach(public_path('favicon.ico'));
    }
}
