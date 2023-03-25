<?php
    require_once('ProdutoTaxado.php');

    $opcao = -1;
    $produtos = [];
    const OPCAO_INSERIR_PRODUTO = '1';
    const OPCAO_LISTAR_PRODUTOS = '2';
    const OPCAO_SAIR = '3';

    function inserirProduto(&$produtos)
    {
        $taxa = 0;
        $produto = null;

        $descricao = readline("DIGITE A DESCRICAO DO PRODUTO: ");
        $estoque = readline("DIGITE O ESTOQUE DO PRODUTO: ");
        $preco = readline("DIGITE O PRECO DO PRODUTO: ");
        $eTaxado = readline("O PRODUTO E TAXADO (S/N): ");

        if ($eTaxado === 'S') {
            $taxa = readline("DIGITE A TAXA DO PRODUTO: ");

            $produto = new ProdutoTaxado($descricao, $estoque, $preco, $taxa);
        } else {
            $produto = new Produto($descricao, $estoque, $preco);
        }

        array_push($produtos, $produto);
    }

    function listarProdutos(&$produtos)
    {
        foreach ($produtos as $produto) {
            echo $produto->getDescricao()
            . " - " . $produto->getEstoque() .
            " - " . $produto->getPreco();
            
            if ($produto instanceof ProdutoTaxado) {
                echo  " - " . $produto->getPercentualImposto();
            }

            echo PHP_EOL;
        }
    }


    function menu(&$opcao, &$produtos)
    {
        echo PHP_EOL;
        echo "DIGITE 1 PARA INSERIR OS DADOS DO PRODUTO " . PHP_EOL;
        echo "DIGITE 2 PARA LISTAR OS PRODUTOS " . PHP_EOL;
        echo "DIGITE 3 PARA SAIR " . PHP_EOL;
        echo PHP_EOL;

        $opcao = readline("SELECIONE A OPCAO: ");

        switch ($opcao) {
            case OPCAO_INSERIR_PRODUTO: {
                inserirProduto($produtos);
                break;
            }
            case OPCAO_LISTAR_PRODUTOS: {
                listarProdutos($produtos);
                break;
            }
            case OPCAO_SAIR: {
                exit(0);
                break;
            }
            default: {
                echo "OPCAO INVÁLIDA" . PHP_EOL;
            }
        }
    }

    do {
        menu($opcao, $produtos);
    } while ($opcao !== OPCAO_SAIR);
    