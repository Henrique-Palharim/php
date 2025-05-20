<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php

    if($_POST) {

        $nome = trim($_POST["nome"]);
        $idade = trim($_POST["idade"]);
        $email = trim($_POST["email"]);
        $time = trim($_POST["time"]);
        $cidade = trim($_POST["cidade"]);

        if ($nome == "" || $email == "")
        {
            echo "<div class='echo'>";
            echo "Insira dados válidos,<br>";
            echo "Tente novamente.";
            echo "</div>";
        }
        else
        {
            echo "<div class='echo'>";
            echo "Nome: " . $nome . "<br>";
            echo "Idade: " . $idade . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "Time: " . $time . "<br>";
            echo "Cidade: " . $cidade;
            echo "</div>";
        }

    }

?>

</body>
</html>