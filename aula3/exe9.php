<?php
    function removePontuacao($string) {
        $acentos = [',', '-', ';', ':', '!', '?', ' '];

        $novaString = str_replace($acentos, '', $string);
     
        return $novaString;
    }
?>