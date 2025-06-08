<?php
    require_once 'util.php';

    $conn = Conectar();

    $id = $_GET['id'];

    $sql = "SELECT * FROM alunos_atv WHERE id = :id";
    $buscaAluno = $conn->prepare($sql);
    $buscaAluno->bindParam(":id", $id);
    $buscaAluno->execute();

    $aluno = $buscaAluno->fetch();

    if (!$aluno) {
        echo "Aluno não encontrado.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Aluno</title>
    <link rel="stylesheet" href="../estilos/style-formulario.css">
</head>
<body>

<main>
    
    <h2>Alterar Aluno</h2>

    <!-- Agora envia para updateAlunos.php -->
    <form action="updateAlunos.php" method="post">

        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?= $aluno['nome'] ?>" required>
        </div>

        <div>
            <label>Celular:</label>
            <input type="tel" name="celular" value="<?= $aluno['celular'] ?>" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $aluno['email'] ?>" required>
        </div>

        <div>
            <label>Legal:</label>
            <label><input type="radio" name="legal" value="true" <?= $aluno['legal'] == '1' ? 'checked' : '' ?>>Sim</label>
            <label><input type="radio" name="legal" value="false" <?= $aluno['legal'] == '0' ? 'checked' : '' ?>>Não</label>
        </div>

        <div>
            <label>Engraçado:</label>
            <label><input type="radio" name="engracado" value="true" <?= $aluno['engracado'] == '1' ? 'checked' : '' ?>>Sim</label>
            <label><input type="radio" name="engracado" value="false" <?= $aluno['engracado'] == '0' ? 'checked' : '' ?>>Não</label>
        </div>

        <div>
            <label>Sexo:</label>
            <label><input type="radio" name="sexo" value="M" <?= $aluno['sexo'] == 'M' ? 'checked' : '' ?>>Masculino</label>
            <label><input type="radio" name="sexo" value="F" <?= $aluno['sexo'] == 'F' ? 'checked' : '' ?>>Feminino</label>
        </div>

        <div>
            <label>Turma:</label>
            <select name="turma" required>
                <option value="INF-1A" <?= $aluno['turma'] == 'INF-1A' ? 'selected' : '' ?>>INF-1A</option>
                <option value="INF-2B" <?= $aluno['turma'] == 'INF-2B' ? 'selected' : '' ?>>INF-2B</option>
                <option value="INF-Noturno" <?= $aluno['turma'] == 'INF-Noturno' ? 'selected' : '' ?>>INF-Noturno</option>
            </select>
        </div>

        <div>
            <label>Matrícula:</label>
            <input type="number" name="matricula" value="<?= $aluno['matricula'] ?>" required>
        </div>

        <div class="bt-enviar">
            <button type="submit">Salvar Alterações</button>
        </div>
    </form>

</main>

</body>
</html>