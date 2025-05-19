<?php
include_once('../conexao.php');

$id = $_GET['id'] ?? '';
$usuario = $pdo->query("SELECT * FROM usuarios_fornecedores WHERE id = $id")->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare("UPDATE usuarios_fornecedores SET nome=?, tipo=?, email=?, telefone=? WHERE id=?");
    $stmt->execute([$nome, $tipo, $email, $telefone, $id]);

    header("Location: usuarios_fornecedores.php");
    exit;
}
?>
<form method="POST">
    <h2>Editar Usuário / Fornecedor</h2>
    <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br>
    <select name="tipo" required>
        <option value="Usuário" <?= $usuario['tipo'] == 'Usuário' ? 'selected' : '' ?>>Usuário</option>
        <option value="Fornecedor" <?= $usuario['tipo'] == 'Fornecedor' ? 'selected' : '' ?>>Fornecedor</option>
    </select><br>
    <input type="email" name="email" value="<?= $usuario['email'] ?>"><br>
    <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>"><br>
    <button type="submit">Salvar</button>
</form>
