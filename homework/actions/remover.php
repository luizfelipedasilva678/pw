<?php

require(dirname(__FILE__) . "/../utils/pdo.php");
require(dirname(__FILE__) . "/../repositories/RepositorioProdutoEmBdr.php");

use Homework\RepositorioExeception;

$id = htmlspecialchars($_GET['id']);

try {
    $pdo = pdo("mysql:host=localhost:3306;dbname=homework", 'root', 'root');
    $repo = new RepositorioProdutoEmBdr($pdo);

    $repo->removerProduto((int) $id);

    header('Location: /../index.php');
} catch (RepositorioExeception $e) {
    echo "Erro ao salvar produto " . $e->getMessage();
}
