<?php

namespace vac;

interface RepositorioVacina
{
    public function vacinas(): array;
    public function vacinaComId(int $id): object | null;
    public function atualizarVacina(object $vacina): void;
}
