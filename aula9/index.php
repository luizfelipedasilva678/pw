<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <a href="form.php">Cadastrar</a>

    <table>
        <thead>
            <th>Id</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Custo</th>
            <th>Categoria</th>
            <th>Ações</th>
        </thead>
        <?php
        require_once('getConnection.php');
        require_once('RepositorioAcmeEmBdr.php');
        try {
            $pdo = getConnection();
            $repositorio = new RepositorioAcmeEmBdr($pdo);
            $materiasPrimas = $repositorio->buscarMateriasPrimas();
            $media = $repositorio->buscarMediaCusto();

            echo '<tbody>';
            foreach ($materiasPrimas as $materiaPrima) {
                echo <<<TABLEROW
                        <tr>
                            <td>{$materiaPrima->getId()}</td>
                            <td>{$materiaPrima->getDescricao()}</td>
                            <td>{$materiaPrima->getQuantidade()}</td>
                            <td>{$materiaPrima->getCusto()}</td>
                            <td>{$materiaPrima->getCategoria()->getNome()}</td>
                            <td>
                                <a href='atualizar.php?id={$materiaPrima->getId()}'>Atualizar</a>
                                <a href='remover.php?id={$materiaPrima->getId()}'>Remover</a>
                            </td>
                        </tr>
                    TABLEROW;
            }
            echo '</tbody>';

            echo <<<TFOOT
                    <tfoot>
                        <td>
                            Media $media
                        </td>
                    </tfoot>
                TFOOT;
        } catch (RepositorioException $e) {
            echo $e->getMessage();
        }
        ?>
    </table>
</body>

</html>