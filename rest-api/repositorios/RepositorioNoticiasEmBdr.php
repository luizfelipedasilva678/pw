<?php
require(dirname(__FILE__) . '/../interfaces/RepositorioNoticia.php');
require(dirname(__FILE__) . '/../exceptions/RepositorioNoticiaExeception.php');
require(dirname(__FILE__) . '/../model/Noticia.php');

class RepositorioNoticaEmBdr implements RepositorioNotica
{
    private $pdo = null;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarNoticias(string $filter, bool $isDateFilter, object|false $order): array
    {
        try {
            $hasFilter = $filter !== '' ? true : false;
            $sqlString = "SELECT * FROM noticia";

            if ($hasFilter) {
                if ($isDateFilter) {
                    $sqlString .= " where created_at = ?";
                } else {
                    $sqlString .= " where titulo = ? or conteudo = ?";
                }
            }

            if ($order !== false) {
                $sqlString .= " order by {$order->field} {$order->desc}";
            }

            $ps = $this->pdo->prepare($sqlString);

            if ($hasFilter) {
                if ($isDateFilter) {
                    $ps->execute([
                        $filter,
                    ]);
                } else {
                    $ps->execute([
                        $filter,
                        $filter,
                    ]);
                }
            } else {
                $ps->execute();
            }

            $noticias = [];

            foreach ($ps as $noticia) {
                array_push(
                    $noticias,
                    new Noticia(
                        $noticia['id'],
                        $noticia['titulo'],
                        $noticia['usuario'],
                        $noticia['conteudo'],
                        new DateTime(
                            $noticia['created_at']
                        )
                    )
                );
            }

            return $noticias;
        } catch (PDOException $e) {
            throw new RepositorioNoticiaExeception($e->getMessage());
        }
    }

    public function buscarNoticiaPeloId($id): object
    {
        try {
            $ps = $this->pdo->prepare("SELECT * FROM noticia where id = ?");
            $ps->execute([
                $id
            ]);
            $result = $ps->fetchObject();

            return new Noticia(
                $result->id,
                $result->titulo,
                $result->usuario,
                $result->conteudo,
                new DateTime(
                    $result->created_at
                )
            );
        } catch (PDOException $e) {
            throw new RepositorioNoticiaExeception($e->getMessage());
        }
    }

    public function salvarNoticia($noticia): void
    {
        try {
            $ps = $this->pdo->prepare("insert into noticia(titulo, usuario, conteudo) values(?,?,?)");

            $ps->execute([
                $noticia->titulo,
                $noticia->usuario,
                $noticia->conteudo
            ]);
        } catch (PDOException $e) {
            throw new RepositorioNoticiaExeception($e->getMessage());
        }
    }

    public function removerNoticia($id): void
    {
        try {
            $ps = $this->pdo->prepare("delete from noticia where id = ?");

            $ps->execute([
                $id
            ]);
        } catch (PDOException $e) {
            throw new RepositorioNoticiaExeception($e->getMessage());
        }
    }

    public function alterarNoticia($noticia): void
    {
        try {
            $ps = $this->pdo->prepare("update noticia set titulo = ?, conteudo = ?, usuario = ? where id = ?");

            $ps->execute([
                $noticia->titulo,
                $noticia->conteudo,
                $noticia->usuario,
                $noticia->id
            ]);
        } catch (PDOException $e) {
            throw new RepositorioNoticiaExeception($e->getMessage());
        }
    }
}
