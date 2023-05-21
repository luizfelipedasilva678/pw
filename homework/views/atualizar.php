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
    require_once(dirname(__FILE__) . "/../utils/pdo.php");
    require_once(dirname(__FILE__) . "/../repositories/RepositorioProdutoEmBdr.php");

    use Homework\RepositorioExeception;

    $pdo = pdo("mysql:host=localhost:3306;dbname=homework", 'root', 'root');
    $id = htmlspecialchars($_GET['id']);
    $repo = new RepositorioProdutoEmBdr($pdo);
    $produto = $repo->buscarProdutoPeloId((int) $id);

    try {
        $repo = new RepositorioProdutoEmBdr($pdo);
        echo <<<FORM
            <form action="/../actions/atualizar.php" method="POST">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao" value="{$produto->descricao}">
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" value="{$produto->estoque}">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" value="{$produto->preco}">
                <input type="hidden" name="id" value="{$produto->id}">
                <button type="submit">Enviar</button>
            </form>
        FORM;
    } catch (RepositorioExeception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>

</html>