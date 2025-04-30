<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            padding: 0;
            margin: 0;

            background-color: #212121;
            color: white;
            font-size: 2em;
        }
    </style>

</head>
<body>

    <?php 

        $base = 10; $altura = 4;

        echo areaTriangulo($base, $altura);

        function areaTriangulo ($base, $altura)
        {
            return ($base * $altura) / 2;
        }

    ?>
    
</body>
</html>