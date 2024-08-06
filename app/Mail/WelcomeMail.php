<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;


    // public $data;

    public function __construct()
    {
        // $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Welcoome to our Newsletter')
                    ->view('emails.welcome');
                    // ->with('data', $this->data);
    }
    

    // public function build()
    // {
    //     return $this->subject('Welcome to Our Newsletter')
    //                 ->view('emails.welcome');
    // }
}
