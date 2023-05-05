<?php

namespace escola;

require_once(dirname(__FILE__) . "/alunoRepositorio/alunoRepositorioEmBd.php");
require_once(dirname(__FILE__) . "/alunoRepositorio/alunoRepositorioException.php");
require_once(dirname(__FILE__) . "/model/aluno.php");

use DateTime;
use \escola\AlunoRepositorioEmBd as AlunoRepositorioEmBD;
use \escola\Aluno as Aluno;
use RepositorioException;

$repositorio = new AlunoRepositorioEmBD();


do {
    echo PHP_EOL;
    echo "DIGITE 0 PARA ENCERRAR" . PHP_EOL;
    echo "DIGITE 1 PARA CRIAR UM ALUNO" . PHP_EOL;
    echo "DIGITE 2 PARA ATUALIZAR UM ALUNO" . PHP_EOL;
    echo "DIGITE 3 PARA DELETAR UM ALUNO" . PHP_EOL;
    echo "DIGITE 4 PARA LISTAR OS ALUNO" . PHP_EOL;
    echo "DIGITE 5 PARA LISTAR UM ALUNO PELO ID" . PHP_EOL;
    echo PHP_EOL;

    $opcao = readline("SELECIONE UM OPÇÃO: ");

    switch ($opcao) {
        case '0': {
                exit(0);
            }
        case '1': {
                try {
                    $nome = readline("DIGITE O NOME: ");
                    $dataNascimento = readline("DIGITE A DATA DE NASCIMENTO (YYYY-MM-DD): ");
                    $cpf = readline("DIGITE O CPF: ");

                    print_r($repositorio->criar(new Aluno(0, $nome, new DateTime($dataNascimento), $cpf)));
                } catch (RepositorioException $e) {
                    echo $e->getMessage();
                }
                break;
            }
        case '2': {
                try {
                    $id = readline("DIGITE O ID DO ALUNO: ");
                    $nome = readline("DIGITE O NOME: ");
                    $dataNascimento = readline("DIGITE A DATA DE NASCIMENTO (YYYY-MM-DD): ");
                    $cpf = readline("DIGITE O CPF: ");

                    print_r($repositorio->atualizar(new Aluno($id, $nome, new DateTime($dataNascimento), $cpf)));
                } catch (RepositorioException $e) {
                    echo $e->getMessage();
                }
                break;
            }
        case '3': {
                try {
                    $id = readline("DIGITE O ID DO ALUNO A SER REMOVIDO: ");

                    print_r($repositorio->deletar($id));
                } catch (RepositorioException $e) {
                    echo $e->getMessage();
                }
                break;
            }
        case '4': {
                try {
                    $alunos = $repositorio->listar();

                    foreach ($alunos as $aluno) {
                        echo PHP_EOL;
                        echo "ID: " . $aluno->getId() . " ";
                        echo "NOME: " . $aluno->getName() . " ";
                        echo "DATA DE NASCIMENTO: " . $aluno->getDataNascimento() . " ";
                        echo "CPF: " . $aluno->getCpf();
                        echo PHP_EOL;
                    }
                } catch (RepositorioException $e) {
                    echo $e->getMessage();
                }

                break;
            }
        case '5': {
                try {
                    $id = readline("DIGITE O ID: ");

                    $aluno = $repositorio->pegarPeloId($id);

                    echo PHP_EOL;
                    echo "ID: " . $aluno->getId() . " ";
                    echo "NOME: " . $aluno->getName() . " ";
                    echo "DATA DE NASCIMENTO: " . $aluno->getDataNascimento() . " ";
                    echo "CPF: " . $aluno->getCpf();
                    echo PHP_EOL;
                } catch (RepositorioException $e) {
                    echo $e->getMessage();
                }
                break;
            }
        default: {
                echo PHP_EOL;
                echo "OPÇÃO INVÁLIDA" . PHP_EOL;
                echo PHP_EOL;
            }
    }
} while ($opcao !== '0');
