<?php

    require_once('RepositorioContaEmBdr.php');

    $pdo = null;
    $pdo = getConnection();

    $repositorio = new RepositorioContaEmBdr($pdo); 

    do {
        echo PHP_EOL;
        echo "Digite 1 para uma conta" . PHP_EOL;
        echo "Digite 2 para listar as contas" . PHP_EOL;
        echo "Digite 3 para realizar depósito" . PHP_EOL;
        echo "Digite 4 para transferir um montante" . PHP_EOL;
        echo "Digite 6 para encerrar" . PHP_EOL;
        echo PHP_EOL;

        $opcaoSelecionada = readline("Selecione a opção: ");

        switch($opcaoSelecionada) {
            case '1': 
                cadastrarConta($repositorio);
                break;
            case '2':
                listarContas($repositorio);
                break;
            case '3': 
                deposito($repositorio);
                break;
            case '4':
                transferir($repositorio);
            case '6': 
                die();
                break;
            default: 
                echo "Opção inválida".PHP_EOL;
        }

    } while ( $opcaoSelecionada !== '6' );
    
    function cadastrarConta($repositorio) {
        try {
            $cpf = readline('Digite o cpf: ');
            $dono = readline('Digite o dono: ');
            $senha = readline('Digite a senha: ');
            $saldo = readline('Digite o saldo: ');
    
            $c = new Conta($dono, $cpf, $senha, (int) $saldo);
            
            $repositorio->cadastrar($c);
        } catch(RepositorioException $e) {
            echo $e->getMessage();
        }
    }

    function listarContas($repositorio) {
        try {
            $contas = $repositorio->listar();

            foreach($contas as $conta) {
                echo PHP_EOL;
                echo "DONO => " . $conta->dono . PHP_EOL;
                echo "SALDO => " . $conta->saldo . PHP_EOL;
                echo "CPF => " . $conta->cpf . PHP_EOL;
                echo PHP_EOL;
            }
        } catch(RepositorioException $e) {
            echo PHP_EOL;
            echo $e->getMessage();
            echo PHP_EOL;
        }
    }

    function deposito($repositorio) {
        try {
            $cpf = readline("Digite o cpf do dono: ");
            $senha = readline("Digite a senha: ");
            $valor = readline("Digite o valor a se depositado: ");

            $repositorio->deposito($cpf, $senha, (float) $valor);
        } catch(RepositorioException $e) {
            echo PHP_EOL;
            echo $e->getMessage();
            echo PHP_EOL;
        }
    }

    function transferir($repositorio) {
        try {
            $cpf1 = readline("Digite o seu cpf: ");
            $senha1 = readline("Digite a sua senha: ");
            $cpf2 = readline("Digite o cpf da pessoa que vai receber: ");
            $senha2 = readline("Digite a senha da pessoa que vai receber: ");
            $valor = readline("Digite o valor a se transferido: ");

            $repositorio->transferir($cpf1, $senha1, $cpf2, $senha2, $valor);
        } catch(ContaException $e) {
            echo PHP_EOL;
            echo $e->getMessage();
            echo PHP_EOL;
        }
    }
