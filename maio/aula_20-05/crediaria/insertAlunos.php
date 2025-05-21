<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/style-insert.css">
</head>
<body>
    
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Matrícula</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Turma</th>
                <th>Funcionalidades</th>
            </tr>
        
            <?php
                require_once 'util.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // receber os dados enviados pelo formulário
                    $nome = $_POST['nome'];
                    $sexo = $_POST['sexo'];
                    $matricula = $_POST['matricula'];
                    $celular = $_POST['celular'];
                    $email = $_POST['email'];
                    $turma = $_POST['turma'];

                    // cria a conexão com o banco de dados
                    $conn = Conectar();

                    // prepara o comando para inserir os dados na tabela 'estudantes'
                    $varSQL = "INSERT INTO estudantes (nome, sexo, matricula, celular, email, turma) 
                               VALUES (:nome, :sexo, :matricula, :celular, :email, :turma)";
                    $insert = $conn->prepare($varSQL);

                    // vincula os parâmetros recebidos
                    $insert->bindParam(":nome", $nome);
                    $insert->bindParam(":sexo", $sexo);
                    $insert->bindParam(":matricula", $matricula);
                    $insert->bindParam(":celular", $celular);
                    $insert->bindParam(":email", $email);
                    $insert->bindParam(":turma", $turma);

                    // inserindo os dados no banco
                    try {
                        $insert->execute();
                        echo "<p>Aluno inserido com sucesso!</p>";
                    } catch (PDOException $e) {
                        echo "<p>Erro ao inserir aluno: " . $e->getMessage() . "</p>";
                    }

                    // redireciona para a mesma página usando o método GET
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }

                // exibe os dados da tabela
                $conn = Conectar();
                $varSQL = "SELECT * FROM estudantes ORDER BY id";
                $select = $conn->prepare($varSQL);
                $select->execute();

                // verifica se a consulta retornou algum resultado
                if ($select->rowCount() > 0) {
                    echo "<h2>Estudantes Registrados</h2>";
                    // itera sobre os resultados
                    while ($linha = $select->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['sexo'] . "</td>";
                        echo "<td>" . $linha['matricula'] . "</td>";
                        echo "<td>" . $linha['celular'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "<td>" . $linha['turma'] . "</td>";

                        echo "<td>";
                        echo "<a href='editar.php?id=" . $linha['id'] . "'>Alterar</a> | ";
                        echo "<a href='excluir.php?id=" . $linha['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir?');\">Excluir</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Não há alunos cadastrados.</td></tr>";
                }
            ?>
        </table>
    </div>  

</body>
</html>