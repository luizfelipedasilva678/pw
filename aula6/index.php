<?php
    require_once('connection.php');
    require_once('Produto.php');

    $pdo = null;
    const OPCAO_CADASTRAR = '1';
    const OPCAO_REMOVER = '2';
    const OPCAO_ALTERAR = '3';
    const OPCAO_LISTAR = '4';
    const OPCAO_LISTAR_PARCILAMENTE = '5';
    const OPCAO_SAIR = '6';
    const INVALID_OPTION = "OPCAO INVALIDA";

    try {
        $pdo = getConnection();
    } catch (PDOException $e) {
        exibeErro($e);
    }

    while (true) {
        menu($pdo);
    }

    function menu(PDO $pdo)
    {
        echo PHP_EOL;
        echo "DIGITE 1 PARA CADASTRAR UM PRODUTO" . PHP_EOL;
        echo "DIGITE 2 PARA REMOVER UM PRODUTO" . PHP_EOL;
        echo "DIGITE 3 PARA ALTERAR UM PRODUTO" . PHP_EOL;
        echo "DIGITE 4 PARA LISTAR OS PRODUTOS" . PHP_EOL;
        echo "DIGITE 5 PARA LISTAR OS PRODUTOS" . PHP_EOL;
        echo "DIGITE 6 PARA SAIR" . PHP_EOL;
        echo PHP_EOL;

        $opcao = readline("SELECIONE A OPCAO: ");

        switch ($opcao) {
            case OPCAO_CADASTRAR: {
                cadastrarProduto($pdo);
                break;
            }
            case OPCAO_REMOVER: {
                deletarProduto($pdo);
                break;
            }
            case OPCAO_ALTERAR: {
                alterarProduto($pdo);
                break;
            }
            case OPCAO_LISTAR: {
                listar($pdo);
               break;
            }
            case OPCAO_LISTAR_PARCILAMENTE: {
                listarParcialmente($pdo);
                break;
            }
            case OPCAO_SAIR: {
                exit(0);
            }
            default: {
                echo INVALID_OPTION . PHP_EOL;
            }
        }
    }

    function exibeErro(Exception $e) {
        echo PHP_EOL;
        echo "Error: ".$e->getMessage() . PHP_EOL;
        echo PHP_EOL;
    }

    function pedirProduto()
    {
        $codigo = readline("DIGITE O CODIGO DO PRODUTO: ");
        $descricao = readline("DIGITE A DESCRICAO DO PRODUTO: ");
        $estoque = readline("DIGITE O ESTOQUE DO PRODUTO: ");
        $preco = readline("DIGITE O PRECO DO PRODUTO: ");
        
        return new Produto(0, $codigo, $descricao, $estoque, $preco);
    }

    function cadastrarProduto(PDO $pdo)
    {
        try {
            $produto = pedirProduto();

            $stmt = $pdo->prepare("insert into produto(descricao, preco, codigo, estoque) values(?,?,?,?)");
            $stmt->execute([
                $produto->descricao,
                $produto->preco,
                $produto->codigo,
                $produto->estoque
            ]);
        } catch (PDOException $e) {
            exibeErro($e);
        }
    }

    function deletarProduto(PDO $pdo)
    {
        try {
            $codigo = solicitarCodigo();

            $stmt = $pdo->prepare("delete from produto where codigo = ?");
            $stmt->execute([
                $codigo
            ]);
        } catch (PDOException $e) {
            exibeErro($e);
        }
    }

    function solicitarCodigo()
    {
        $codigo = readline("DIGITE O CODIGO DO PRODUTO: ");

        return $codigo;
    }

    function alterarProduto(PDO $pdo)
    {
        try {
            $codigo = solicitarCodigo();
            $produto = pedirProduto();

            $stmt = $pdo->prepare("
                update
                    produto
                set
                    descricao = ?,
                    preco = ?,
                    codigo = ?,
                    estoque = ?
                where
                    codigo = ?"
            );
            $stmt->execute([
                $produto->descricao,
                $produto->preco,
                $produto->codigo,
                $produto->estoque,
                $codigo
            ]);
        } catch (PDOException $e) {
            exibeErro($e);
        }
    }

    function listarProdutos(PDOStatement $stmt)
    {
        try {
            $produtos = $stmt->fetchAll();

            echo PHP_EOL;
            echo "PRODUTOS" . PHP_EOL;
            foreach ($produtos as $produto) {
                echo "Código => " . $produto['codigo'] . ", " .
                " Descrição => ". $produto['descricao'] . ", " .
                " Estoque => ". $produto['estoque'] . ", " .
                " Preço => " . $produto['preco'] . PHP_EOL;
            }
            echo PHP_EOL;

        } catch (PDOException $e) {
            exibeErro($e);
        }
    }

    function listar(PDO $pdo)
    {
        try {
            $stmt = $pdo->query("select codigo, descricao, estoque, preco from produto", PDO::FETCH_ASSOC);

            listarProdutos($stmt);
        } catch (PDOException $e) {
            exibeErro($e);
        }
    }

    function listarParcialmente(PDO $pdo)
    {
        try {
            $codigoOuDescricao = readline("DIGITE O CÓDIGO OU A DESCRIÇÃO: ");

            $stmt = $pdo->prepare(
                "select
                    codigo,
                    descricao,
                    estoque,
                    preco
                from
                    produto
                where descricao like ? or codigo like ?"
            );

            $stmt->execute([
                '%' . $codigoOuDescricao . '%',
                '%' . $codigoOuDescricao . '%'
            ]);

            listarProdutos($stmt);
        } catch (PDOException $e) {
            exibeErro($e);
        }
    }