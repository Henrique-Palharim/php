<?php

    require_once 'util.php';
    $conn = Conectar();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        // Busca simples do aluno
        $resultado = $conn->query("SELECT * FROM alunos_atv WHERE id = $id");
        $aluno = $resultado->fetch();

        if (!$aluno) {
            echo "<p>Aluno não encontrado.</p>";
            exit;
        }

        // Exibe a confirmação
        echo "
        <h2>Deseja realmente excluir o aluno: <strong>{$aluno['nome']}</strong>?</h2>
        <form method='post'>
            <input type='hidden' name='id' value='$id'>
            <button type='submit' name='excluir'>Sim, excluir</button>
            <a href='../index.php'><button type='button'>Cancelar</button></a>
        </form>
        ";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        $conn->query("DELETE FROM alunos_atv WHERE id = $id");

        header("Location: ../index.php");
        exit;
    }

?>