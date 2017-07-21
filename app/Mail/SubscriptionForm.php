<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SubscriptionForm extends Mailable
{
    use Queueable, SerializesModels;

//const DESTINATION_EMAIL= "divya@whytecreations.in";


    /**
     * The request instance.
     *
     * @var Request
     */
    public $user,$password;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$password)
    {
        $this->user = $user;
        $this->password =$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('emails.subscribe-form');
        
    }
}
