<?php
$host = "localhost";
$usuario = "root";
$senha = ""; // Padrão do XAMPP
$banco = "augebitweb";

// Conecta ao banco
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>




