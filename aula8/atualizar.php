<?php
require_once('getConnection.php');
$pdo = null;
$pdo = getConnection();
$ps = $pdo->prepare(
    'update contato set nome = ?, telefone = ? where id = ?'
);
$ps->execute([
    htmlspecialchars($_POST["nome"]),
    htmlspecialchars($_POST["tel"]),
    htmlspecialchars($_POST["id"]),
]);
header('Location: contatos.php');
