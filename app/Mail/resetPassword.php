<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;
   public $email;
   public $hash;
   public $fullName;
   public $code;
   public $title;


    public function __construct($email,$hash,$fullName,$code,$title)
    {
        $this->fullName       = $fullName;
        $this->email         = $email;
        $this->hash         = $hash;
        $this->code         = $code;
        $this->title         = $title;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view('mail.mailchangepassword', [
            'fullName' => $this->fullName,
            'hash'   => $this->hash,
            'email'   => $this->email,
            'code'   => $this->code,


        ]);
    }
}
