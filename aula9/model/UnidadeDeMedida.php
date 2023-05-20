<?php
class UnidadeDeMedida
{
    private $id = 0;
    private $descricao = '';
    private $sigla = '';

    public function __construct(int $id, string $descricao, string $sigla)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->sigla = $sigla;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }
}
