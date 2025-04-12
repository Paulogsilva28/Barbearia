<?php  

  include_once('../config/url.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 40px;
        background-color: #000;
        border-bottom: none;
        box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.515);
        margin-top: 12px;
        width: 87%;
        position: relative;
        left: 49px;
    }
    header img {
        width: 200px;
    }
    nav a {
        color: #fff;
        margin: 0 15px;
        text-decoration: none;
        font-size: 16px;
    }
    nav a:hover, .selected {
        color: white;
        background-color: #b0c43a;
        border-radius: 20px;
        padding: 5px 15px;
    }
    body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .planos-assinatura {
    text-align: center;
    color: #fff;
    background-color: #000;
    padding: 40px;
}

.planos-assinatura h2 {
    font-size: 24px;
    font-weight: normal;
}

.planos-assinatura h3 {
    font-size: 32px;
    color: #b0c43a;
    margin-bottom: 20px;
}

.plano {
    display: inline-block;
    background-color: #fff;
    color: #000;
    width: 250px;
    height: 400px;
    margin: 0 15px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.plano h4 {
    font-size: 22px;
    margin-bottom: 15px;
}

.plano .preco {
    font-size: 24px;
    color: #b0c43a;
    margin: 10px 0;
    margin-bottom: 60px;
    
}

.plano .preco span {
    font-size: 16px;
    color: #000;
}

.plano ul {
    list-style: none;
    padding: 0;
    font-size: 14px;
    margin: 10px 0 20px;
    color: #333;
    
}

.plano ul li {
    margin-bottom: 8px;
}

.plano button {
    background-color: #b0c43a;
    color: #000;
    border: none;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
   margin-top: 20px;
}

.plano button:hover {
    background-color: #9fb134;
}
li{
    font-size: 16px;
   
}


    </style>

</head>
<body>
    <header>
        <img src="<?= BASE_URL?>img/SAVE_20241028_185834.jpg" alt="Logo TimeAgend">
        <nav>
            <a href="<?= BASE_URL?>/public/index.php">Início</a>
            <a href="<?= BASE_URL?>/public/agendamento.php">Agenda</a>
            <a href="#">Planos</a>
            <a href="<?= BASE_URL?>public/perfil.php">Perfil</a>
            <a href="#">Contato</a>
        </nav>
    </header>
    <section class="planos-assinatura">
        <h2>CONFIRA NOSSOS</h2>
        <h3>PLANOS DE ASSINATURA</h3>
    
        <div class="plano">
            <h4>CABELO</h4>
            <p class="preco">R$109,90 <span>por mês</span></p>
            <ul>
                <li>Corte o cabelo quantas vezes quiser!</li>
                <li>Presentes exclusivos.</li>
                <li>Desconto em produtos e serviços.</li>
                <li>Desconto consumo barbearia (cerveja, café, água e etc)</li>
            </ul>
            <button>ASSINAR</button>
        </div>
    
        <div class="plano">
            <h4>BARBA</h4>
            <p class="preco">R$69,90 <span>por mês</span></p>
            <ul>
                <li>Faça a barba quantas vezes quiser!</li>
                <li>Presentes exclusivos.</li>
                <li>Desconto em produtos e serviços.</li>
                <li>Desconto consumo barbearia (cerveja, café, água e etc)</li>
            </ul>
            <button>ASSINAR</button>
        </div>
    
        <div class="plano">
            <h4>BARBA</h4>
            <p class="preco">R$39,90 <span>por mês</span></p>
            <ul>
                <li>Faça a barba quantas vezes quiser!</li>
                <li>Presentes exclusivos.</li>
                <li>Desconto em produtos e serviços.</li>
                <li>Desconto consumo barbearia (cerveja, café, água e etc)</li>
            </ul>
            <button>ASSINAR</button>
        </div>
    
        
    </section>
    
    
</body>
</html>
