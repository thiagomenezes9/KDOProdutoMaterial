<?php

namespace App\Mail;

use App\Preco;
use App\Produto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoNotificacao extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $produto;
    public $preco;


    public function __construct($idProduto,$idPreco)
    {
        $this->produto = Produto::find($idProduto);
        $this->preco = Preco::find($idPreco);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacao.aviso')->with(['produto' => $this->produto , 'preco' => $this->preco])
            ->subject('KD O Produto - Chegou');
    }
}
