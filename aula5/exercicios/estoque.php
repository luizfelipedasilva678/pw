<?php
    require_once('Produto.php');
    require_once('GenrenciardorRepositorio.php');

    use Acme\Produto;

    $opcao = '';
    $produtos = [];
    $gerenciador = new GerenciadorRepositorio();
    const OPCAO_AUMENTAR = '1';
    const OPCAO_REDUZIR = '2';
    const OPCAO_SALVAR = '3';
    const OPCAO_CARREGAR = '4';
    const OPCAO_SAIR = '5';

    array_push($produtos, new Produto('1', 'Produto 1', 3.5, 10));
    array_push($produtos, new Produto('2', 'Produto 2', 5.5, 10));
    array_push($produtos, new Produto('3', 'Produto 3', 7.5, 10));
    array_push($produtos, new Produto('4', 'Produto 4', 8.5, 10));
    array_push($produtos, new Produto('5', 'Produto 5', 9.5, 10));

    function aumentarEstoque(&$produtos, $codigo, $qtd)
    {
        $produtoEncontrado = null;

        foreach ($produtos as $produto) {
            if ($produto->getCodigo() === $codigo) {
                $produtoEncontrado = $produto;
            }
        }

        $produtoEncontrado->aumentarEstoque($qtd);
    }
    
    function reduzirEstoque(&$produtos, $codigo, $qtd)
    {
        $produtoEncontrado = null;

        foreach ($produtos as $produto) {
            if ($produto->getCodigo() === $codigo) {
                $produtoEncontrado = $produto;
            }
        }

        $produtoEncontrado->reduzirEstoque($qtd);
    }


    function menu(&$opcao, &$produtos, $gerenciador) {
        echo "DIGITE 1 PARA AUMENTAR O ESTOQUE DE UM PRODUTO" . PHP_EOL;
        echo "DIGITE 2 PARA REDUZIR O ESTOQUE DE UM PRODUTO" . PHP_EOL;
        echo "DIGITE 3 PARA SALVAR OS PRODUTOS" . PHP_EOL;
        echo "DIGITE 4 PARA CARREGAR OS PRODUTOS" . PHP_EOL;
        echo "DIGITE 5 PARA SAIR" . PHP_EOL;

        $opcao = readline("SELECIONE A OPCAO: ");

        switch ($opcao) {
            case OPCAO_AUMENTAR: {
                $codigoProduto = readline("Digite o codigo do produto: ");
                $qtd = readline("Digite a quantidade a ser aumentada: ");
                aumentarEstoque($produtos, $codigoProduto, $qtd);
                break;
            }
            case OPCAO_REDUZIR: {
                $codigoProduto = readline("Digite o codigo do produto: ");
                $qtd = readline("Digite a quantidade a ser reduzida: ");
                reduzirEstoque($produtos, $codigoProduto, $qtd);
                break;
            }
            case OPCAO_SALVAR: {
                $gerenciador->salvar($produtos);
                break;
            }
            case OPCAO_CARREGAR: {
               $produtos = $gerenciador->carregar();
               break;
            }
            case OPCAO_SAIR: {
                exit(0);
            }
            default: {
                echo "OPCAO INVALIDA" . PHP_EOL;
            }
        }
    }

    do {
        try {
            menu($opcao, $produtos, $gerenciador);
        } catch (Exception $e) {
            echo "ERROR: ". $e->getMessage() . PHP_EOL;
        }
    } while($opcao !== OPCAO_SAIR);