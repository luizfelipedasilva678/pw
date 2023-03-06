<?php
    function fatorial(int $num) {
        $resultado = 1;

        for ($i = $num; $i !== 0; --$i) {
            $resultado *= $i;
        }

        return $resultado;
    }


    for ($i = 1; $i <= 30; ++$i) {
        echo "Fatorial de $i = " . fatorial($i) . PHP_EOL;
    }

?>