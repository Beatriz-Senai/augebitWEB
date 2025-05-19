<?php
include_once('../conexao.php');
$consulta = $pdo->query("SELECT * FROM usuarios_fornecedores ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuários / Fornecedores</title>
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
    <h2>Lista de Usuários / Fornecedores</h2>
    <table id="tabela" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data de Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['tipo'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['telefone'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($row['data_cadastro'])) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <p><a href="cad_usuario_fornecedor.php">Cadastrar novo</a></p>
</body>
</html>
