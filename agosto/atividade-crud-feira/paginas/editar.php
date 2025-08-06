<?php
    require 'conexao.php';
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $p = $stmt->fetch();
?>

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
        <form action="atualizar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            Nome: <input type="text" name="nome" value="<?= $p['nome'] ?>"><br>
            Preço: <input type="text" name="preco" value="<?= $p['preco'] ?>"><br>
            Data da colheita: <input type="date" name="data_colheita" value="<?= $p['data_colheita'] ?>"><br>
            Foto atual:
            <?php if ($p['foto']): ?>
                <img src="../fotos/<?= $p['foto'] ?>" width="100"><br>
            <?php endif; ?>
            Nova Foto: <input type="file" name="foto"><br>
            <input type="submit" value="Atualizar">
        </form>
    </div>

</body>
</html>