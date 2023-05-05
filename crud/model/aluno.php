<?php

namespace escola;

class Aluno
{

    private int $id;
    private string $nome;
    private \DateTime $dataNascimento;
    private string $cpf;

    public function __construct(int $id, string $name, \DateTime $dataNascimento, string $cpf)
    {
        $this->id = $id;
        $this->nome = $name;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->nome;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento->format('Y-m-d H:i:s');
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->nome = $name;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
}
