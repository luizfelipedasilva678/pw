<?php

function getOrder()
{
    $hasOrderFilter = isset($_GET['ordem']);
    $hasDescFilter = isset($_GET['desc']);

    if ($hasOrderFilter && $hasDescFilter) {
        $ordem = $_GET['ordem'];

        if ($ordem === 'titulo' || $ordem === 'conteudo' || $ordem === 'id') {
            $obj = new stdClass();
            $obj->field = $ordem;
            $obj->desc =  $_GET['desc'] === '1' ? 'desc' : 'asc';

            return $obj;
        }
    }

    return false;
}
