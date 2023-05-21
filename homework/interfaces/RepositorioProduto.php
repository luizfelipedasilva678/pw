<?php

namespace Homework;

interface RepositorioProduto
{
    public function buscarProdutos($order): array;
    public function salvarProduto(object $produto): void;
    public function atualizarProduto(object $produto): void;
    public function removerProduto(int $id): void;
    public function buscarValoresMaximosMinimosEMedia(): object;
    public function buscarProdutoPeloId(int $id): object;
}
