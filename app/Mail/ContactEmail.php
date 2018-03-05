<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactEmail extends Mailable
{
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mail.from.address'))
            ->replyTo($this->data['email'])->view('mail.contact')->with($this->data);
    }
}
