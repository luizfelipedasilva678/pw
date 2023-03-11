<?php   
    $nomes = [];

    do {    
        $nome = readline('Digite um nome (vazio para sair): ');
        $vazio = empty($nome);
        
        if (!$vazio) {
            $nomes [] = $nome;
        }

    } while(!empty($nome)); 

    //var_dump($nomes);

    foreach ($nomes as $key => $value) {
        echo "$key => $value".PHP_EOL;
    }
?>