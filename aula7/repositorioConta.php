<?php
    require_once('conta.php');

    interface RepositorioConta {
        /**
         * Adiciona uma conta
         * @throws RepositorioException
         */
        function cadastrar(Conta $conta);
        function listar(): array;
        function deposito(string $cpf, string $senha, float $valor): void;
        function transferir(string $cpf1, string $senha1, string $cpf2, string $senha2, float $montante): void;
    }