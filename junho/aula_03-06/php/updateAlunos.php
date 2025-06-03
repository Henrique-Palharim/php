<?php
    require_once 'util.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $legal = $_POST['legal'];
        $engracado = $_POST['engracado'];
        $sexo = $_POST['sexo'];
        $turma = $_POST['turma'];
        $matricula = $_POST['matricula'];

        $conn = Conectar();

        $sql = "UPDATE alunos_atv SET nome = :nome, celular = :celular, email = :email, legal = :legal, engracado = :engracado, sexo = :sexo, turma = :turma, matricula = :matricula WHERE id = :id";

        $update = $conn->prepare($sql);
        $update->bindParam(":nome", $nome);
        $update->bindParam(":celular", $celular);
        $update->bindParam(":email", $email);
        $update->bindParam(":legal", $legal);
        $update->bindParam(":engracado", $engracado);
        $update->bindParam(":sexo", $sexo);
        $update->bindParam(":turma", $turma);
        $update->bindParam(":matricula", $matricula);
        $update->bindParam(":id", $id);

        try {
            $update->execute();
            header("Location: ../index.php");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao atualizar aluno: " . $e->getMessage();
            exit;
        }
    } else {
        echo "Requisição inválida.";
}