<?php

require_once(dirname(__FILE__) . "/../exceptions/RepositorioExeception.php");
require_once(dirname(__FILE__) . "/../model/Categoria.php");
require_once(dirname(__FILE__) . "/../interfaces/RepositorioCategoria.php");

class RepositorioCategoriaEmBdr implements RepositorioCategoria
{
    private $pdo;

    public function __construct(pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarCategorias(): array
    {
        try {
            $ps = $this->pdo->query('
                    select
                        *
                    from
                        categoria
                ');

            $objs = [];

            foreach ($ps as $categoria) {
                $c = new Categoria($categoria['id'], $categoria['nome']);
                array_push($objs, $c);
            }

            return $objs;
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao listar");
        }
    }
}
