<?php

$rua = $_GET['street'];
$numero = $_GET['number'];


http_response_code(200);
header('Content-Type: text/plain');
echo "$rua, $numero ";
