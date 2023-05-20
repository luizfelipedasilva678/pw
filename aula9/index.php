<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <a href="/views/form.php">Cadastrar</a>

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
        require_once(dirname(__FILE__) . "/utils/getConnection.php");
        require_once(dirname(__FILE__) . "/repositories/RepositorioMateriaPrimaEmBdr.php");
        try {
            $pdo = getConnection();
            $repositorio = new RepositorioMateriaPrimaEmBdr($pdo);
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
                                <a href='/views/formAtualizar.php?id={$materiaPrima->getId()}'>Atualizar</a>
                                <a href='/actions/remover.php?id={$materiaPrima->getId()}'>Remover</a>
                            </td>
                        </tr>
                    TABLEROW;
            }
            echo '</tbody>';

            echo <<<TFOOT
                    <tfoot>
                        <td>
                            Custo médio: $media
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