<?php
include_once('../conexao.php');

$id = $_GET['id'] ?? '';
$receita = $pdo->query("SELECT * FROM receitas WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
$formas = $pdo->query("SELECT * FROM formas_pagamento")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data_recebimento'];
    $forma_pagamento_id = $_POST['forma_pagamento_id'];

    $stmt = $pdo->prepare("UPDATE receitas SET descricao=?, valor=?, data_recebimento=?, forma_pagamento_id=? WHERE id=?");
    $stmt->execute([$descricao, $valor, $data, $forma_pagamento_id, $id]);

    header("Location: receitas.php");
    exit;
}
?>
<form method="POST">
    <h2>Editar Receita</h2>
    <input type="text" name="descricao" value="<?= $receita['descricao'] ?>" required><br>
    <input type="number" step="0.01" name="valor" value="<?= $receita['valor'] ?>" required><br>
    <input type="date" name="data_recebimento" value="<?= $receita['data_recebimento'] ?>" required><br>
    <select name="forma_pagamento_id" required>
        <?php foreach ($formas as $f): ?>
            <option value="<?= $f['id'] ?>" <?= $receita['forma_pagamento_id'] == $f['id'] ? 'selected' : '' ?>>
                <?= $f['descricao'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Salvar</button>
</form>
