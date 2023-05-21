<?php
class Produto
{
    public $id;
    public $descricao;
    public $estoque;
    public $preco;

    public function __construct(int $id, string $descricao, int $estoque, float $preco)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco = $preco;
    }
}
