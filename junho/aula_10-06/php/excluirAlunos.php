<?php
    require_once 'util.php';
    $conn = Conectar();

    $id = (int) $_GET['id']; // força a conversão para inteiro

    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM alunos_atv WHERE id = ?");
        $stmt->execute([$id]);
    }

    header("Location: ../index.php");
    exit;
?>