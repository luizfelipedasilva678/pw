<?php

    function formatTelefone ($telefone) {
        $telefoneLength = mb_strlen($telefone);
        $allCharactersAreValids = preg_match_all("/^\d+$/i", $telefone);
        $formatedNumber = "";

        if (!$allCharactersAreValids) {
            return $telefone;
        }
       
        switch ($telefoneLength) {
            case 8: {
                return mb_substr($telefone, 0, 4) . " ". mb_substr($telefone, 4, 4);
            }
            case 10: {
                $formatedNumber = "(" . 
                mb_substr($telefone, 0, 2) . ") ". 
                mb_substr($telefone, 2, 4) . "-" . 
                mb_substr($telefone, 6, 4);

                return $formatedNumber;
            }
            case 11: {
                $isFree = preg_match_all("/^(0800|0300)\d+$/i", $telefone);

                $formatedNumber =
                "(" .  mb_substr($telefone, 0, 2) . ") ". 
                mb_substr($telefone, 2, 1) . "-" . 
                mb_substr($telefone, 3, 4) . "-". 
                mb_substr($telefone, 7, 4);

                if($isFree) {
                    $formatedNumber = 
                    mb_substr($telefone, 0, 4) . " " .
                    mb_substr($telefone, 4, 3) . " " .
                    mb_substr($telefone, 7, 4);
                }

                return $formatedNumber;
            }
            default: {
                return $telefone;
            }
        }
    }   

    echo formatTelefone("30044000");