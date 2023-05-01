<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class YourEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullName;
    public $ma_PIN;
    public $title;


    public function __construct($fullName, $ma_PIN,$title)
    {
        $this->fullName       = $fullName;
        $this->ma_PIN         = $ma_PIN;
        $this->title         = $title;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view('mail.mailSenPIN', [
            'fullName' => $this->fullName,
            'ma_PIN'   => $this->ma_PIN,
        ]);

    }
}
