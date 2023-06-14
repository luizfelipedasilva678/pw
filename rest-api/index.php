<?php

require_once(dirname(__FILE__) . "/utils/pdo.php");
require_once(dirname(__FILE__) . "/routes/noticias.php");


$pdo = null;

try {
    $pdo = pdo("mysql:host=localhost:3306;dbname=xpto", 'root', 'root');
} catch (PDOException $e) {
    http_response_code(500);
    header("Content-Type: text/plain;charset=utf-8");
    echo "Connection Failed";
}

$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

if (str_contains($resource, "noticias")) {
    noticias($method, $resource, $pdo);
} else {
    http_response_code(404);
    header("Content-Type: text/plain;charset=utf-8");
    echo "Resource Not Found";
}
