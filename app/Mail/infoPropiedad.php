<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class infoPropiedad extends Mailable
{
    use Queueable, SerializesModels;

    
    public $body;
    public $nombreAgente;
    public $subject;
    public $propiedadNumero;
    public $from = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from,$body,$agente,$propNumero)
    {
     
      $this->body = $body;
      $this->nombreAgente = $agente;
      
      $this->propiedadNumero = $propNumero;
      $this->from[0]['address'] = $from;
      $this->from[0]['name'] = "Cliente";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('local')->from('robertofuentes866@hotmail.com','Roberto')->view('infoPropiedad');
    }

}
