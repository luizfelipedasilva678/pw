<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('getConnection.php');
            $pdo = getConnection();
            $ps = $pdo->query("select * from contato");
            foreach ($ps as $contato) {
                echo <<<TABLEROW
                        <tr>
                            <td>{$contato["id"]}</td>
                            <td>{$contato["nome"]}</td>
                            <td>{$contato["telefone"]}</td>
                            <td>
                                <a href='remover.php?id={$contato["id"]}'>Excluir</a>
                                <a href='atualizar-form.php?id={$contato["id"]}'>Atualizar</a>
                            </td>
                        </tr>
                    TABLEROW;
            }
            ?>
        </tbody>
    </table>
</body>

</html>