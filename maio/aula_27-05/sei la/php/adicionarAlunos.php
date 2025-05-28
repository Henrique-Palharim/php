<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/style-insert.css">
</head>
<body>

    <main>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Legal</th>
                <th>Engraçado</th>
                <th>Sexo</th>
            </tr>

            <?php 

                require_once 'util.php';

                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    // receber os dados enviados pelo formulário
                    $nome = $_POST['nome'];
                    $celular = $_POST['celular'];
                    $email = $_POST['email'];
                    $legal = ($_POST['legal'] === 'Sim') ? true : false;
                    $engracado = ($_POST['engracado'] === 'Sim') ? true : false;
                    $sexo = $_POST['sexo'];

                    $conn = Conectar();

                    $varSQL = "INSERT INTO alunos_cred (nome, celular, email, legal, engracado, sexo) VALUES (:nome, :celular, :email, :legal, :engracado, :sexo)";

                    $insert = $conn->prepare($varSQL);

                    $insert->bindParam(":nome", $nome);
                    $insert->bindParam(":celular", $celular);
                    $insert->bindParam(":email", $email);
                    $insert->bindParam(":legal", $legal);
                    $insert->bindParam(":engracado", $engracado);
                    $insert->bindParam(":sexo", $sexo);

                    try {
                        $insert->execute();
                        echo "<p>Aluno inserido com sucesso!</p>";
                    } catch (PDOException $e) {
                        echo "<p>Erro ao inserir aluno: " . $e->getMessage() . "</p>";
                    }
                    var_dump($_POST);

                    // header("Location: " . $_SERVER['PHP_SELF']);
                    // exit;
                }

                // exibe os dados da tabela
                $conn = Conectar();
                $varSQL = "SELECT * FROM alunos_cred ORDER BY id";
                $select = $conn->prepare($varSQL);
                $select->execute();

                if ($select->rowCount() > 0) {
                    echo "<h2>Alunos Registrados</h2>";
                    while ($linha = $select->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['celular'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "<td>" . $linha['legal'] . "</td>";
                        echo "<td>" . $linha['engracado'] . "</td>";
                        echo "<td>" . $linha['sexo'] . "</td>";

                        echo "<td>";
                        echo "<a href='alterarAlunos.php?id=" . $linha['id'] . "'>Alterar</a> | ";
                        echo "<a href='excluirAlunos.php?id=" . $linha['id'] . "'>Excluir</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Não há alunos cadastrados.</td></tr>";
                }

            ?>
        </table>

    </main>
    
</body>
</html>