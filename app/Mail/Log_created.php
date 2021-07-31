<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Log_created extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $comment)
    {
        $this->address = $data->email;
        $this->comment = $comment;
        $this->name = $data->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $name = $this->name;
        $comment = $this->comment;
        return $this->view('mails.mail',compact('name','comment'));
    }
}
