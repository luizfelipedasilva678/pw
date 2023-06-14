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

    public function buscarNoticias(): array
    {
        try {
            $ps = $this->pdo->query("SELECT * FROM noticia");
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
