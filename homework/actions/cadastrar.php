<?php

require(dirname(__FILE__) . "/../model/Produto.php");
require(dirname(__FILE__) . "/../utils/pdo.php");
require(dirname(__FILE__) . "/../repositories/RepositorioProdutoEmBdr.php");

use Homework\RepositorioExeception;

$descricao = htmlspecialchars($_POST['descricao']);
$estoque = htmlspecialchars($_POST['estoque']);
$preco = htmlspecialchars($_POST['preco']);

try {
    $prod = new Produto(0, $descricao, $estoque, $preco);
    $pdo = pdo("mysql:host=localhost:3306;dbname=homework", 'root', 'root');
    $repo = new RepositorioProdutoEmBdr($pdo);

    $repo->salvarProduto($prod);

    header('Location: /../index.php');
} catch (RepositorioExeception $e) {
    echo "Erro ao salvar produto " . $e->getMessage();
}
