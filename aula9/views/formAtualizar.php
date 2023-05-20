<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>

<body>
    <?php
    require_once(dirname(__FILE__) . "/../utils/getConnection.php");
    require_once(dirname(__FILE__) . "/../repositories/RepositorioCategoriaEmBdr.php");
    require_once(dirname(__FILE__) . "/../repositories/RepositorioMateriaPrimaEmBdr.php");

    $id = htmlspecialchars($_GET['id']);

    try {
        $pdo = getConnection();
        $repositorioMp = new RepositorioMateriaPrimaEmBdr($pdo);
        $repositorioCategoria = new RepositorioCategoriaEmBdr($pdo);
        $categorias = $repositorioCategoria->buscarCategorias();
        $materiaPrima = $repositorioMp->buscarMateriasPrimaPeloId($id);

        echo <<<BEGINFORM
        <form action='/../actions/atualizar.php' method='POST'>
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" value="{$materiaPrima->getDescricao()}">
        <label for="quantidade">Quantidade: </label>
        <input type="number" name="quantidade" id="quantidade" value="{$materiaPrima->getQuantidade()}">
        <label for="custo">Custo: </label>
        <input type="number" name="custo" id="custo" value="{$materiaPrima->getCusto()}">
        <input type="hidden" name="id" value="{$materiaPrima->getId()}">
        <label for="custo">Categoria: </label>
        BEGINFORM;
        echo "<select name='categoria' id='categoria'>";
        foreach ($categorias as $categoria) {
            $selected = $categoria->getId() === $materiaPrima->getCategoria()->getId() ? 'selected' : '';

            echo <<<OPTION
                <option {$selected} value="{$categoria->getId()}">{$categoria->getNome()}</option>
            OPTION;
        }
        echo <<<ENDFORM
        </select>
        <button type='submit'> Atualizar </button>
        </form>
        ENDFORM;
    } catch (RepositorioException $e) {
        echo $e->getMessage();
    }

    ?>
</body>

</html>