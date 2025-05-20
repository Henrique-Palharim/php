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

        require_once 'util.php'; // Inclui o arquivo com a função
        $conn = Conectar(); // Conecta ao banco

        $varSQL = "SELECT id, nome, celular, email, legal, engracado FROM alunos ORDER BY nome";
        $select = $conn->query($varSQL);

        if ($select->rowCount() > 0) {
            while ($linha = $select->fetch()) {
                echo "<tr>";
                echo "<td>" . $linha['id'] . "</td>";
                echo "<td>" . $linha['nome'] . "</td>";
                echo "<td>" . $linha['celular'] . "</td>";
                echo "<td>" . $linha['email'] . "</td>";
                echo "<td>" . ($linha['legal'] ? 'Sim' : 'Não') . "</td>";
                echo "<td>" . ($linha['engracado'] ? 'Sim' : 'Não') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum curso encontrado.</td></tr>";
        }

        ?>

    </table>

</body>
</html>