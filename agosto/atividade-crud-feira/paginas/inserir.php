<?php

    require 'conexao.php';

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $data_colheita = $_POST['data_colheita'];

    $foto = $_FILES['foto'];
    $nomeFoto = null;

    if ($foto['error'] == 0) {
        $pasta = '../fotos/';
        $nomeFoto = uniqid() . '_' . $foto['name'];
        move_uploaded_file($foto['tmp_name'], $pasta . $nomeFoto);
    }

    $sql = "INSERT INTO produtos (nome, preco, data_colheita, foto) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $preco, $data_colheita, $nomeFoto]);

    header('Location: ../index.php');
    
?>