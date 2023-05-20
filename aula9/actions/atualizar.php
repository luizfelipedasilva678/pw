<?php

require_once(dirname(__FILE__) . "/../utils/getConnection.php");
require_once(dirname(__FILE__) . "/../repositories/RepositorioMateriaPrimaEmBdr.php");
require_once(dirname(__FILE__) . "/../model/Categoria.php");
require_once(dirname(__FILE__) . "/../model/MateriaPrima.php");
require_once(dirname(__FILE__) . "/../model/UnidadeDeMedida.php");


$id = htmlspecialchars($_POST['id']);
$descricao = htmlspecialchars($_POST['descricao']);
$quantidade = htmlspecialchars($_POST['quantidade']);
$custo = htmlspecialchars($_POST['custo']);
$categoriaId = htmlspecialchars($_POST['categoria']);
$unidadeId = htmlspecialchars($_POST['unidade']);

try {
    $pdo = getConnection();
    $repositorio = new RepositorioMateriaPrimaEmBdr($pdo);
    $categoria = new Categoria((int) $categoriaId, '');
    $un = new UnidadeDeMedida((int) $unidadeId, '', '');
    $materiaPrima = new MateriaPrima((int) $id, $descricao, $quantidade, $custo, $categoria, $un);
    $repositorio->atualizarMateriaPrima($materiaPrima);

    header('Location: /../index.php');
} catch (RepositorioException $e) {
    echo $e->getMessage();
}
