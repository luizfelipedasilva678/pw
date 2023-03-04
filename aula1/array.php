<?php 
    $nomes = array("maria", "joana");

    echo $nomes[0];

    $meses = [
        6 => "junho",
        "julho",
        "agosto"
    ];


    print_r($nomes);
    print_r($meses);


    $meses2 = [
        "mesUm" => "Janeiro"
    ];

    print_r($meses2);
    echo $meses2["mesUm"];
?>