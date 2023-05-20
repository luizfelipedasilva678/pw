<?php

require_once(dirname(__FILE__) . "/../utils/getConnection.php");
require_once(dirname(__FILE__) . "/../repositories/RepositorioAcmeEmBdr.php");
require_once(dirname(__FILE__) . "/../model/Categoria.php");
require_once(dirname(__FILE__) . "/../model/MateriaPrima.php");

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
