<?php 

    namespace vac;

    class Vacina
    {
        private $id;
        private $nome;
        private $fabricante;
        private $doses;
        private $eficacia;
        private $eficaciaDelta;
        private $perdaMensal;

        public function __construct(
            $id,
            $nome,
            $fabricante,
            $doses,
            $eficacia,
            $eficaciaDelta,
            $perdaMensal
        ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->fabricante = $fabricante;
            $this->doses = $doses;
            $this->eficacia = $eficacia;
            $this->eficaciaDelta = $eficaciaDelta;
            $this->perdaMensal = $perdaMensal;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function setFabricante($fabricante)
        {
            $this->fabricante = $fabricante;
        }

        public function setDoses($doses)
        {
            $this->doses = $doses;
        }

        public function setEficacia($eficacia)
        {
            $this->eficacia = $eficacia;
        }

        public function setEficaciaDelta($eficaciaDelta)
        {
            $this->eficaciaDelta = $eficaciaDelta;
        }

        public function setPerdaMensal($perdaMensal)
        {
            $this->perdaMensal = $perdaMensal;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getFabricante()
        {
            return $this->fabricante;
        }

        public function getDoses()
        {
            return $this->doses;
        }

        public function getEficacia()
        {
            return $this->eficacia;
        }

        public function getEficaciaDelta()
        {
            return $this->eficaciaDelta;
        }

        public function getPerdaMensal()
        {
            return $this->perdaMensal;
        }

        public function eficaciaAposMeses($numMeses, $considerarDelta = false)
        {
            $numMesesValidado = $numMeses < 0 ? 0 : $numMeses;

            if ($considerarDelta) {
                return  abs($this->eficaciaDelta - ($numMesesValidado * $this->perdaMensal));
            }

            return  abs($this->eficacia - ($numMesesValidado * $this->perdaMensal));
        }
    }