<?php
    require_once('aluno.php');

    use cefet\direcao\Diretor;

    $aluno = new cefet\bsi\Aluno();
    $diretor = new Diretor();


    echo $diretor->email . PHP_EOL;
    echo $aluno->nome . PHP_EOL;