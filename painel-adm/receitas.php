<?php
include_once('../conexao.php');

$consulta = $pdo->query("
    SELECT r.*, f.descricao AS forma_pagamento
    FROM receitas r
    LEFT JOIN formas_pagamento f ON r.forma_pagamento_id = f.id
    ORDER BY r.data_recebimento DESC
");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Receitas</title>
    <link rel="stylesheet" href="../DataTables/datatables.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabela').DataTable();
        });
    </script>
</head>
<body>
    <h2>Receitas</h2>
    <table id="tabela" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Forma de Pagamento</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['descricao'] ?></td>
                    <td>R$ <?= number_format($r['valor'], 2, ',', '.') ?></td>
                    <td><?= date('d/m/Y', strtotime($r['data_recebimento'])) ?></td>
                    <td><?= $r['forma_pagamento'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <p><a href="cad_receita.php">Nova Receita</a></p>
</body>
</html>
