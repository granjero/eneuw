<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;

    protected $contacto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacto)
    {
       $this->contacto = $contacto;  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jm@estonoesunaweb.com.ar', 'Contacto ENEUW')
                    ->view('correo.contacto')
                    ->with('contacto',$this->contacto);
    }
}
