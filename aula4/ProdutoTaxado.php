<?php
    require('Produto.php');

    class ProdutoTaxado extends Produto
    {
        private $percentualImposto;

        public function __construct($descricao, $estoque, $preco, $percentualImposto)
        {
            parent::__construct($descricao, $estoque, $preco);
            $this->setPercentualImposto($percentualImposto);
        }

        public function getPercentualImposto()
        {
            return $this->percentualImposto;
        }

        public function setPercentualImposto($percentualImposto)
        {
            if ($percentualImposto >= 0 && $percentualImposto <= 50) {
                $this->percentualImposto = $percentualImposto;
            } else {
                $this->invalidProductMessage(" o percentual imposto está inválido");
            }
        }
    }