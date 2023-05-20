<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="cadastrar.php" method="POST">
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao">
        <label for="quantidade">Quantidade: </label>
        <input type="number" name="quantidade" id="quantidade">
        <label for="custo">Custo: </label>
        <input type="number" name="custo" id="custo">
        <label for="custo">Categoria: </label>
        <select name="categoria" id="categoria">
            <?php
                require_once('getConnection.php');
                require_once('RepositorioAcmeEmBdr.php');
                
                try {
                    $pdo = getConnection();
                    $repositorio = new RepositorioAcmeEmBdr($pdo);
                    $categorias = $repositorio->buscarCategorias();
                    foreach($categorias as $categoria) {
                        echo <<<TABLEROW
                            <option value="{$categoria->getId()}">{$categoria->getNome()}</option>
                        TABLEROW;
                    }
                } catch(RepositorioException $e) {
                    echo $e->getMessage();
                }
            ?>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>