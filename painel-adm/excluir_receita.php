<?php
include_once('../conexao.php');
$id = $_GET['id'] ?? '';
$pdo->query("DELETE FROM receitas WHERE id = $id");
header("Location: receitas.php");
exit;
