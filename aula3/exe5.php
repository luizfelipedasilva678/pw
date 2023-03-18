<?php
    function retornaInfosInventores($inventores) {
        $novasInfos = [];

        foreach ($inventores as $inventor) {
            array_push($novasInfos,
                [
                    "sobrenome" => $inventor["sobrenome"], 
                    "viveu" => $inventor["morte"] - $inventor["nasc"]
                ]
            );
        }

        return $novasInfos;
    }

    function mediaAnos($inventores) {
        $sum = 0;

        foreach ($inventores as $inventor) {
           $sum += $inventor["morte"] - $inventor["nasc"];
        }

        return $sum / count($inventores);
    }

    function inventoresPorSeculo($seculoParam, $inventores) {
        $invetorsPerCentury = [];
        
        foreach ($inventores as $inventor) {
            $seculo =  (int) 
            mb_substr(strval($inventor["nasc"]), 0, 2) + 1; 

            
            if ($seculo === $seculoParam) {
                array_push($invetorsPerCentury, $inventor);
            }
        }

        return $invetorsPerCentury;
    }

    function inventoresPorSobrenome (&$inventores) { 
        usort($inventores, function ($inventor1, $inventor2) {
            if ($inventor1["sobrenome"] === $inventor2["sobrenome"]) {
                return 0;
            }

            if ($inventor1["sobrenome"] > $inventor2["sobrenome"]) {
                return 1;
            }

            return -1;
        });
    }


    $inventores = [
        ["nome" => 'Albert', "sobrenome" => 'Einstein', "nasc" => 1879, "morte" => 1955 ],
        ["nome"  =>  'Isaac',  "sobrenome"  =>  'Newton',  "nasc"  =>  1643, "morte" => 1727 ],
        ["nome" => 'Galileo', "sobrenome" => 'Galilei', "nasc" => 1564, "morte" => 1642 ],
        ["nome" => 'Nicolaus', "sobrenome" => 'Copernicus', "nasc" => 1473, "morte" => 1543 ],
        ["nome"  =>  'Ada',  "sobrenome"  =>  'Lovelace',  "nasc"  =>  1815, "morte" => 1852 ]
    ];

    //print_r(retornaInfosInventores($inventores));
    //print_r(mediaAnos($inventores));
    //print_r(inventoresPorSeculo(19, $inventores));
    inventoresPorSobrenome($inventores);
    print_r($inventores);