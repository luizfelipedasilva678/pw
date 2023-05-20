<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="/../actions/cadastrar.php" method="POST">
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao">
        <label for="quantidade">Quantidade: </label>
        <input type="number" name="quantidade" id="quantidade">
        <label for="custo">Custo: </label>
        <input type="number" name="custo" id="custo">
        <label for="custo">Categoria: </label>
        <?php
        require_once(dirname(__FILE__) . "/../utils/getConnection.php");
        require_once(dirname(__FILE__) . "/../repositories/RepositorioCategoriaEmBdr.php");
        require_once(dirname(__FILE__) . "/../repositories/RepositorioUnidadeDeMedidaEmBdr.php");

        try {
            $pdo = getConnection();
            $repositorioCategoria = new RepositorioCategoriaEmBdr($pdo);
            $repositorioUn = new RepositorioUnidadeDeMedidaEmBdr($pdo);
            $categorias = $repositorioCategoria->buscarCategorias();
            $uns = $repositorioUn->buscarUnidadesDeMedida();

            echo "<select name='categoria' id='categoria'>";
            foreach ($categorias as $categoria) {
                echo <<<OPTION
                        <option value="{$categoria->getId()}">{$categoria->getNome()}</option>
                    OPTION;
            }
            echo '</select>';

            echo "<select name='unidade' id='unidade'>";
            foreach ($uns as $un) {
                echo <<<OPTION
                        <option value="{$un->getId()}">{$un->getDescricao()}</option>
                    OPTION;
            }
            echo '</select>';
        } catch (RepositorioException $e) {
            echo $e->getMessage();
        }
        ?>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>