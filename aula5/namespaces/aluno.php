<?php 

    namespace cefet {
        class Aluno {
            private $nome = 'Teste';
            
            public function getNome() {
                $this->nome;
            }
        }
    }

    namespace cefet\bsi {
        use Exception;

        class Aluno {
            public $nome = 'Teste';
            
            public function lancarException() {
                throw new Exception();
            }
        }
    }

    namespace gestao {
        class Turma {
            public $name = 'Turma A';
        }
    }


    namespace cefet\direcao {
        class Diretor {
            public $email = 'aaaa@gmail.com';
        }
    }