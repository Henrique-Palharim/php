<?php

    require 'conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $data_colheita = $_POST['data_colheita'];

    $foto = $_FILES['foto'];
    $nomeFoto = null;

    if ($foto['error'] == 0) {
        $pasta = '../fotos/';
        $nomeFoto = uniqid() . '_' . $foto['name'];
        move_uploaded_file($foto['tmp_name'], $pasta . $nomeFoto);

        // Atualizar com nova foto
        $sql = "UPDATE produtos SET nome = ?, preco = ?, data_colheita = ?, foto = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $preco, $data_colheita, $nomeFoto, $id]);
    } else {
        // Atualizar sem alterar a foto
        $sql = "UPDATE produtos SET nome = ?, preco = ?, data_colheita = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $preco, $data_colheita, $id]);
    }

    header('Location: ../index.php');
    
?>