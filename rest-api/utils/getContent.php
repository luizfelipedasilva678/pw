<?php
function getContent()
{
    $contentType = getallheaders()['Content-Type'];
    return json_decode(file_get_contents("php://input"));
}
