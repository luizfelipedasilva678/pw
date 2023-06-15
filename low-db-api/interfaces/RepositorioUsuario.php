<?php

interface RepositorioUsuario
{
    public function buscarUsuarios(): array;
    public function removerUsuario(string $id): void;
    public function atualizarUsuario(object $usuario): void;
    public function criarUsuario(object $usuario): void;
}
