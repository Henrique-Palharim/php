<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feira Livre</title>
    <link rel="stylesheet" href="../estilos/style.css">
</head>
<body>
    
    <div class="container">
        <form action="inserir.php" method="POST" enctype="multipart/form-data">
            Nome: <input type="text" name="nome"><br>
            Preço: <input type="text" name="preco"><br>
            Data da colheita: <input type="date" name="data_colheita"><br>
            Foto: <input type="file" name="foto"><br>
            <input type="submit" value="Salvar">
            <button type="button" onclick="history.back()">Voltar</button>
        </form>
    </div>

</body>
</html>