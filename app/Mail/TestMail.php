<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email,$where)
    {
        $this->name = $name;
        $this->email = $email;
        $this->where = $where;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject('テストタイトル')
            ->view('lesson1.mail')
            ->with([
                'name' => $this->name,
                'where'=> $this->where,
            ]);
    }
}