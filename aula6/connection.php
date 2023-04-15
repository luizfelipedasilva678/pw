<?php
    function getConnection()
    {
        try {
            return new PDO(
                'mysql:host=127.0.0.1:3306;dbname=acme',
                'root',
                'senha',
                [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
            );
        } catch (PDOException $e) {
            die('Falha ao conectar: '. $e->getMessage());
        }
    }

