<?php
interface RepositorioNotica
{
    public function buscarNoticias(): array;
    public function buscarNoticiaPeloId(string $id): object;
    public function salvarNoticia(object $noticias): void;
    public function removerNoticia(string $id): void;
    public function alterarNoticia(object $noticia): void;
}
