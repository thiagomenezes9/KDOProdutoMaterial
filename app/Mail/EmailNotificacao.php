<?php

namespace App\Mail;

use App\Oferta;
use App\Produto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotificacao extends Mailable
{
    use Queueable, SerializesModels;


    public  $produto;
    public $oferta;


    /**
     *
     * Create a new message instance./home/thiago/Downloads/material-dashboard-master/examples/user.html
     *
     * @return void
     */
    public function __construct($idProduto,$idOferta)
    {
        $this->produto = Produto::find($idProduto);
        $this->oferta = Oferta::find($idOferta);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacao.email')->with(['produto' => $this->produto , 'oferta' => $this->oferta])
            ->subject('KD O Produto - Oferta');
    }
}
