<?php

require_once(dirname(__FILE__) . "/../exceptions/RepositorioExeception.php");
require_once(dirname(__FILE__) . "/../model/UnidadeDeMedida.php");
require_once(dirname(__FILE__) . "/../interfaces/RepositorioUnidadeDeMedida.php");

class RepositorioUnidadeDeMedidaEmBdr implements RepositorioUnidadeDeMedida
{
    private $pdo;

    public function __construct(pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarUnidadesDeMedida(): array
    {
        try {
            $ps = $this->pdo->query('
                    select
                        *
                    from
                        unidade_medida
                ');

            $objs = [];

            foreach ($ps as $un) {
                $c = new UnidadeDeMedida($un['id'], $un['descricao'], $un['sigla']);
                array_push($objs, $c);
            }

            return $objs;
        } catch (PDOException $e) {
            throw new RepositorioException("Erro ao buscar unidades de medida");
        }
    }
}
