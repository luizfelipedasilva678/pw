<?php

    interface RepositorioProduto
    {
        function salvar(array $produtos);
        function carregar(): array;
    }
    