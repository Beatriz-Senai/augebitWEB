<?php
// Iniciar sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit();
}

// Página de painel simples após o login
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUGEBIT - Painel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #000;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
        }
        
        .btn {
            background-color: #fff;
            color: #000;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="https://via.placeholder.com/40" alt="AUGEBIT Logo">
            <span>AUGEBIT industrial design</span>
        </div>
        <div class="nav">
            <a href="#">INÍCIO</a>
            <a href="#">CONTATOS</a>
            <a href="#">SERVIÇOS</a>
            <a href="logout.php">SAIR</a>
        </div>
    </div>
    
    <div class="container">
        <h1>Bem-vindo ao Painel</h1>
        <p>Olá, <?php echo htmlspecialchars($_SESSION['email']); ?>!</p>
        <p>Você está logado com sucesso.</p>
        
        <a href="logout.php" class="btn">Sair</a>
    </div>
</body>
</html>