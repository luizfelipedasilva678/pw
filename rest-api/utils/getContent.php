<?php
function getContent()
{
    $contentType = getallheaders()['Content-Type'];
    $content = file_get_contents("php://input");

    if ($contentType === 'application/json') {
        return json_decode($content);
    } else {
        mb_parse_str($content, $urlDecoded);
        return (object) $urlDecoded;
    }
}
