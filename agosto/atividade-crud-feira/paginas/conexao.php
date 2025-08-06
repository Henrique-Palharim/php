<?php

    $host = 'localhost';
    $dbname = 'feira';
    $user = 'postgres';
    $senha = 'postgres';

    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }

?>