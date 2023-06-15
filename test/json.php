<?php

$rua = $_GET['street'];
$numero = $_GET['number'];

$obj = new stdClass();
$obj->street = $rua;
$obj->number = $numero;

http_response_code(200);
header('Content-Type: application/json');
echo json_encode($obj);
