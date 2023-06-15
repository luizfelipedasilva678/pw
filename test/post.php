<?php

$rua = $_POST['street'];
$numero = $_POST['number'];


http_response_code(200);
header('Content-Type: text/html');
echo "<address> $rua, $numero </address>";
