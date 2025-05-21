<?php
// Iniciar sessão (necessário para gerenciar o login)
session_start();

// Verificar se o formulário de login foi enviado
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Aqui você colocaria a verificação no banco de dados
    // Este é um exemplo simples sem banco de dados
    if ($email == "teste@teste.com" && $senha == "123456") {
        $_SESSION['logado'] = true;
        $_SESSION['email'] = $email;
        header("Location: painel.php"); // Redireciona para a página após login
        exit();
    } else {
        $erro = "Email ou senha incorretos!";
    }
}

// Verificar se o formulário de cadastro foi enviado
if (isset($_POST['cadastro'])) {
    $nome_completo = $_POST['nome_completo'];
    $nome_usuario = $_POST['nome_usuario'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $email = $_POST['email_cadastro'];
    $senha = $_POST['senha_cadastro'];
    $confirma_senha = $_POST['confirma_senha'];
    
    // Validação básica
    if ($senha == $confirma_senha) {
        // Aqui você colocaria o código para salvar no banco de dados
        // Este é um exemplo simples sem banco de dados
        $sucesso = "Conta criada com sucesso! Faça login agora.";
    } else {
        $erro_cadastro = "As senhas não conferem!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUGEBIT - Login</title>
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
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .login-box, .register-box {
            background-color: #fff;
            color: #000;
            border-radius: 8px;
            padding: 30px;
            margin: 10px;
            width: 400px;
        }
        
        .login-box {
            background-color: #fff;
            color: #000;
        }
        
        .register-box {
            color: #fff;
            background-color: transparent;
        }
        
        h2 {
            margin-top: 0;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        p {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f0f0f0;
        }
        
        .date-inputs {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .date-inputs input {
            flex: 1;
        }
        
        .btn {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-white {
            background-color: #fff;
            color: #000;
        }
        
        .alerta {
            color: red;
            margin-bottom: 15px;
        }
        
        .sucesso {
            color: green;
            margin-bottom: 15px;
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
            <a href="#">LOGIN</a>
        </div>
    </div>
    
    <div class="container">
        <div class="login-box">
            <h2>Entre com sua conta</h2>
            <p>Se você já tem uma conta</p>
            
            <?php if (isset($erro)): ?>
                <div class="alerta"><?php echo $erro; ?></div>
            <?php endif; ?>
            
            <?php if (isset($sucesso)): ?>
                <div class="sucesso"><?php echo $sucesso; ?></div>
            <?php endif; ?>
            
            <form method="post" action="">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>
                
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>
                
                <div style="text-align: center; margin-top: 10px;">
                    <button type="submit" name="login" class="btn">Entrar</button>
                </div>
            </form>
        </div>
        
        <div class="register-box">
            <h2>Crie uma conta</h2>
            <p>Se você ainda não tem uma conta</p>
            
            <?php if (isset($erro_cadastro)): ?>
                <div class="alerta"><?php echo $erro_cadastro; ?></div>
            <?php endif; ?>
            
            <form method="post" action="">
                <div class="form-row">
                    <label for="nome_completo">Nome Completo</label>
                    <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo" required>
                </div>
                
                <div class="form-row">
                    <label for="nome_usuario">Nome de Usuário</label>
                    <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Nome de Usuário" required>
                </div>
                
                <div class="form-row">
                    <label>Data de nascimento</label>
                    <div class="date-inputs">
                        <input type="text" name="dia" placeholder="Dia" required>
                        <input type="text" name="mes" placeholder="Mês" required>
                        <input type="text" name="ano" placeholder="Ano" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <label for="email_cadastro">E-mail</label>
                    <input type="email" id="email_cadastro" name="email_cadastro" placeholder="Insira seu e-mail" required>
                </div>
                
                <div class="form-row">
                    <label for="senha_cadastro">Crie uma senha</label>
                    <input type="password" id="senha_cadastro" name="senha_cadastro" placeholder="Crie uma senha" required>
                </div>
                
                <div class="form-row">
                    <label for="confirma_senha">Confirme sua senha</label>
                    <input type="password" id="confirma_senha" name="confirma_senha" placeholder="Confirme sua senha" required>
                </div>
                
                <div style="text-align: center; margin-top: 10px;">
                    <button type="submit" name="cadastro" class="btn btn-white">Criar conta</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>