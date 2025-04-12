<?php  
  

  include_once('../config/url.php');
  require_once('../models/auth/authFunctions.php');

 

//  var_dump($_SESSION['user_phone']);
//  exit();
 if(!isAuthenticated()){
    header("Location:" . BASE_URL . "public/login.php");
    exit();
                                       
 }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="<?= BASE_URL?>/public/assets/css/perfil.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <!-- Header -->
<header>
    <img src="<?= BASE_URL?>img/SAVE_20241028_185834.jpg" alt="Logo TimeAgend">
    <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button> <!-- Botão para alternar o menu -->
    <nav class="menu-principal">
        <a href="<?= BASE_URL?>public/index.php">Início</a>
        <a href="<?= BASE_URL?>public/agendamento.php">Agenda</a>
        <a href="<?= BASE_URL?>public/planos.php">Planos</a>
        <a href="#" class="selected">Perfil</a> <!-- Classe "selected" aplicada ao Perfil -->
        <a href="#">Contato</a>
    </nav>
</header>


</head>
<main>
    <div class="profile-image">
        <img src="<?= BASE_URL?>img/image (13).png" alt="Foto de Perfil">
       
    </div>
    
    <div class="historico" onclick="window.location.href='<?= BASE_URL?>/public/historico.php' ">Histórico e movimentações</div>
    <div class="container">
        <div class="edit-icon">
            <i class="fas fa-edit"></i>
        </div>

        <div class="info">
            <h1>Informações pessoais</h1>
            <label>Nome:</label>
            <input type="text" value="<?= $_SESSION['user_name']?>" />
            <label>Telefone:</label>
            <input type="tel" value="<?= $_SESSION['user_phone']?>" />
            <label>Email:</label>
            <input type="email" value="<?= $_SESSION['user_email']?>" />
        </div>
         <button class="button">Salvar</button>
    
        <div class="botao-alterar"> Alterar foto <br> de perfil</div>
    </div>
</main>
 <script src="<?= BASE_URL?>public/assets/script/menu.js"></script>
 
</body>
</html>


