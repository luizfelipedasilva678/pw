<?php 
    namespace vac;

    require_once("repositorio-vacina.php");
    require_once("repositorio-exception.php");
    require_once("vacina.php");

    class RepositorioVacinaEmBd implements RepositorioVacina {
        private \PDO | null $pdo = null;

        public function __construct()
        {
            $this->pdo = $this->getConnection();
        }

        private function getConnection()
        {
            try {
                return new \PDO(
                    "mysql:host=localhost:3306;dbname=2021-1-p1",
                    'root',
                    'senha',
                    [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
                );
            } catch (\PDOException $e) {
                throw new RepositorioExeception($e->getMessage());
            }
        }

        public function vacinas(): array
        {
            try {
                $vacinas = [];

                $ps = $this->pdo->query(
                    "select
                        id,
                        nome,
                        fabricante,
                        doses,
                        eficacia,
                        eficacia_delta,
                        perda_mensal
                    from
                        vacina"
                    ,
                    \PDO::FETCH_ASSOC
                );

                foreach ($ps as $vacina) {
                    array_push(
                        $vacinas,
                        new Vacina(
                            $vacina["id"],
                            $vacina["nome"],
                            $vacina["fabricante"],
                            $vacina["doses"],
                            $vacina["eficacia"],
                            $vacina["eficacia_delta"],
                            $vacina["perda_mensal"],
                        )
                    );
                }

                return $vacinas;
            } catch (\PDOException $e) {
                throw new RepositorioExeception($e->getMessage());
            }
        }

        public function vacinaComId($id): object | null
        {
            try {
                $ps = $this->pdo->prepare("
                    select
                        id,
                        nome,
                        fabricante,
                        doses,
                        eficacia,
                        eficacia_delta,
                        perda_mensal
                    from vacina
                    where
                        id = ?
                ");

                $ps->execute([
                    $id
                ]);

                $result = $ps->rowCount();

                if ($result < 1) {
                    return null;
                }

                $vacina = $ps->fetchObject();

                return new Vacina(
                    $vacina->id,
                    $vacina->nome,
                    $vacina->fabricante,
                    $vacina->doses,
                    $vacina->eficacia,
                    $vacina->eficacia_delta,
                    $vacina->perda_mensal
                );
            } catch (\PDOException $e) {
                throw new RepositorioExeception($e->getMessage());
            }
        }

        public function atualizarVacina(object $vacina): void
        {
            try {
                $ps = $this->pdo->prepare("
                    update
                        vacina
                    set
                        nome = ?,
                        fabricante = ?,
                        doses = ?,
                        eficacia = ?,
                        eficacia_delta = ?,
                        perda_mensal = ?
                    where
                        id = ?
                ");

                $ps->execute([
                    $vacina->getNome(),
                    $vacina->getFabricante(),
                    $vacina->getDoses(),
                    $vacina->getEficacia(),
                    $vacina->getEficaciaDelta(),
                    $vacina->getPerdaMensal(),
                    $vacina->getId()
                ]);
            } catch (\PDOException $e) {
                throw new RepositorioExeception($e->getMessage());
            }
        }
    }