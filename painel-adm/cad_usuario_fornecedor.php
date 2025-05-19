<?php
include_once('../conexao.php');

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare("INSERT INTO usuarios_fornecedores (nome, tipo, email, telefone) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nome, $tipo, $email, $telefone])) {
        $msg = "Cadastro realizado com sucesso!";
    } else {
        $msg = "Erro ao cadastrar!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário / Fornecedor</title>
</head>
<body>
    <h2>Cadastro de Usuário / Fornecedor</h2>
    <?php if ($msg): ?>
        <p><strong><?= $msg ?></strong></p>
    <?php endif; ?>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>
        <label>Tipo:</label><br>
        <select name="tipo" required>
            <option value="Usuário">Usuário</option>
            <option value="Fornecedor">Fornecedor</option>
        </select><br><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br><br>
        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="usuarios_fornecedores.php">Ver cadastrados</a></p>
</body>
</html>
