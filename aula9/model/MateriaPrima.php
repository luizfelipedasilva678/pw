<?php
class MateriaPrima
{
    private $id;
    private $descricao;
    private $quantidade;
    private $custo;
    private $categoria;
    private $unidadeMedida;

    public function __construct(int $id, string $descricao, int $quantidade, float $custo, object $categoria, object $unidadeMedida)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->custo = $custo;
        $this->categoria = $categoria;
        $this->unidadeMedida = $unidadeMedida;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getCusto()
    {
        return $this->custo;
    }

    public function getUnidadeMedida()
    {
        return $this->unidadeMedida;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function setDescricao(string $descricao)
    {
        return $this->descricao = $descricao;
    }

    public function setQuantidade(string $quantidade)
    {
        return $this->quantidade = $quantidade;
    }

    public function setCusto(string $custo)
    {
        return $this->custo = $custo;
    }

    public function setCategoria(object $categoria)
    {
        $this->categoria = $categoria;
    }

    public function setUnidadeMedida(object $unidadeMedida)
    {
        $this->unidadeMedida = $unidadeMedida;
    }
}
