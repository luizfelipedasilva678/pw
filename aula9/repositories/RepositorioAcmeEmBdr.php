<?php

require_once(dirname(__FILE__) . "/../interfaces/RepositorioAcme.php");
require_once(dirname(__FILE__) . "/../exceptions/RepositorioExeception.php");
require_once(dirname(__FILE__) . "/../model/Categoria.php");
require_once(dirname(__FILE__) . "/../model/MateriaPrima.php");

class RepositorioAcmeEmBdr implements RepositorioAcme
{
    private $pdo;

    public function __construct(pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarMediaCusto(): float
    {
        try {
            $ps = $this->pdo->query('
                    select 
                        AVG(mp.custo) as media_custo
                    from 
                        materia_prima mp
                ');

            $obj = $ps->fetchObject();

            return $obj->media_custo;
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao calcular media");
        }
    }

    public function buscarCategorias(): array
    {
        try {
            $ps = $this->pdo->query('
                    select 
                        *
                    from 
                        categoria
                ');

            $objs = [];

            foreach ($ps as $categoria) {
                $c = new Categoria($categoria['id'], $categoria['nome']);
                array_push($objs, $c);
            }

            return $objs;
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao listar");
        }
    }

    public function buscarMateriasPrimas(): array
    {
        try {
            $ps = $this->pdo->query(
                '
                    select 
                        mp.id as materia_prima_id,
                        mp.descricao, 
                        mp.custo, 
                        mp.quantidade, 
                        c.id as categoria_id,
                        c.nome
                    from 
                        materia_prima mp
                    join categoria c on(mp.id_categoria = c.id)'
            );

            $materiasPrimas = [];

            foreach ($ps as $mp) {
                $categoria = new Categoria($mp['categoria_id'], $mp['nome']);
                $materiaPrima = new MateriaPrima($mp['materia_prima_id'], $mp['descricao'], $mp['quantidade'], $mp['custo'], $categoria);

                array_push($materiasPrimas, $materiaPrima);
            }

            return $materiasPrimas;
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao listar");
        }
    }

    public function atualizarMateriaPrima(object $materiaPrima): void
    {
        try {
            $ps = $this->pdo->prepare(
                '
                    update 
                        materia_prima
                    set 
                        id_categoria = ?,
                        descricao = ?,
                        quantidade = ?,
                        custo = ?
                    where id = ?'
            );

            $ps->execute([
                $materiaPrima->getCategoria()->getId(),
                $materiaPrima->getDescricao(),
                $materiaPrima->getQuantidade(),
                $materiaPrima->getCusto(),
                $materiaPrima->getId()
            ]);
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao atualizar");
        }
    }

    public function cadastrarMateriaPrima(object $materiaPrima): void
    {
        try {
            $ps = $this->pdo->prepare('
                    insert into materia_prima(id_categoria, descricao, quantidade, custo)
                    values(?,?,?,?)
                ');

            $ps->execute([
                $materiaPrima->getCategoria()->getId(),
                $materiaPrima->getDescricao(),
                $materiaPrima->getQuantidade(),
                $materiaPrima->getCusto()
            ]);
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao atualizar");
        }
    }

    public function removerMateriaPrima(int $id): void
    {
        try {
            $ps = $this->pdo->prepare('delete from materia_prima where id = ?');

            $ps->execute([
                $id
            ]);
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao deletar");
        }
    }
}
