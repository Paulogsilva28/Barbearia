<?php  

  include_once('../config/url.php');
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL?>/public/assets/css/perfil.css">
    <link rel="stylesheet" href="<?= BASE_URL?>/public/assets/css/historico.css">
</head>
<body>
  
</head>
<body>
    <!-- Header -->
<header>
    <img src="<?= BASE_URL?>img/SAVE_20241028_185834.jpg" alt="Logo TimeAgend">
    <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button> <!-- Botão para alternar o menu -->
    <nav class="menu-principal">
        <a href="<?= BASE_URL?>/public/index.php">Início</a>
        <a href="<?= BASE_URL?>/public/agendamento.php">Agenda</a>
        <a href="<?= BASE_URL?>/public/planos.php">Planos</a>
        <a href="#" class="selected">Perfil</a> <!-- Classe "selected" aplicada ao Perfil -->
        <a href="#">Contato</a>
    </nav>
</header>
<main>
    <button class="button-1" onclick="window.location.href='<?= BASE_URL?>/public/perfil.php' " >Voltar</button>
    <h1>Olá, Cliente</h1>
    <div class="separator"></div>
    <div class="appointment-card">
        <h2>MEUS AGENDAMENTOS</h2>
        <p><strong>Corte Degradê</strong><br>
        28 de Setembro<br>
        09:00-09:30<br>
        <span class="price">R$ 30,00</span></p>

        <h2>LOCALIZAÇÃO</h2>
        <p>123 Anywhere<br>St., Any City, ST 12345</p>

        <button class="cancel-button">CANCELAR</button>
    </div>
</main>
 <script src="<?= BASE_URL?>/public/assets/script/menu.js"></script>
 
</body>
</html>