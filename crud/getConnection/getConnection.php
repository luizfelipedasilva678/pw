<?php
function getConnection(): PDO
{
    try {
        return new PDO(
            "mysql:host=localhost:3306;dbname=escola",
            'root',
            'senha',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
}
