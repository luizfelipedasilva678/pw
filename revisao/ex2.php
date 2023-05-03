<?php
    function itensComecandoCom($string, $array)
    {
        $novoArray = [];
        $str2 = mb_strtolower($string);

        foreach ($array as $valor) {
            $str1 = mb_strtolower($valor);

            if (mb_strpos($str1, $str2) !== false) {
                array_push($novoArray, $valor);
            }
        }

        sort($novoArray);

        return $novoArray;
    }

    $entrada = [ 'Pedro', 'pedra', 'cinto', 'lápis', 'Camila', 'dado' ];
    $saida = itensComecandoCom('dra', $entrada);
    print_r($saida);


