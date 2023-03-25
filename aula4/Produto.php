<?php
    class Produto
    {
        private $estoque;
        private $descricao;
        private $preco;

        public function __construct($descricao, $estoque, $preco)
        {
            $this->setEstoque($estoque);
            $this->setDescricao($descricao);
            $this->setPreco($preco);
        }

        private function invalidProductMessage(string $motive): void
        {
            echo "O produto está inválido porque " . $motive . PHP_EOL;
        }

        public function getEstoque()
        {
            return $this->estoque;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

        public function getPreco()
        {
            return $this->preco;
        }

        public function setEstoque(int $valor)
        {
            if ($valor >= 0) {
                $this->estoque = $valor;
            } else {
                $this->invalidProductMessage(" o estoque está inválido");
            }
        }

        public function setDescricao(string $valor): void
        {
            $length = mb_strlen($valor);

            if ($length >= 2 && $length <= 100) {
                $this->descricao = $valor;
            } else {
                $this->invalidProductMessage(" a descrição está inválida");
            }
        }

        public function setPreco(float $valor): void
        {
            if ($valor >= 10.00) {
                $this->preco = $valor;
            } else {
                $this->invalidProductMessage(" o preço está inválido");
            }
        }
    }
