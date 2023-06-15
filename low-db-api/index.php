<?php

require_once dirname(__FILE__) . '/repositorios/RepositorioUsuarioEmJson.php';

$repositorio = new RepositorioUsuarioEmJson();

$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

if (preg_match('/^\/usuarios\/?$/', $url) && $method === 'GET') {
    $resultado = $repositorio->buscarUsuarios();
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($resultado);
}

if (preg_match('/^\/usuarios\/?$/', $url) && $method === 'POST') {
    $usuario = json_decode(file_get_contents('php://input'));
    $resultado = $repositorio->criarUsuario($usuario);

    http_response_code(200);
    header('Content-Type: text/plain');
    echo "Criado com sucesso";
}

if (preg_match('/^\/usuarios\/([0-9]+)$/', $url, $casamentos) && $method === 'DELETE') {
    [, $id] = $casamentos;
    $resultado = $repositorio->removerUsuario($id);

    http_response_code(200);
    header('Content-Type: text/plain');
    echo "Deletado com sucesso";
}

if (preg_match('/^\/usuarios\/([0-9]+)$/', $url, $casamentos) && $method === 'PUT') {
    [, $id] = $casamentos;
    $content = file_get_contents('php://input');
    $usuario = json_decode($content);
    $usuario->id = (int) $id;
    $resultado = $repositorio->atualizarUsuario($usuario);

    http_response_code(200);
    header('Content-Type: text/plain');
    echo "Atualizado com sucesso";
}
