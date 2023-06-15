<?php
function validarConteudo(object $noticia)
{
    if (!isset($noticia->titulo) || !isset($noticia->conteudo) || !isset($noticia->usuario)) {
        http_response_code(400);
        header('Content-Type: text/plain');
        echo "Um notícia dever conter titulo, conteudo e usuario";

        return false;
    }

    return true;
}
