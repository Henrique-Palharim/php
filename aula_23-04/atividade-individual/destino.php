 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>

    <style>

        body {
            padding: 0;

            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;

            background-color: #212121;
            color: white;
            font-family: monospace;
            font-size: 2em;
        }

    </style>

 </head>
 <body>
    
    <?php 

        include "util.php";

        $peso = $_POST["peso"] ?? null;
        $altura = $_POST["altura"] ?? null;

        echo "IMC: " . number_format(calcularIMC($peso, $altura), 1) . "<br>";
        echo "CLASSIFICAÇÃO: " . classificarIMC($peso, $altura);

    ?>

 </body>
 </html>