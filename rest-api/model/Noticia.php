<?php
class Noticia
{
    public int $id = 0;
    public string $titulo = "";
    public $usuario = "";
    public $conteudo = "";
    public DateTime $criacao;

    public function __construct($id, $titulo, $usuario, $conteudo, $criacao = new DateTime())
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->usuario = $usuario;
        $this->conteudo = $conteudo;
        $this->criacao = $criacao;
    }
}
