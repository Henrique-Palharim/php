<?php

    require 'conexao.php';

    $id = $_GET['id'];

    // Buscar a foto
    $stmt = $pdo->prepare("SELECT foto FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $foto = $stmt->fetchColumn();

    // Deletar a foto se existir
    if ($foto && file_exists("../fotos/$foto")) {
        unlink("../fotos/$foto");
    }

    // Deletar do banco
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: ../index.php');
    
?>