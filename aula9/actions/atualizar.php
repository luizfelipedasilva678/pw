<?php

require_once(dirname(__FILE__) . "/../utils/getConnection.php");
require_once(dirname(__FILE__) . "/../repositories/RepositorioMateriaPrimaEmBdr.php");
require_once(dirname(__FILE__) . "/../model/Categoria.php");
require_once(dirname(__FILE__) . "/../model/MateriaPrima.php");

$id = htmlspecialchars($_POST['id']);
$descricao = htmlspecialchars($_POST['descricao']);
$quantidade = htmlspecialchars($_POST['quantidade']);
$custo = htmlspecialchars($_POST['custo']);
$categoriaId = htmlspecialchars($_POST['categoria']);

try {
    $pdo = getConnection();
    $repositorio = new RepositorioMateriaPrimaEmBdr($pdo);
    $categoria = new Categoria((int) $categoriaId, '');
    $materiaPrima = new MateriaPrima((int) $id, $descricao, $quantidade, $custo, $categoria);
    $repositorio->atualizarMateriaPrima($materiaPrima);

    header('Location: /../index.php');
} catch (RepositorioException $e) {
    echo $e->getMessage();
}
