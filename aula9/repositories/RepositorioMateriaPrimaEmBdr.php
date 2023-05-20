<?php

require_once(dirname(__FILE__) . "/../interfaces/RepositorioMateriaPrima.php");
require_once(dirname(__FILE__) . "/../exceptions/RepositorioExeception.php");
require_once(dirname(__FILE__) . "/../model/Categoria.php");
require_once(dirname(__FILE__) . "/../model/UnidadeDeMedida.php");
require_once(dirname(__FILE__) . "/../model/MateriaPrima.php");

class RepositorioMateriaPrimaEmBdr implements RepositorioMateriaPrima
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

    public function buscarMateriasPrimaPeloId(int $id): object
    {
        try {
            $ps = $this->pdo->prepare(
                '
                    select
                        mp.id as materia_prima_id,
                        mp.descricao,
                        mp.custo,
                        mp.quantidade,
                        c.id as categoria_id,
                        c.nome,
                        ud.descricao as ud_descricao,
                        ud.sigla as ud_sigla,
                        ud.id as ud_id
                    from
                        materia_prima mp
                    join categoria c on(mp.id_categoria = c.id)
                    join unidade_medida ud on(mp.id_unidade_medida = ud.id)
                    where mp.id = ?'
            );
            $ps->execute([
                $id
            ]);

            $mp = $ps->fetchObject();
            $categoria = new Categoria($mp->categoria_id, $mp->nome);
            $unidadeMedida = new UnidadeDeMedida((int) $mp->ud_id, $mp->ud_descricao, $mp->ud_sigla);
            $materiaPrima = new MateriaPrima($mp->materia_prima_id, $mp->descricao, $mp->quantidade, $mp->custo, $categoria, $unidadeMedida);

            return $materiaPrima;
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao buscar pelo id");
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
                    c.nome,
                    ud.descricao as ud_descricao,
                    ud.sigla as ud_sigla,
                    ud.id as ud_id
                from
                    materia_prima mp
                join categoria c on(mp.id_categoria = c.id)
                join unidade_medida ud on(mp.id_unidade_medida = ud.id)
                order by mp.id desc
            '
            );

            $materiasPrimas = [];

            foreach ($ps as $mp) {
                $categoria = new Categoria($mp['categoria_id'], $mp['nome']);
                $unidadeMedida = new UnidadeDeMedida((int) $mp['ud_id'], $mp['ud_descricao'], $mp['ud_sigla']);
                $materiaPrima = new MateriaPrima($mp['materia_prima_id'], $mp['descricao'], $mp['quantidade'], $mp['custo'], $categoria, $unidadeMedida);

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
                        custo = ?,
                        id_unidade_medida = ?
                    where id = ?'
            );

            $ps->execute([
                $materiaPrima->getCategoria()->getId(),
                $materiaPrima->getDescricao(),
                $materiaPrima->getQuantidade(),
                $materiaPrima->getCusto(),
                $materiaPrima->getUnidadeMedida()->getId(),
                $materiaPrima->getId(),

            ]);
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao atualizar");
        }
    }

    public function cadastrarMateriaPrima(object $materiaPrima): void
    {
        try {
            $ps = $this->pdo->prepare('
                    insert into materia_prima(id_categoria, descricao, quantidade, custo, id_unidade_medida)
                    values(?,?,?,?,?)
                ');

            $ps->execute([
                $materiaPrima->getCategoria()->getId(),
                $materiaPrima->getDescricao(),
                $materiaPrima->getQuantidade(),
                $materiaPrima->getCusto(),
                $materiaPrima->getUnidadeMedida()->getId()
            ]);
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao cadastrar" . $e->getMessage());
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
