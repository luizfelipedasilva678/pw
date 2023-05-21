<?php
require_once(dirname(__FILE__) . "/../interfaces/RepositorioProduto.php");
require_once(dirname(__FILE__) . "/../exceptions/RepositorioProdutoExeception.php");
require_once(dirname(__FILE__) . "/../model/Produto.php");

use Homework\RepositorioProduto;
use Homework\RepositorioExeception;

class RepositorioProdutoEmBdr implements RepositorioProduto
{
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarValoresMaximosMinimosEMedia(): object
    {
        try {
            $ps = $this->pdo->query("select max(estoque) as max, min(estoque) as min, avg(preco) as avg from produto");
            $result = $ps->fetchObject();

            $infos = new stdClass();
            $infos->max =  $result->max;
            $infos->min =  $result->min;
            $infos->avg =  $result->avg;

            return $infos;
        } catch (PDOException $e) {
            throw new RepositorioExeception("Erro ao buscar produtos " . $e->getMessage());
        }
    }

    public function buscarProdutos($order): array
    {
        try {
            $ps = $this->pdo->query("select * from produto order by $order");
            $produtos = [];

            foreach ($ps as $produto) {
                array_push(
                    $produtos,
                    new Produto(
                        $produto['id'],
                        $produto['descricao'],
                        $produto['estoque'],
                        $produto['preco']
                    )
                );
            }

            return $produtos;
        } catch (PDOException $e) {
            throw new RepositorioExeception("Erro ao buscar produtos " . $e->getMessage());
        }
    }

    public function buscarProdutoPeloId(int $id): object
    {
        try {
            $ps = $this->pdo->prepare("select * from produto where id = ?");
            $ps->execute([
                $id
            ]);

            return $ps->fetchObject();
        } catch (PDOException $e) {
            throw new RepositorioExeception("Erro ao buscar produtos " . $e->getMessage());
        }
    }

    public function salvarProduto($produto): void
    {
        try {
            $ps = $this->pdo->prepare("insert into produto(descricao, estoque, preco) values(?,?,?)");

            $ps->execute([
                $produto->descricao,
                $produto->estoque,
                $produto->preco
            ]);
        } catch (PDOException $e) {
            throw new RepositorioExeception("Erro ao salvar produto " . $e->getMessage());
        }
    }

    public function atualizarProduto($produto): void
    {
        try {
            $ps = $this->pdo->prepare('update produto set descricao = ?, estoque = ?, preco = ? where id = ?');

            $ps->execute([
                $produto->descricao,
                $produto->estoque,
                $produto->preco,
                $produto->id
            ]);
        } catch (PDOException $e) {
            throw new RepositorioExeception("Erro ao atualizar " . $e->getMessage());
        }
    }

    public function removerProduto($id): void
    {
        try {
            $ps = $this->pdo->prepare('delete from produto where id = ?');

            $ps->execute([
                $id
            ]);
        } catch (PDOException $e) {
            throw new RepositorioExeception("Erro ao deletar " . $e->getMessage());
        }
    }
}
