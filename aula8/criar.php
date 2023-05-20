<?php
require_once('getConnection.php');

$pdo = null;

$pdo = getConnection();

$ps = $pdo->prepare(
    'insert into contato(nome,telefone) values(?,?)'
);

$ps->execute([
    htmlspecialchars($_POST["nome"]),
    htmlspecialchars($_POST["tel"]),
]);
