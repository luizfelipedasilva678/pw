<?php
require_once dirname(__FILE__) . '/../interfaces/RepositorioUsuario.php';
require_once dirname(__FILE__) . '/../execeptions/RepositorioUsuarioExeception.php';


class RepositorioUsuarioEmJson implements RepositorioUsuario
{
    public function buscarUsuarios(): array
    {
        try {
            $json = file_get_contents('api.json');

            return json_decode($json)->usuarios;
        } catch (Exception $e) {
            throw new RepositorioUsuarioExeception($e->getMessage());
        }
    }

    public function removerUsuario(string $id): void
    {
        try {
            $json = file_get_contents('api.json');
            $obj = json_decode($json);
            $usuarios = $obj->usuarios;
            $idxToRemove = null;

            foreach ($usuarios as $idx => $usuario) {
                if ($usuario->id === (int) $id) {
                    $idxToRemove = $idx;
                }
            }

            if ($idxToRemove !== null) {
                unset($usuarios[$idxToRemove]);
            }

            $newObj = new stdClass();
            $newObj->usuarios = [];


            foreach ($usuarios as $usuario) {
                array_push($newObj->usuarios, $usuario);
            }

            var_dump($newObj);
            file_put_contents('api.json', json_encode($newObj));
        } catch (Exception $e) {
            throw new RepositorioUsuarioExeception($e->getMessage());
        }
    }


    public function atualizarUsuario(object $usuarioParam): void
    {
        try {
            $json = file_get_contents('api.json');
            $obj = json_decode($json);
            $usuarios = $obj->usuarios;
            $idxToUpdate = null;

            foreach ($usuarios as $idx => $usuario) {
                if ($usuario->id === (int) $usuarioParam->id) {
                    $idxToUpdate = $idx;
                }
            }

            if ($idxToUpdate !== null) {
                $usuarios[$idxToUpdate] = $usuarioParam;
            }

            $newObj = new stdClass();
            $newObj->usuarios = [];


            foreach ($usuarios as $usuario) {
                array_push($newObj->usuarios, $usuario);
            }

            file_put_contents('api.json', json_encode($newObj));
        } catch (Exception $e) {
            throw new RepositorioUsuarioExeception($e->getMessage());
        }
    }

    public function criarUsuario(object $usuario): void
    {
        try {
            $json = file_get_contents('api.json');
            $obj = json_decode($json);
            $id = $this->gerarId($obj->usuarios);
            $usuario->id = $id;

            array_push($obj->usuarios, $usuario);
            file_put_contents('api.json', json_encode($obj));
        } catch (Exception $e) {
            throw new RepositorioUsuarioExeception($e->getMessage());
        }
    }

    private function gerarId($usuarios): int
    {
        $maior = 0;

        foreach ($usuarios as $usuario) {
            if ($usuario->id > $maior) {
                $maior = $usuario->id;
            }
        }

        return $maior + 1;
    }
}
