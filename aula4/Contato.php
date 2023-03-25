<?php
    class Contato {
        private $name = '';
        private $telefone = '';

        public function __construct($name = '', $telefone = '') 
        {
            $this->setTelefone($telefone);
            $this->setName($name);
            //echo "Criado " . $this->formatar() . PHP_EOL;
        }

        

        public function __destruct()
        {
            //echo "Destruindo " . $this->formatar() . PHP_EOL;
        }

        function getName(): string {
            return $this->name;
        }

        function getTelefone(): string {
            return $this->telefone;
        }

        function setTelefone(string $telefone): void {
            $length = mb_strlen($telefone);

            if(($length >= 8 && $length <= 10) && is_numeric($telefone)) {
                $this->telefone = $telefone;
            }

        }

        function setName(string $name): void {
            $length = mb_strlen($name);

            if($length >= 2 && $length <= 100) {
                $this->name = $name;
            }
        }

        function formatar() {
            return 'Contato ' . $this->getName() . ' - ' . $this->getTelefone();
        }
    }

    class ContatoProfissional extends Contato {
        private $email = '';

        public function __construct($nome, $telefone, $email)
        {
            parent::__construct($nome, $telefone);
            $this->setEmail($email);
        }

        public function setEmail(string $email): void {
            $length = mb_strlen($email);
            $idxArroba = mb_strpos($email, '@');
            
            if($idxArroba && ($idxArroba > 0 && $idxArroba < $length)) {
                $this->email = $email;
            }
        }

        public function getEmail(): string {
            return $this->email;
        }

        public function formatar() {
            return parent::formatar() . ' - ' . $this->getEmail();
        }
    }


    $c1 = new Contato("Pedro", "12345678");
    $c2 = new Contato("Paulo", "12345678");
    $c3 = new ContatoProfissional("Pedro", "12345678", "asdasd@gmail.com");
    
    echo $c3->formatar() . PHP_EOL;
?>