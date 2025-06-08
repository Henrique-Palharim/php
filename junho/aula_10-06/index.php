<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <link rel="stylesheet" href="estilos/style-tabela.css">
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
                <th>Turma</th>
                <th>Matrícula</th>
                <th>Funcionalidades</th>
            </tr>
        
            <?php
                require_once 'php/util.php';
                
                $conn = Conectar();
                $varSQL = "SELECT * FROM alunos_atv ORDER BY id";
                $select = $conn->prepare($varSQL);
                $select->execute();

                // verifica se a consulta retornou algum resultado
                if ($select->rowCount() > 0) {
                    echo "<h2>Alunos Registrados</h2>";
                    while ($linha = $select->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['nome'] . "</td>";
                        echo "<td>" . $linha['celular'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "<td>" . ($linha['legal'] == 'true' ? 'Sim' : 'Não') . "</td>";
                        echo "<td>" . ($linha['engracado'] == 'true' ? 'Sim' : 'Não') . "</td>";
                        echo "<td>" . $linha['sexo'] . "</td>";
                        echo "<td>" . $linha['turma'] . "</td>";
                        echo "<td>" . $linha['matricula'] . "</td>";

                        echo "<td>";
                        echo "<a class='propr-alterar' href='php/alterarAlunos.php?id=" . $linha['id'] . "'>Alterar</a> | ";
                        echo "<a class='propr-excluir' href='php/excluirAlunos.php?id=" . $linha['id'] . "'>Excluir</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                }
                else {
                    echo "<tr><td colspan='7'>Não há alunos cadastrados.</td></tr>";
                }
                        
            ?>
        </table>

        <div class="bt-enviar">
            <a href="php/adicionarAlunos.php">
                <button type="submit">Adicionar</button>
            </a>
        </div>

    </main>  

</body>
</html>