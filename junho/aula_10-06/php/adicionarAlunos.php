<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="../estilos/style-formulario.css">
</head>
<body>

    <main>

        <h2>Formulário</h2>

        <!-- Formulário com action vazio para enviar para essa mesma página -->
        <form action="" method="post">

            <div>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div>
                <label for="celular">Celular: </label>
                <input type="tel" name="celular" id="celular" placeholder="(XX) XXXXX-XXXX" required>
            </div>

            <div>
                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" placeholder="exemplo@dominio.com" required>
            </div>

            <div>
                <label for="legal">Legal: </label>
                <label><input type="radio" name="legal" value="true" required>Sim</label>
                <label><input type="radio" name="legal" value="false" required>Não</label>
            </div>

            <div>
                <label for="engracado">Engraçado: </label>
                <label><input type="radio" name="engracado" value="true" required>Sim</label>
                <label><input type="radio" name="engracado" value="false" required>Não</label>
            </div>

            <div>
                <label for="sexo">Sexo: </label>
                <label><input type="radio" name="sexo" value="M" required>Masculino</label>
                <label><input type="radio" name="sexo" value="F" required>Feminino</label>
            </div>

            <div>
                <label for="turma">Turma: </label>
                <select name="turma" id="turma" required>
                    <option value="">Selecione</option>
                    <option value="INF-1A">INF-1A</option>
                    <option value="INF-2B">INF-2B</option>
                    <option value="INF-Noturno">INF-Noturno</option>
                </select>
            </div>

            <div>
                <label for="matricula">Matrícula: </label>
                <input type="number" name="matricula" id="matricula" required>
            </div>

            <div class="bt-enviar">
                <a href="../index.php">
                    <button type="submit">Adicionar Aluno</button>
                </a>
            </div>

        </form>

        <?php
            require_once 'util.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recebe dados do formulário
                $nome = $_POST['nome'];
                $celular = $_POST['celular'];
                $email = $_POST['email'];
                $legal = $_POST['legal'];
                $engracado = $_POST['engracado'];
                $sexo = $_POST['sexo'];
                $turma = $_POST['turma'];
                $matricula = $_POST['matricula'];

                // Conecta ao banco
                $conn = Conectar();

                $varSQL = "INSERT INTO alunos_atv (nome, celular, email, legal, engracado, sexo, turma, matricula) VALUES (:nome, :celular, :email, :legal, :engracado, :sexo, :turma, :matricula)";
                $insert = $conn->prepare($varSQL);

                // Vincula parâmetros
                $insert->bindParam(":nome", $nome);
                $insert->bindParam(":celular", $celular);
                $insert->bindParam(":email", $email);
                $insert->bindParam(":legal", $legal);
                $insert->bindParam(":engracado", $engracado);
                $insert->bindParam(":sexo", $sexo);
                $insert->bindParam(":turma", $turma);
                $insert->bindParam(":matricula", $matricula);

                    // tenta inserir e redirecionar para a página principal em caso de sucesso
                try {
                    $insert->execute();
                    header("Location: ../index.php");
                    exit;
                } catch (PDOException $e) {
                    echo "<p style='color:red;'>Erro ao inserir aluno: " . $e->getMessage() . "</p>";
                }
            }
        ?>

    </main>

</body>
</html>