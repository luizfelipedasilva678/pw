<?php
    function fib(int $N) {
        
        $next  =  1;
        $prev  =  0;

        if ($N == 0 || $N == 1) {
            return $N;
        } else {
            for ($i = 0; $i < $N; $i++) {
                $next  =  $next + $prev;
                $prev  =  $next - $prev;
            }
        }

        return $prev;

    }

    $rand = rand(1, 20);

    echo "Resultado $rand : " . fib($rand);
?>