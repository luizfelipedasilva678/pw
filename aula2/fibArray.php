<?php 
    function fibArray(int $N) {

        $fibArray = [0, 1];
        $next  =  1;
        $prev  =  0;

        if ($N == 0 || $N == 1) {
            return $N;
        } else {
            for ($i = 0; $i < $N; $i++) {
                $next  =  $next + $prev;
                $prev  =  $next - $prev;

                array_push($fibArray, $next);
            }
        }

        array_pop($fibArray);

        return $fibArray;
    }


    $rand = rand(1, 100);

    echo "Resultado $rand: \n";

    $fibResult = fibArray($rand);

    foreach($fibResult as $fibValue) {
        echo "$fibValue ";
    }
?>