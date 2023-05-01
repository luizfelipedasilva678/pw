<?php 

    function getConnection() {
        try {
            return new PDO(
                'mysql:host=localhost:3308;dbname=aula07',
                'root',
                '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch(PDOException $e) {
            die('ERROR ' . $e->getMessage());
        }
    }