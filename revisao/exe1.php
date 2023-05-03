<?php

    function contabilizar($entrada) {
        $novoArray = [];

        foreach ($entrada as $valor) {
            if (isset($novoArray[$valor])) {
                $novoArray[$valor] += 1;
            } else {
                $novoArray[$valor] = 1;
            }
        }

        return $novoArray;
    }

    $entrada = [ 'maçã', 'uva', 'maçã', 'banana', 'goiaba', 'uva', 'maçã', 'banana' ];

    var_dump(contabilizar($entrada));