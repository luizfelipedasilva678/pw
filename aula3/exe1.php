<?php
    function getMes($mes) {
        switch($mes) {
            case '01': 
                return 'Joneiro';
            case '02': 
                return 'Fevereiro';
            case '03': 
                return 'Março';
            case '04': 
                return 'Abril';
            case '05': 
                return 'Maio';
            case '06': 
                return 'Junho';
            case '07': 
                return 'Julho';
            case '08': 
                return 'Agosto';
            case '09': 
                return 'Setembro';
            case '10': 
                return 'Outubro';
            case '11': 
                return 'Novembro';
            case '12': 
                return 'Dezembro';
        }
    }
    
    $data = readline("Digite a data (dia/mes/ano): ");
    $dataArray = explode("/", $data);

    echo "$dataArray[0] de ". getMes($dataArray[1]) . " de ". $dataArray[2];
    


    


