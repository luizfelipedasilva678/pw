<?php

namespace escola;

interface AlunoRepositorio
{
    public function listar(): array;
    public function pegarPeloId($id): object | null;
    public function deletar($id): bool;
    public function atualizar($aluno): bool;
    public function criar($aluno): bool;
}
