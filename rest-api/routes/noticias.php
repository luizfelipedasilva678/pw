<?php
require_once dirname(__FILE__) . "/../repositorios/RepositorioNoticiasEmBdr.php";
require_once dirname(__FILE__) . "/../exceptions/RepositorioNoticiaExeception.php";
require_once dirname(__FILE__) . "/../utils/getContent.php";
require_once dirname(__FILE__) . "/../utils/validarConteudo.php";
require_once dirname(__FILE__) . "/../utils/gerarTabela.php";
require_once dirname(__FILE__) . "/../utils/getOrder.php";

function noticias(string $method, string $resource, PDO $pdo)
{
    $repositorio = new RepositorioNoticaEmBdr($pdo);
    $casamentos = [];
    $specificResourceRegex = '/^\/noticias\/([0-9]+)\/?$/i';
    $generalRegex = '/^\/noticias\/?$/i';
    $generalRegexWithParams =  '/^\/noticias\/?/i';

    try {
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
                    } elseif (preg_match($generalRegexWithParams, $resource)) {
                        $hasSpecificFormat = isset($_GET['formato']);
                        $hasFilter = isset($_GET['filtro']);
                        $filter = $hasFilter ? $_GET['filtro'] : '';
                        $order = getOrder();
                        $acceptedContent = getallheaders()['Accept'];
                        $isDateFilter = strtotime($filter);
                        $formato =
                            ($hasSpecificFormat && $_GET['formato'] === 'html') || $acceptedContent === 'text/html'
                            ? 'html' : '';
                        $noticias = $repositorio->buscarNoticias(htmlspecialchars($filter), $isDateFilter, $order);

                        if ($formato !== '') {
                            http_response_code(200);
                            header('Content-Type: text/html');
                            echo gerarTabela($noticias);
                        } else {
                            http_response_code(200);
                            header('Content-Type: application/json');
                            echo json_encode($noticias);
                        }
                    }
                    break;
                }
            case 'POST': {
                    if (preg_match($generalRegex, $resource)) {
                        $noticia = getContent();
                        $isValid = validarConteudo($noticia);

                        if ($isValid) {
                            $repositorio->salvarNoticia($noticia);
                            http_response_code(200);
                            header('Content-Type: text/plain;charset=utf-8');
                            echo "Criado com sucesso";
                        }
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
                        $isValid = validarConteudo($noticia);

                        if ($isValid) {
                            $noticia->id = $id;
                            $repositorio->alterarNoticia($noticia);

                            http_response_code(200);
                            header('Content-Type: text/plain;charset=utf-8');
                            echo "Alterado com sucesso";
                        }
                    }
                    break;
                }
            default: {
                    http_response_code(405);
                    echo "Method Not Allowed";
                }
        }
    } catch (Exception $e) {
        http_response_code(500);
        header('Content-Type: text/plain');
        echo 'Error: ' . $e->getMessage();
    } catch (RepositorioNoticiaExeception $e) {
        http_response_code(500);
        header('Content-Type: text/plain');
        echo 'Error: ' . $e->getMessage();
    }
}
