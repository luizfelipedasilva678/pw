<?php
require_once dirname(__FILE__) . "/../repositorios/RepositorioNoticiasEmBdr.php";
require_once dirname(__FILE__) . "/../utils/getContent.php";

function noticias(string $method, string $resource, PDO $pdo)
{
    $repositorio = new RepositorioNoticaEmBdr($pdo);
    $casamentos = [];
    $specificResourceRegex = '/^\/noticias\/([0-9]+)\/?$/i';
    $generalRegex = '/^\/noticias\/?$/i';

    switch ($method) {
        case 'GET': {
                if (preg_match($specificResourceRegex, $resource, $casamentos)) {
                    [, $id] = $casamentos;

                    $queryResult = $repositorio->buscarNoticiaPeloId($id);
                    $resultado = json_encode($queryResult);
                    $length = mb_strlen($resultado);
                    http_response_code(200);
                    header('Content-Type: application/json');
                    header('Content-Length: ' . $length);
                    echo $resultado;
                } elseif (preg_match($generalRegex, $resource)) {
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($repositorio->buscarNoticias());
                }
                break;
            }
        case 'POST': {
                if (preg_match($generalRegex, $resource)) {
                    $noticia = getContent();
                    $repositorio->salvarNoticia($noticia);
                    http_response_code(200);
                    header('Content-Type: text/plain;charset=utf-8');
                    echo "Criado com sucesso";
                }
                break;
            }
        case 'DELETE': {
                if (preg_match($specificResourceRegex, $resource, $casamentos)) {
                    [, $id] = $casamentos;
                    $repositorio->removerNoticia($id);
                    http_response_code(200);
                    header('Content-Type: text/plain;charset=utf-8');
                    echo "Deletado com sucesso";
                }
                break;
            }
        case 'PUT': {
                if (preg_match($specificResourceRegex, $resource, $casamentos)) {
                    [, $id] = $casamentos;
                    $noticia = getContent();
                    $noticia->id = $id;
                    var_dump($noticia);
                    $repositorio->alterarNoticia($noticia);
                    http_response_code(200);
                    header('Content-Type: text/plain;charset=utf-8');
                    echo "Alterado com sucesso";
                }
                break;
            }
        default: {
                http_response_code(405);
                echo "Method Not Allowed";
            }
    }
}
