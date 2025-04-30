<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Notas</title>

    <style>

        body {
            margin: 0px;
            font-family: monospace;
            font-size: 1.5em;

            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;

            background-image: linear-gradient(to bottom, rgb(199, 237, 255), rgb(85, 158, 206));
        }

        p {
            margin: 0px;
            padding: 0px;
        }

        table {
            border-collapse: collapse;
            width: 300px;
            background-color: white;
        }

        th {
            background-color: lightgray;
        }

        th, td {
            border: 1px solid black;
            padding: 10px 20px;
            text-align: center;
        }

    </style>

</head>
<body>
    
    <?php
        $notaA = $_POST["notaA"] ?? null;
        $notaB = $_POST["notaB"] ?? null;
        $notaC = $_POST["notaC"] ?? null;
    
        function ExibirNota($nota)
        {
            
            if ($nota < 6) {
                
                return "<p style='color: red;'>$nota</p>";
            }
            else
            {
                return $nota;
            }
           
        }
    ?>

    <table>
        <tr>
            <th>Disciplina</th>
            <th>Nota</th>
        </tr>
        <tr>
            <td>A</td>
            <td><?php echo ExibirNota($notaA); ?></td>
        </tr>
        <tr>
            <td>B</td>
            <td><?php echo ExibirNota($notaB); ?></td>
        </tr>
        <tr>
            <td>C</td>
            <td><?php echo ExibirNota($notaC); ?></td>
        </tr>
    </table>

</body>
</html>