<?php

    class Conta {
        public $id = 0;
        public $dono = '';
        public $cpf = '';
        public $senha = '';
        public $saldo = 0.0;

        function __construct($dono, $cpf, $senha, $saldo)
        {
            $this->saldo = $saldo;
            $this->dono = $dono;
            $this->cpf = $cpf;
            $this->senha = $senha;
        }
    }