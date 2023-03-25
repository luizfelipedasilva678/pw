<?php
    require_once('exe9.php');
    require_once('exe8.php');

    function palindromo($string) {
        $stringSemDiacriticos = removerDiacriticos($string);
        $stringSemPontuacao = removePontuacao($stringSemDiacriticos);
        $str1 = mb_strtolower($stringSemPontuacao);
        $str2 = mb_strtolower($stringSemPontuacao);

        $reverseString = implode("", array_reverse(str_split($str1)));

        if($reverseString === $str1) {
            echo "Polindromo" . PHP_EOL;
        } else {
            echo "Não é polindromo" . PHP_EOL;
        }
    }

    palindromo("Saíram o tio e oito marias");
    palindromo("Seco de raiva, coloco no colocaviar e doces");
    palindromo("Socorram-me, subi no ônibus em Marrocos!");
    palindromo("A diva em Argel alegra-me a vida.“, “Sá da tapas e sapatadas");
