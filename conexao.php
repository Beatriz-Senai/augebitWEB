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




<!-- conexão tela login -->
<?php
// Arquivo para configuração da conexão com o banco de dados
// Você pode incluir este arquivo no login.php quando precisar se conectar ao banco de dados

// Dados de conexão com o banco
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_login";

// Criando a conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Definindo charset
mysqli_set_charset($conexao, "utf8");
?>