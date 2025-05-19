<?php
include_once('../conexao.php');

$formas = $pdo->query("SELECT * FROM formas_pagamento")->fetchAll(PDO::FETCH_ASSOC);
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data_recebimento'];
    $forma_pagamento_id = $_POST['forma_pagamento_id'];

    $stmt = $pdo->prepare("INSERT INTO receitas (descricao, valor, data_recebimento, forma_pagamento_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$descricao, $valor, $data, $forma_pagamento_id])) {
        $msg = "Receita cadastrada com sucesso!";
    } else {
        $msg = "Erro ao cadastrar receita!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Receita</title>
</head>
<body>
    <h2>Cadastro de Receita</h2>
    <?php if ($msg): ?>
        <p><strong><?= $msg ?></strong></p>
    <?php endif; ?>
    <form method="POST">
        <label>Descrição:</label><br>
        <input type="text" name="descricao" required><br><br>
        <label>Valor (R$):</label><br>
        <input type="number" name="valor" step="0.01" required><br><br>
        <label>Data de Recebimento:</label><br>
        <input type="date" name="data_recebimento" required><br><br>
        <label>Forma de Pagamento:</label><br>
        <select name="forma_pagamento_id" required>
            <option value="">Selecione</option>
            <?php foreach ($formas as $f): ?>
                <option value="<?= $f['id'] ?>"><?= $f['descricao'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="receitas.php">Ver Receitas</a></p>
</body>
</html>
