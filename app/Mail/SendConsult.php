<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConsult extends Mailable
{
    use Queueable, SerializesModels;
    
    public $consulta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $datosConsulta)
    {
        $this->consulta = $datosConsulta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.mailConsulta');
    }
}
