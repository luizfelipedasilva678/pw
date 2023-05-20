<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php
  require_once('getConnection.php');

  $pdo = null;
  $pdo = getConnection();
  $ps = $pdo->prepare(
    'select * from contato where id = ?'
  );
  $ps->execute([$_GET["id"]]);
  $user = $ps->fetchObject();
  echo <<<FORM
            <form action="atualizar.php" method="POST">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value={$user->nome} />
                <label for="tel">Telefone</label>
                <input type="text" name="tel" value={$user->telefone} />
                <input type="hidden" name="id" value={$_GET["id"]} />
                <button type="submit">Enviar</button>
            </form>
        FORM;
  ?>
</body>

</html>