<?php   
    $nomes = [];

    do {    
        $nome = readline('Digite um nome (vazio para sair): ');
        $vazio = empty($nome);

        if (!$vazio) {
            $nomes [] = $nome;
        }


    } while(!empty($nome)); 


    var_dump($nomes);
?>