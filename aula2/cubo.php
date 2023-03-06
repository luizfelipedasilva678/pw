<?php
    function cubo(int $n) {
        return pow($n, 3); 
    }

    $numbers = [1, 2, 3, 4, 5];

    foreach($numbers as $number) {
        echo "$number ao cubo é igual a " . cubo($number) . PHP_EOL;
    }
?>