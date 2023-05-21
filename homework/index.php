<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <a href="/views/cadastrar.php">Cadastrar</a>
    <form action="#" method="GET">
        <label for="order">Ordernar por: </label>
        <select name="order" id="order">
            <option value="id">Id</option>
            <option value="descricao">Descrição</option>
            <option value="estoque">Estoque</option>
            <option value="preco">Preco</option>
        </select>
        <button type="submit">Ordernar</button>
    </form>
    <table>
        <thead>
            <th>Id</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__) . "/utils/pdo.php");
            require_once(dirname(__FILE__) . "/exceptions/RepositorioProdutoExeception.php");
            require_once(dirname(__FILE__) . "/repositories/RepositorioProdutoEmBdr.php");

            $pdo = pdo("mysql:host=localhost:3306;dbname=homework", 'root', 'root');

            use Homework\RepositorioExeception;

            try {
                $hasOrder = isset($_GET['order']);
                $repo = new RepositorioProdutoEmBdr($pdo);
                var_dump(htmlspecialchars($_GET['order']));
                $produtos = $repo->buscarProdutos($hasOrder ? htmlspecialchars($_GET['order']) : 'id');

                foreach ($produtos as $produto) {
                    echo <<<TR
                        <tr>
                            <td>{$produto->id}</td>
                            <td>{$produto->descricao}</td>
                            <td>{$produto->estoque}</td>
                            <td>{$produto->preco}</td>
                            <td>
                                <a href='/views/atualizar.php?id={$produto->id}'>Atualizar</a>
                                <a href='/actions/remover.php?id={$produto->id}'>Remover</a>
                            </td>
                        </tr>
                    TR;
                }
            } catch (RepositorioExeception $e) {
                echo "Error: " . $e->getMessage();
            }

            ?>
        </tbody>
        <tfoot>
            <?php
            try {
                $infos = $repo->buscarValoresMaximosMinimosEMedia();

                echo <<<TR
                    <tr>
                        <td>Valor máximo em estoque: {$infos->max}</td>
                    </tr>
                    <tr>
                        <td>Valor mínimo em estoque: {$infos->min}</td>
                    </tr>
                    <tr>
                        <td>Média dos custos: {$infos->avg}</td>
                    </tr>
                TR;
            } catch (RepositorioExeception $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </tfoot>
    </table>

</body>

</html>