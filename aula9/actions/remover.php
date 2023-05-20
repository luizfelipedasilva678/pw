<?php

require_once(dirname(__FILE__) . "/../utils/getConnection.php");
require_once(dirname(__FILE__) . "/../repositories/RepositorioAcmeEmBdr.php");

$id = htmlspecialchars($_GET['id']);

try {
    $pdo = getConnection();
    $repositorio = new RepositorioAcmeEmBdr($pdo);
    $repositorio->removerMateriaPrima((int) $id);

    header('Location: /../index.php');
} catch (RepositorioException $e) {
    echo $e->getMessage();
}
