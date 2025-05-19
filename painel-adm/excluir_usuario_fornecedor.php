<?php
include_once('../conexao.php');
$id = $_GET['id'] ?? '';
$pdo->query("DELETE FROM usuarios_fornecedores WHERE id = $id");
header("Location: usuarios_fornecedores.php");
exit;
