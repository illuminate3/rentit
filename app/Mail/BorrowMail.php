<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BorrowMail extends Mailable
{
    use Queueable, SerializesModels;

    private $item;

    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item, $message = '')
    {
        $this->item = $item;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.borrow')
            ->with([
                'item' => $this->item,
                'content' => $this->message
            ]);
    }
}
