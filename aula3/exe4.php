<?php
    require_once('exe2.php');
    require_once('exe3.php');
    
    function duplicatedPhones($telefones) {
        formatarNumeros($telefones);
        $duplicated = array_count_values($telefones);

        $duplicatedValues = [];

        foreach ($duplicated as $key => $value) {
            if($value > 1) {
                array_push($duplicatedValues, $key);
            }
        }

        return $duplicatedValues;
    }

    $telefones = [
        "30044000",
        "2225271727",
        "30044000",
        "30044000",
        "22987654321",
        "08007024000"
    ];

    print_r(duplicatedPhones($telefones));