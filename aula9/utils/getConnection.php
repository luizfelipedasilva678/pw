<?php
function getConnection()
{
    try {
        return new PDO(
            'mysql:host=localhost:3306;dbname=acme;charset=utf8',
            'root',
            'root',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
