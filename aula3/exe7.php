<?php
    $file = fopen("produtos.csv", "r");
    $produtos = [];
    $totalStock = 0;

    while (!feof($file)) {
        $line = fgets($file);
        $produtoInfos = explode(",", $line);
        array_push($produtos, $produtoInfos);
    }

    usort($produtos, function($a, $b) {
        if($a[0] === $b[0]) {
            return 0;
        }

        if($a[0] > $b[0]) {
            return 1;
        }

        return -1;
    });

    foreach ($produtos as $produto) {
        $totalStock += $produto[1];
    }

    fclose($file);

    $html = <<<END
        <!DOCTYPE html>
        <html>
            <head>
                <title>Produtos</title>
                <meta charset="UTF-8" >
            </head>
            <body>
                <table>
                    <thead>
                        <tr>   
                            <th>Produtos</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
    END;
                    
    foreach ($produtos as $produto) {
        $html .= <<<END
            <tr>
                <td>$produto[0]</td>
                <td>$produto[1]</td>
                <td>$produto[2]</td>
            </tr>
        END;
    }

    $html .= <<<END
                </tbody>
                <tfoot>
                    <tr colspan='2'>
                        <td>Estoque Total $totalStock </td>
                    </tr>
                </tfoot>
            </body>
        </html>
    END;

    $htmlFile = fopen("produtos.html", "w+");
    fwrite($htmlFile, $html);
    fclose($htmlFile);