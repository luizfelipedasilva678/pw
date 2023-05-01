<?php 

    require_once('repositorioConta.php');
    require_once('repositorioContaEmBdr.php');
    require_once('repositorioException.php');
    require_once('getConnection.php');
    require_once('conta.php');
    require_once('contaException.php');

    class RepositorioContaEmBdr implements RepositorioConta {
        private $pdo = null;

        function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        function cadastrar(Conta $conta)
        {
            try {
                $ps = $this->pdo->prepare(
                    'insert into conta(saldo, cpf, dono, senha) values (?, ?, ?, ?)'
                );

                $ps->execute([
                    $conta->saldo,
                    $conta->cpf,
                    $conta->dono,
                    meuHash($conta->senha)
                ]);
            } catch(PDOException $e) {
                throw new RepositorioException('Ocorreu um erro ao cadastrar conta');
            } 
        }

        function listar(): array {
            try {
                $ps = $this->pdo->query(
                    'select saldo, cpf, dono from conta'
                );
                $contas = $ps->fetchAll(PDO::FETCH_ASSOC);    
                $contasObjs = [];

                foreach($contas as $conta) {
                    array_push($contasObjs, new Conta($conta["dono"], $conta["cpf"], "", $conta["saldo"]));
                }

                return $contasObjs;
            } catch(PDOException $e) {
                throw new RepositorioException('Ocorreu um erro ao listar as conta');
            } 
        }

        function checarConta($cpf, $senha) {
            $ps = $this->pdo->prepare('select cpf, saldo from conta where cpf = ? and senha = ?', [PDO::FETCH_ASSOC]);
                $ps->execute([
                    $cpf,
                    meuHash($senha)
                ]);
            $result = $ps->rowCount();
            $user = $ps->fetchObject(); 

            if($result == 0) {
                throw new RepositorioException('Usuário ou senha incorretos');
            }

            return $user;
        }

        function deposito($cpf, $senha, $valor): void
        {
            try {
                $user = $this->checarConta($cpf, $senha);
                $depositoPs = $this->pdo->prepare("update conta set saldo = ? where
                    cpf = ?"
                );

                $depositoPs->execute([
                    $valor + $user->saldo,
                    $cpf
                ]);
            } catch(RepositorioException $e) {
                throw new RepositorioException($e->getMessage());
            }
        }

        function transferir(string $cpf1, string $senha1, string $cpf2, string $senha2, float $montante): void {
            try {
                $this->pdo->beginTransaction();
                $p1 = $this->checarConta($cpf1, $senha1);
                $p2 = $this->checarConta($cpf2, $senha2);

                if($p1->saldo < $montante) {
                    throw new RepositorioException('Você não tem saldo suficiente para fazer essa transferência');
                }

                $transferP1Ps = $this->pdo->prepare('update conta set saldo = ? where cpf = ?');
                $transferP1Ps->execute([
                    $p1->saldo - $montante,
                    $cpf1
                ]);

                $transferP2Ps = $this->pdo->prepare('update conta set saldo = ? where cpf = ?');
                $transferP2Ps->execute([
                    $p2->saldo + $montante,
                    $cpf2
                ]);

                $this->pdo->commit();
            } catch(RepositorioException $e) {
                $this->pdo->rollBack();
                throw new ContaException($e->getMessage());
            }
        }
    }

    function meuHash($conteudo) {
        $conteudoComSal = '32432fdsflswa' . $conteudo . '2334***asdasd';

        return hash('sha256', $conteudoComSal);
    }