<?php

namespace escola;

require_once("alunoRepositorio.php");
require_once("alunoRepositorioException.php");
require_once(dirname(__FILE__) . "/../getConnection/getConnection.php");
require_once(dirname(__FILE__) . "/../model/aluno.php");


class AlunoRepositorioEmBd implements AlunoRepositorio
{
    private \PDO | null $pdo = null;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    private function getConnection()
    {
        try {
            return getConnection();
        } catch (\PDOException $e) {
            throw new AlunoRepositorioException($e->getMessage());
        }
    }

    public function listar(): array
    {
        try {
            $ps = $this->pdo->query("select id, nome, data_nascimento, cpf from aluno", \PDO::FETCH_ASSOC);
            $alunos = [];


            foreach ($ps as $aluno) {
                array_push(
                    $alunos,
                    new Aluno($aluno["id"], $aluno["nome"], new \DateTime($aluno["data_nascimento"]), $aluno["cpf"])
                );
            }

            return $alunos;
        } catch (\PDOException $e) {
            throw new AlunoRepositorioException($e->getMessage());
        }
    }

    public function pegarPeloId($id): object | null
    {
        try {
            $ps = $this->pdo->prepare("select id, nome, data_nascimento, cpf from aluno where id = ?");
            $ps->execute([
                $id
            ]);

            if ($ps->rowCount() < 1) {
                return null;
            }

            $aluno = $ps->fetchObject();

            return new ALuno($aluno->id, $aluno->nome, new \DateTime($aluno->data_nascimento), $aluno->cpf);
        } catch (\PDOException $e) {
            throw new AlunoRepositorioException($e->getMessage());
        }
    }


    public function deletar($id): bool
    {
        try {
            $ps = $this->pdo->prepare("delete from aluno where id = ?");
            $ps->execute([
                $id
            ]);

            if ($ps->rowCount() < 1) {
                return false;
            }

            return true;
        } catch (\PDOException $e) {
            throw new AlunoRepositorioException($e->getMessage());
        }
    }

    public function atualizar($aluno): bool
    {
        try {
            $ps = $this->pdo->prepare("update aluno set nome = ?, data_nascimento = ?, cpf = ? where id = ?");
            $ps->execute([
                $aluno->getNome(),
                $aluno->getDataNascimento(),
                $aluno->getCpf(),
                $aluno->getId()
            ]);

            if ($ps->rowCount() < 1) {
                return false;
            }

            return true;
        } catch (\PDOException $e) {
            throw new AlunoRepositorioException($e->getMessage());
        }
    }

    public function criar($aluno): bool
    {
        try {
            $ps = $this->pdo->prepare("inser into aluno(nome, data_nascimento, cpf) values(?, ?, ?)");
            $ps->execute([
                $aluno->getNome(),
                $aluno->getDataNascimento(),
                $aluno->getCpf(),
                $aluno->getId()
            ]);

            if ($ps->rowCount() < 1) {
                return false;
            }

            return true;
        } catch (\PDOException $e) {
            throw new AlunoRepositorioException($e->getMessage());
        }
    }
}
