<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>

    <style>

        body {
            padding: 0;
            margin: 0;

            background-color: #212121;
            font-family: monospace;
            font-size: 1.5em;

            display: flex;
            justify-content: center;
            align-items: center;

            height: 100vh;
        }

        div {
            width: auto;
            height: auto;
            background-color: white;
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0px 3px 15px 2px rgba(255, 255, 255, 0.3);
            /* deslocamento : horizontal - vertical - espalhamento - tamanho_total */
        }

        h2 {
            letter-spacing: 1px;
        }

        table {
           
            margin: auto;
            margin-top: 50px;
            border-collapse: collapse;
        }

        th {
            background-color:rgb(171, 163, 230);
        }

        th, td {
            border: 1px solid black;
            padding: 10px 15px;

            vertical-align: center;
            text-align: center;
        }

        /* ----- Botão Voltar ----- */

        .bt-voltar {
            display: flex;
            justify-content: center;
            margin: 0;
            
            padding: 0;
            padding-top: 50px;
        }

        button[type="button"] {
            margin-top: 0;

            color: white;
            font-weight: bold;
            font-size: 0.7em;
            background-image: linear-gradient(to bottom, #6c5ee6, #8c82e5, #a69ee9);

            width: 150px;
            padding: 7px 0;
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.493);

            transition: 0.2s ease;
        }

        button[type="button"]:hover {
            cursor: pointer;
            transform: scale(1.05);
        }

    </style>
    

</head>
<body>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Valor (R$)</th>
            </tr>
            <?php
                require_once 'util.php'; // Inclui o arquivo com a função
                $conn = Conectar(); // Conecta ao banco
                // Recebe o valor que foi enviado pelo formulário
                $filtroValor = $_POST['valor'];
                $varSQL = "SELECT * FROM cursos WHERE (valor > :valor) ORDER BY id";
                $select = $conn->prepare($varSQL);
                $select->bindParam(":valor", $filtroValor);
                $select->execute();
        
                // Verifica se a consulta retornou linhas
                if ($select->rowCount() > 0) {
                    echo "<h2>Cursos com valor maior que " . $filtroValor . "</h2>";
                    // Itera sobre os resultados
                    while ($linha = $select->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['titulo'] . "</td>";
                        echo "<td>" . $linha['descricao'] . "</td>";
                        echo "<td style='text-align: right;'>" . number_format($linha['valor'], 2) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>Nenhum curso encontrado com valor maior que R$ " . $filtroValor . ".</p>";
                }
            ?>
        </table>

        <div class="bt-voltar">
            <button type="button" onclick="history.back()">Voltar</button>
        </div>

    </div>
    
</body>
</html>