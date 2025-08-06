<?php

    require 'conexao.php';

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $data_colheita = $_POST['data_colheita'];

    $foto = $_FILES['foto'];
    $nomeFoto = null;
    $pasta = '../fotos/';

    if ($foto['error'] == 0) {
        // cria a pasta se não existir
        if (!is_dir($pasta)) {
            mkdir($pasta, 0755, true);
        }

        // define o nome do arquivo
        $nomeFoto = uniqid() . '_' . basename($foto['name']);

        // tenta mover o arquivo
        if (!move_uploaded_file($foto['tmp_name'], $pasta . $nomeFoto)) {
            die("Erro ao mover arquivo para $pasta$nomeFoto");
        }
    }

    $sql = "INSERT INTO produtos (nome, preco, data_colheita, foto) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $preco, $data_colheita, $nomeFoto]);

    header('Location: ../index.php');

?>