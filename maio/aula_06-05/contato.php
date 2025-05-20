<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela com BDD</title>

    <style>

        body {
            background-color: gray;
            font-family: monospace;
            font-size: 1.5em;

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        table {
            border-collapse: collapse;
        }

        th {
            background-color: lightsalmon;
        }

        td {
            background-color: white;
        }

        th, td {
            border: 1px solid black;
            padding: 10px 30px;

            text-align: center;
            vertical-align: center;
        }

    </style>

</head>
<body>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th>Legal</th>
            <th>Engraçado</th>
        </tr>
        
        <?php

        // Configura a string de conexão com o banco de dados PostgreSQL
        $string_conexao = "pgsql:host=localhost; port=5432; dbname=cursos; user=postgres; password=postgres";

        try {
            
            $conn = new PDO($string_conexao); // Cria uma nova conexão PDO
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            $varSQL = "SELECT id, nome, celular, email, legal, engracado FROM alunos ORDER BY nome"; // Prepara a consulta SQL
            $select = $conn->query($varSQL); // Executa a consulta

            // Verifica se a consulta retornou linhas
            if ($select->rowCount() > 0) {
                // Itera sobre os resultados
                while ($linha = $select->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $linha['id'] . "</td>";
                    echo "<td>" . $linha['nome'] . "</td>";
                    echo "<td>" . $linha['celular'] . "</td>";
                    echo "<td>" . $linha['email'] . "</td>";
                    echo "<td>" . ($linha['legal'] ? 'Sim':'Não') . "</td>";
                    echo "<td>" . ($linha['engracado'] ? 'Sim':'Não') . "</td>";
                    echo "</tr>";
                }
            }
            else
            {
                echo "Nenhum curso encontrado.";
            }

        } catch (PDOException $e) {
            // Em caso de erro na conexão ou na execução da query
            echo "<tr><td colspan='6'>Erro na conexão ou consulta: " . $e->getMessage() . "</td></tr>";
            exit;
        }

    ?>

    </table>


</body>
</html>