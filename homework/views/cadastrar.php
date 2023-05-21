<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastar</title>
</head>

<body>
    <form action="/../actions/cadastrar.php" method="POST">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao">
        <label for="estoque">Estoque:</label>
        <input type="number" name="estoque" id="estoque">
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco">
        <button type="submit">Enviar</button>
    </form>
</body>

</html>