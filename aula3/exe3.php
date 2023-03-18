<?php
    require_once('exe2.php');

    function formatarNumeros(&$telefones) {
        for ($i = 0; $i < count($telefones); $i++) {
            $telefones[$i] = formatTelefone($telefones[$i]);
        }
    }

    $telefones = [
        "30044000",
        "2225271727",
        "22987654321",
        "08007024000"
    ];

    formatarNumeros($telefones);

    print_r($telefones);
?>