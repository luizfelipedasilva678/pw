<?php
require_once('getConnection.php');
require_once('RepositorioAcmeEmBdr.php');
require_once('Categoria.php');
require_once('MateriaPrima.php');

$descricao = htmlspecialchars($_POST['descricao']);
$quantidade = htmlspecialchars($_POST['quantidade']);
$custo = htmlspecialchars($_POST['custo']);
$categoriaId = htmlspecialchars($_POST['categoria']);

try {
    $pdo = getConnection();
    $repositorio = new RepositorioAcmeEmBdr($pdo);
    $categoria = new Categoria($categoriaId, '');
    $materiaPrima = new MateriaPrima(0, $descricao, $quantidade, $custo, $categoria);
    $repositorio->cadastrarMateriaPrima($materiaPrima);

    header('Location: index.php');
} catch (RepositorioException $e) {
    echo $e->getMessage();
}
