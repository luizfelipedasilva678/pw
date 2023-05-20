<?php
require_once("getConnection.php");
$pdo = getConnection();
$ps = $pdo->prepare(
    'delete from contato where id = ?'
);
$ps->execute([
    htmlspecialchars($_GET["id"]),
]);
header('Location: contatos.php');
