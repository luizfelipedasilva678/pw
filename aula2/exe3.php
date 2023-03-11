<?php
    require_once("limparTela.php");

    $nomes = [];
    $opcaoSelecionada = '';
    const OPCAO_SAIR = '6';

    do {
        echo PHP_EOL;
        echo "Digite 1 para adicionar um nome" . PHP_EOL;
        echo "Digite 2 para remover um nome" . PHP_EOL;
        echo "Digite 3 para listar os nomes" . PHP_EOL;
        echo "Digite 4 para ordernar os nomes" . PHP_EOL;
        echo "Digite 5 para limpar a tela" . PHP_EOL;
        echo "Digite 6 para encerrar" . PHP_EOL;
        echo PHP_EOL;

        $opcaoSelecionada = readline("Selecione a opção: ");

        switch($opcaoSelecionada) {
            case '1': 
                echo PHP_EOL;

                $nome = readline("Digite um nome: ");

                if(empty($nome)) {
                    echo "Valor inválido".PHP_EOL;
                } else {
                    array_push($nomes, $nome);
                }

                echo PHP_EOL;

                break;
            case '2': 
                echo PHP_EOL;

                $nomeParaRemover = readline("Digite um nome a ser removido: ");
                $key = array_search($nomeParaRemover, $nomes);

                if(empty($nomeParaRemover)) {
                    echo "Valor inválido".PHP_EOL;
                } else {
                    if($key !== false) {
                        unset($nomes[$key]);
                    } else {
                        echo "Valor não encontrado".PHP_EOL;
                    }
                }

                echo PHP_EOL;

                break;
            case '3':
                echo PHP_EOL;

                foreach ($nomes as $key => $value) {
                    echo "$key => $value".PHP_EOL;
                }

                echo PHP_EOL;
                break;
            case '4':
                sort($nomes);
                break;
            case '5': 
                limparTela();
                break;
            case '6': 
                die();
                break;
            default: 
                echo "Opção inválida".PHP_EOL;
        }

    } while ( $opcaoSelecionada !== OPCAO_SAIR );
?>