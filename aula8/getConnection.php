<?php
function getConnection()
{
    try {
        return new PDO(
            "mysql:host=localhost:3308;dbname=acme;charset=utf8",
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
