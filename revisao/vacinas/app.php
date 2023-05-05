<?php 

    require_once("repositorio-vacina-em-bd.php");
    require_once("repositorio-exception.php");

    $repositorio = new \vac\RepositorioVacinaEmBd();
    
    do {
        echo PHP_EOL;
        echo "DIGITE 0 PARA SAIR".PHP_EOL;
        echo "DIGITE 1 PARA LISTAR AS VACINAS".PHP_EOL;
        echo "DIGITE 2 PARA CALCULA EFICÁCIA".PHP_EOL;
        echo PHP_EOL;

        $opcao = readline("DIGITE A OPÇÃO: ");
    
        switch ($opcao) {
            case '0': {
                exit(0);
            }
            case '1': {
                try {
                    $vacinas = $repositorio->vacinas();

                    foreach ($vacinas as $vacina) {
                        echo PHP_EOL;
                        echo $vacina->getId() . " - " .
                            $vacina->getNome() . " - " .
                            $vacina->getFabricante() . " - " .
                            $vacina->getDoses() . " - " .
                            $vacina->getEficacia() * 100 . " - " .
                            $vacina->getEficaciaDelta() * 100 . " - " .
                            $vacina->getPerdaMensal() * 100;
                        echo PHP_EOL;
                    }
                } catch (\vac\RepositorioExeception $e) {
                    echo "An error occurred" . $e->getMessage();
                } catch (\Exception $e) {
                    echo "An error occurred " . $e->getMessage();
                }

                break;
            }
            case '2': {
                try {
                    $id = readline("DIGITE O ID DA VACINA:");

                    if (empty($id)) {
                        echo PHP_EOL;
                        echo "ID INVÁLIDO";
                        echo PHP_EOL;
                        break;
                    }

                    $vacina = $repositorio->vacinaComId($id);

                    if (!isset($vacina)) {
                        echo PHP_EOL;
                        echo "VACINA NÃO ENCONTRADA";
                        echo PHP_EOL;
                        break;
                    }

                    $numMeses = readline("DIGITE O NÚMERO DE MESES: ");
                    $variante = readline("CONSIDERAR VARIANTE DELTA (S (PARA SIM) - QUALQUER OUTRO CARACTER PARA NÃO): ");

                    $comVariante = $variante === 'S' ? true : false;

                    echo "Resultado -> " . $vacina->eficaciaAposMeses((int) $numMeses, $comVariante);

                } catch (\vac\RepositorioExeception $e) {
                    echo "An error occurred " . $e->getMessage();
                }

                break;
            }
            default: {
                echo PHP_EOL;
                echo "OPÇÃO INVÁLIDA".PHP_EOL;
                echo PHP_EOL;
            }
        }

    } while ($opcao !== '0');