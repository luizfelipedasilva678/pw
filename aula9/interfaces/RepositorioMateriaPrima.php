<?php
interface RepositorioMateriaPrima
{
    public function buscarMateriasPrimas(): array;
    public function buscarMediaCusto(): float;
    public function atualizarMateriaPrima(object $materiaPrima): void;
    public function cadastrarMateriaPrima(object $materiaPrima): void;
    public function removerMateriaPrima(int $id): void;
    public function buscarMateriasPrimaPeloId(int $id): object;
}
