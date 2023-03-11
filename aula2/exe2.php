<?php
    $pessoas = [];
    $opcaoSelecionada = '';
    const OPCAO_SAIR = '5';

    function menu(&$opcaoSelecionada) {
        echo PHP_EOL;
        echo "Digite 1 para adicionar uma pessoa" . PHP_EOL;
        echo "Digite 2 para remover uma pessoa" . PHP_EOL;
        echo "Digite 3 para listar as pessoas" . PHP_EOL;
        echo "Digite 4 para editar uma pessoa" . PHP_EOL;
        echo "Digite 5 para sair" . PHP_EOL;
        echo PHP_EOL;

        $opcaoSelecionada = readline("Selecione a opção: ");
    }

    function inserir_pessoa(&$pessoas) {
        echo PHP_EOL;

        $nome = readline("Digite o nome da pessoa: ");
        $idade = readline("Digite a idade da pessoa: ");

        if(empty($nome) || empty($idade)) {
            echo "Valores inválido".PHP_EOL;
        } else {
            $p =  ['nome' => $nome, 'idade' => $idade];
            array_push($pessoas, $p);
        }

        echo PHP_EOL;
    }

    function remover_pessoa(&$pessoas) {
        echo PHP_EOL;

        $nomeParaRemover = readline("Digite um nome a ser removido: ");
        
        if(empty($nomeParaRemover)) {
            echo "Valor inválido".PHP_EOL;
        } else {
            $idx = false;

            foreach($pessoas as $key => $pessoa) {
                if($pessoa['nome'] === $nomeParaRemover) {
                    $idx = $key; 
                    break;
                }
            }

            if($idx !== false) {
                unset($pessoas[$idx]);
            } else {
                echo "Valor não encontrado".PHP_EOL;
            }
        }

        echo PHP_EOL;
    }

    function listar_pessoas(&$pessoas) {
        echo PHP_EOL;

        usort($pessoas, function($p1, $p2) {
            if ( $p1['nome'] === $p2['nome'] ) {
                return 0;
            }

            if ( $p1['nome'] > $p2['nome'] ) {
                return 1;
            }

            return -1;
        });


        foreach ($pessoas as $pessoa) {
            echo "Nome " . $pessoa['nome'] . ", Idade " . $pessoa['idade'] . PHP_EOL;
        }

        echo PHP_EOL;
    }

    function editar_pessoa(&$pessoas) {
        $idx = readline("Digite o index a ser atualizado: ");
        $nome = readline("Digite o novo nome: ");
        $idade = readline("Digite a nova idade: ");

        if(!is_int($idx) || empty($nome) || empty($idade)) {
            echo "Valores inválidos ".PHP_EOL;
        } else {
            if(!isset($pessoas[(int) $idx])) {
                echo "Esse index não existe ".PHP_EOL;
            } else {
                $pessoas[$idx]['nome'] = $nome;
                $pessoas[$idx]['idade'] = $idade;
            }
        }
    }

    do { 
        menu($opcaoSelecionada);
       
        switch($opcaoSelecionada) {
            case '1': 
                inserir_pessoa($pessoas);
                break;
            case '2': 
                remover_pessoa($pessoas);
                break;
            case '3':
                listar_pessoas($pessoas);
                break;
            case '4': 
                editar_pessoa($pessoas);
                break;
            case OPCAO_SAIR: 
                die();
                break;
            default: 
                echo "Opção inválida".PHP_EOL;
        }

    } while ( $opcaoSelecionada !== OPCAO_SAIR );
?>