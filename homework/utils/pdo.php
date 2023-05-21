<?php

function pdo($connectionStr, $user, $password)
{
    try {
        return new PDO($connectionStr, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
