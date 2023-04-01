<?php
    namespace Acme {

        use Exception;

        class Produto
        {
            private $codigo;
            private $descricao;
            private $estoque;
            private $preco;

            public function __construct($codigo, $descricao, $preco, $estoque = 0)
            {
                $this->setCodigo($codigo);
                $this->setDescricao($descricao);
                $this->setEstoque($estoque);
                $this->setPreco($preco);
            }

            public function setCodigo($codigo)
            {
                $this->codigo = $codigo;
            }

            public function setDescricao($descricao)
            {
                $this->descricao = $descricao;
            }

            public function setEstoque($estoque)
            {
                if ($estoque < 0) {
                    throw new Exception("O estoque deve ser maior que 0");
                }

                $this->estoque = $estoque;
            }

            public function aumentarEstoque($qtd)
            {
                if ($qtd< 0) {
                    throw new Exception("O quantidade a ser aumentada deve ser maior que 0");
                }

                $this->setEstoque($this->getEstoque() + $qtd);
            }

            public function reduzirEstoque($qtd)
            {
                if ($qtd< 0) {
                    throw new Exception("O quantidade a ser reduzida deve ser maior que 0");
                }

                $this->setEstoque($this->getEstoque() - $qtd);
            }

            public function setPreco($preco)
            {
                $this->preco = $preco;
            }

            public function getCodigo()
            {
                return $this->codigo;
            }

            public function getDescricao()
            {
                return $this->descricao;
            }

            public function getPreco()
            {
                return $this->preco;
            }

            public function getEstoque()
            {
                return $this->estoque;
            }
        }
    }

