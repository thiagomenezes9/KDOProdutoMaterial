<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CampanhaNotificacao extends Mailable
{
    use Queueable, SerializesModels;


    public $titulo;
    public $conteudo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $conteudo)
    {
        $this->conteudo = $conteudo;
        $this->titulo = $titulo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacao.campanha')->with(['titulo' => $this->titulo , 'content' => $this->conteudo])
            ->subject('KD O Produto');
    }
}
