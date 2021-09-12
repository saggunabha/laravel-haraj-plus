<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCountMail extends Mailable
{
    use Queueable, SerializesModels;
    public $count;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($count)
    {
        $this->count = $count;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return   $this->from('infotes6@gmail.com')->view('emails.registeredcount');
    }
}
