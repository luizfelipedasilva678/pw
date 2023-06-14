<?php
function pdo($connectionStr, $user, $password)
{
    return new PDO($connectionStr, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
