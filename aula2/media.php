<?php
    function media(array $numbers) {
        $total = count($numbers);
        $sum = 0;

        foreach ($numbers as $number) {
            $sum += $number;
        }

        return $sum / $total;
    }

    $numbers = [];

    for ($i = 0; $i < 10; $i++) {
        array_push($numbers, rand(1, 100));
    }

    print_r($numbers);

    echo "Media = " . media($numbers);

?>