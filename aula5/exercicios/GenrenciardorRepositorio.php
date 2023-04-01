<?php
    require_once('interfaces/RepositorioProduto.php');
    require_once('errors/RepositorioException.php');
    require_once('Produto.php');

    use Acme\Produto;

    class GerenciadorRepositorio implements RepositorioProduto
    {
        public function salvar($produtos)
        {
            try {
                file_put_contents("estoque.csv", "");

                foreach ($produtos as $produto) {
                    $produtoString = $produto->getCodigo() . "," .
                    $produto->getDescricao() . "," .
                    $produto->getPreco() . "," .
                    $produto->getEstoque() . PHP_EOL;
                    file_put_contents("estoque.csv", (string) $produtoString, FILE_APPEND);
                }

            } catch (Exception $e) {
                throw new RepositorioException($e->getMessage());
            }
        }

        public function carregar(): array
        {
            try {
                $produtos = [];
                $lines = explode(PHP_EOL, file_get_contents("estoque.csv"));

                foreach ($lines as $line) {
                    $informacoesProdutos = explode(",", $line);

                    if (count($informacoesProdutos) === 4) {
                        array_push(
                            $produtos,
                            new Produto(
                                $informacoesProdutos[0],
                                $informacoesProdutos[1],
                                (int) $informacoesProdutos[2],
                                (int) $informacoesProdutos[3]
                            )
                        );
                    }
                }

                return $produtos;
            } catch (Exception $e) {
                throw new RepositorioException($e->getMessage());
            }
        }
    }