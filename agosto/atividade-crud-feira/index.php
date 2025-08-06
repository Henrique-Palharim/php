<?php
    require 'paginas/conexao.php';

    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id ASC");
    $produtos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Feira Livre</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>

    <div class="container">
        <table cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Data Colheita</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['nome']) ?></td>
                        <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                        <td><?= date('d/m/Y', strtotime($p['data_colheita'])) ?></td>
                        <td>
                            <?php if ($p['foto']): ?>
                                <img src="fotos/<?= $p['foto'] ?>" width="80">
                            <?php else: ?>
                                Sem foto
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="editar" href="paginas/editar.php?id=<?= $p['id'] ?>">✏️ Editar</a> |
                            <a href="paginas/excluir.php?id=<?= $p['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">🗑️ Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a class="adicionar" href="paginas/adicionar.php">Adicionar Produto</a>

</body>
</html>