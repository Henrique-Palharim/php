<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style-destino.css">

</head>
<body>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Sexo</th>
            </tr>
            <?php
                require_once 'util.php'; // Inclui o arquivo com a função
                $conn = Conectar(); // Conecta ao banco
                // Recebe o valor que foi enviado pelo formulário
                $filtroSexo = $_POST['sexo'];
                $varSQL = "SELECT * FROM alunos WHERE (sexo = :sexo) ORDER BY id";
                $select = $conn->prepare($varSQL);
                $select->bindParam(":sexo", $filtroSexo);
                $select->execute();

                // Verifica se a consulta retornou linhas
                if ($select->rowCount() > 0) {
                    echo "<h2>Alunos do gênero " . (( $filtroSexo == 'M' ) ? 'Masculino' : 'Feminino' ) . "</h2>";
                    // Itera sobre os resultados
                    while ($linha = $select->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "<td>" . $linha['sexo'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>Não há nenhum aluno registrado do gênero " . $filtroSexo . ".</p>";
                }
            ?>
        </table>

        <div class="bt-voltar">
            <button type="button" onclick="history.back()">Voltar</button>
        </div>

    </div>
    
</body>
</html>