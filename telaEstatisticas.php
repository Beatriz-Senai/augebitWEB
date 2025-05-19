<!-- CONEXÃO COM BANCO DE DADOS -->
<?php
include("conexao.php");
?>
<!-- FIM -->

<!-- CÓDIGO HTML -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatísticas</title>
    <link rel="stylesheet" href="telaEstatisticas.css">
</head>
<body>
    <header>
        <img class="logo" src="imagens/augebitLogo.png" alt="logo">
        <div class="infoHeader">
        <div class="botoes">
        <button class="headerBtn">
            INÍCIO
        </button>
        <button class="headerBtn">
            SERVIÇOS
        </button>
        </div>
        <img class="fotoPerfil" src="imagens/imagemPerfil.png" alt="foto de perfil">
        </div>
    </header>

    <div class="infoBtn">
    <div class="bodyBtn">
    <button class="menuBtn">
        ESTATÍSTICAS
    </button>
    <button class="menuBtn">
        ORGANIZAÇÃO
    </button>
    <button class="menuBtn">
        PAGAMENTOS
    </button>
    <button class="menuBtn">
        PRODUTOS
    </button>
    </div>
    </div>

<h2>ESTATÍSTICAS GERAIS DO SISTEMA</h2>

    <div class="dashboard">
        <div class="card">
            <i class="ri-box-3-line"></i>
            <div class="info">
                <div class="value">1.000</div>
                <div class="label">Produtos Cadastrados</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-user-3-line"></i>
            <div class="info">
                <div class="value">80</div>
                <div class="label">Clientes Cadastrados</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-user-star-line"></i>
            <div class="info">
                <div class="value">10</div>
                <div class="label">Fornecedores Cadastrados</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-box-3-line"><span style="position: relative; top: -10px; left: -15px; font-size: 16px;">❌</span></i>
            <div class="info">
                <div class="value">40</div>
                <div class="label">Produtos Estoque Baixo</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-calendar-line"></i>
            <div class="info">
                <div class="value">0</div>
                <div class="label">Contas a Pagar Hoje</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-calendar-close-line"></i>
            <div class="info">
                <div class="value">0</div>
                <div class="label">Contas a Pagar Vencidas</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-calendar-line"></i>
            <div class="info">
                <div class="value">0</div>
                <div class="label">Contas a Receber Hoje</div>
            </div>
        </div>

        <div class="card">
            <i class="ri-calendar-close-line"></i>
            <div class="info">
                <div class="value">0</div>
                <div class="label">Contas a Receber Vencidas</div>
            </div>
        </div>
    </div>
</body>
</html>
<!-- FIM -->

<!-- PARTE DO JAVASCRIPT -->
<script>
    // Função para alternar a classe 'selected' nos botões do menu
    document.addEventListener('DOMContentLoaded', function() {
        // Seleciona todos os botões com a classe menuBtn
        const menuButtons = document.querySelectorAll('.menuBtn');
        
        // Adiciona um event listener para cada botão
        menuButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove a classe 'selected' de todos os botões
                menuButtons.forEach(btn => {
                    btn.classList.remove('selected');
                });
                
                // Adiciona a classe 'selected' ao botão clicado
                this.classList.add('selected');
            });
        });
    });
</script>
<!-- FIM -->

<!-- PARTE DO CSS -->
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

    header {
    background-color: black;
    height: 180px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

*{
    font-family: poppins;
}

@font-face {
    font-family: poppins;
    src: url(fontes/Poppins-Regular.ttf);
}

.logo{
    height: 120px;
    margin-left: 20px;
}

.fotoPerfil {
    margin-right: 20px;
    height: 80px;
}

.infoHeader{
    height: 200px;
    width: 550px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.botoes{
    margin-left: 160px;
    width: 300px;
}

.headerBtn {
    border: none;
    background-color: transparent;
    color: white;
    cursor: pointer;
    font-size: 25px;
    position: relative; 
    padding-bottom: 5px; 
    margin: 0 10px; 
    transition: color 0.3s ease; 
}

.headerBtn::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0; 
    height: 2px; 
    background-color: white; 
    transition: width 0.3s ease; 
}

.headerBtn:hover::after {
    width: 100%;
}

.headerBtn:hover {
    color: #9747FF; 
}

.bodyBtn{
    margin-top: 50px;
    height: 80px;
    width: 1050px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.menuBtn{
    background-color: black;
    color: white;
    font-size: 25px;
    height: 60px;
    width: 240px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
}

.menuBtn.selected {
    background-color: #9747FF;
    color: black;
    box-shadow: 0 0 12px rgba(151, 71, 255, 0.5);
}

.menuBtn:hover:not(.selected) {
    background-color: #333;
}

.menuBtn:active {
    transform: scale(0.97);
}

.infoBtn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.info1{
    border: solid purple 1px;
    height: 100px;
    width: 100px;
}

.tudo{
    border: 1px solid black;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.coluna1, .coluna2, .coluna3{
    border: 1px solid black;
    display: column;
}

h2 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1.5px solid #b366ff;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #888;
            background-color: #fff;
        }

        .card i {
            font-size: 36px;
            color: #b366ff;
        }

        .card .info {
            display: flex;
            flex-direction: column;
        }

        .info .value {
            font-size: 20px;
            font-weight: bold;
            color: #b366ff;
        }

        .info .label {
            font-size: 14px;
        }
</style>
<!-- FIM -->