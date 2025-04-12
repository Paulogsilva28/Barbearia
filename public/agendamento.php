<?php 
include_once('../config/url.php'); // Certifique-se de que esse caminho está correto
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "/user/login.php");
    exit;
}



include_once('../config/url.php');
require_once('../models/auth/authFunctions.php');
require '../vendor/autoload.php'; // Carrega o Composer e PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isAuthenticated()) {
    header("Location:" . BASE_URL . "user/login.php");
    exit();
}

$successMessage = $errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendEmail'])) {
    $nome = trim($_POST['user_name']) ?? 'Usuário';
    $email = trim($_POST['user_email']) ?? 'sememail@example.com';
    $mensagem = trim($_POST['mensagem']);
    
    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'timeagend7@gmail.com';  // Seu e-mail
            $mail->Password = 'dkjd qyak voic tfde';  // ---------Use a senha de aplicativo aqui---------
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($email, $nome); // Usa os dados do formulário
            $mail->addAddress('timeagend7@gmail.com', 'Administrador');

            $mail->isHTML(true);
            $mail->Subject = 'Contato via Site - TimeAgend Barber Shop';
            $mail->Body    = "<p><strong>Nome:</strong> $nome</p>
                              <p><strong>Email:</strong> $email</p>
                              <p><strong>Mensagem:</strong></p>
                              <p>$mensagem</p>";
//verivicar mnsg de erro 236
            $mail->send();
            $successMessage = 'E-mail enviado com sucesso!';
        } catch (Exception $e) {
            $errorMessage = "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        $errorMessage = 'Por favor, preencha todos os campos antes de enviar.';
    }
}

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeAgend Barber Shop - Serviços</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/agendamento.css">
</head>
<body>
    <header>
        <img src="<?= BASE_URL?>/img/SAVE_20241028_185834.jpg" alt="Logo TimeAgend">
        <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button>
        <nav class="menu-principal">
            <a href="<?= BASE_URL ?>/public/index.php">Início</a>
            <a href="<?= BASE_URL ?>/public/agendamento.php" class="selected">Agenda</a>
            <a href="<?= BASE_URL ?>/public/planos.php">Planos</a>
            <a href="<?= BASE_URL ?>/public/perfil.php">Perfil</a>
            <a href="#" onclick="openContactModal()">Contato</a>
        </nav>
        <script src="<?= BASE_URL?>public/assets/script/menu.js"></script>
    </header>

    <div class="modal" id="contactModal">
        <div class="modal-content-1">
            <span class="close" onclick="closeContactModal()">&times;</span>
            <h3 class="fale-conosco">Fale <span class="conosco">Conosco</span></h3>
            <div id="contato" class="contato-container">
                <?php if(isset($successMessage)) echo "<p style='color:green;'>$successMessage</p>"; ?>
                <?php if(isset($errorMessage)) echo "<p style='color:red;'>$errorMessage</p>"; ?>
                <form class="form-email" method="POST">
                <label for="user_name">Nome:</label>
                <input type="text" name="user_name" id="user_name" required>
                <label for="user_email">E-mail:</label>
                <input type="email" name="user_email" id="user_email" required>
                    <label for="mensagem">Mensagem</label>
                    <textarea name="mensagem" id="mensagem" required></textarea>
                    <button type="submit" name="sendEmail" data-button>Enviar</button>
                </form>
            </div>
            <div class="success-message"></div>
        </div>
    </div>

   
    <!-- Main Content -->
    <div class="main-container">
        <h1><span class="span">SELECIONE UM</span> SERVIÇO</h1>
        <div style="margin: 10px auto; width: 140%; transform: translateX(-15%); height: 2px; background: linear-gradient( rgba(255, 255, 255, 0.414), rgba(255, 255, 255, 0));"></div>





        <div class="services-container">
            <h3>CORTES</h3>
            <div class="service-item" onclick="toggleService('Corte Clássico', 40, this)"><span>Corte Clássico</span><span>R$ 40,00</span></div>
            <div class="service-item" onclick="toggleService('Corte Infantil', 40, this)"><span>Corte Infantil</span><span>R$ 40,00</span></div>
            <div class="service-item" onclick="toggleService('Corte Degradê', 30, this)"><span>Corte Degradê</span><span>R$ 30,00</span></div>

            <h3>BARBA</h3>
            <div class="service-item" onclick="toggleService('Barba e Bigode', 25, this)"><span>Barba e Bigode</span><span>R$ 25,00</span></div>
            <div class="service-item" onclick="toggleService('Barba Completa', 20, this)"><span>Barba Completa</span><span>R$ 20,00</span></div>

            <h3>OUTROS</h3>
            <div class="service-item" onclick="toggleService('Sobrancelha', 15, this)"><span>Sobrancelha</span><span>R$ 15,00</span></div>
            <div class="service-item" onclick="toggleService('Máquina', 32, this)"><span>Máquina</span><span>R$ 32,00</span></div>
        </div>

        
       

        <div class="barbers-container">
            <h2>BARBEIROS</h2>
            <div class="barber-grid">
                <div class="barber-card">
                    <img src="<?= BASE_URL?>img/image (7).png" alt="Barbeiro 1">
                    <p>Barbeiro 1</p>
                </div>
                <div class="barber-card">
                    <img src="<?= BASE_URL?>img/image (8).png" alt="Barbeiro 2">
                    <p>Barbeiro 2</p>
                </div>
                <div class="barber-card">
                    <img src="<?= BASE_URL?>img/image (9).png" alt="Barbeiro 3">
                    <p>Barbeiro 3</p>
                </div>
                <div class="barber-card">
                    <img src="<?= BASE_URL?>img/image (10).png" alt="Barbeiro 4">
                    <p>Barbeiro 4</p>
                </div>
                <div class="barber-card">
                    <img src="<?= BASE_URL?>img/image (11).png" alt="Barbeiro 5">
                    <p>Barbeiro 5</p>
                </div>
                <div class="barber-card">
                    <img src="<?= BASE_URL?>img/image (12).png" alt="Barbeiro 6">
                    <p>Barbeiro 6</p>
                </div>
            </div>
        </div>

        <button class="agendar-btn" onclick="openModal()">AGENDAR</button>

        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h1>FAÇA SEU AGENDAMENTO</h1>

                <!-- Seleção de Barbeiro -->
                <select id="barber-select" onchange="updateBarber(this.value)">
                    <option value="">Selecione o barbeiro</option>
                    <option value="Barbeiro 1">Barbeiro 1</option>
                    <option value="Barbeiro 2">Barbeiro 2</option>
                    <option value="Barbeiro 3">Barbeiro 3</option>
                    <option value="Barbeiro 4">Barbeiro 4</option>
                    <option value="Barbeiro 5">Barbeiro 5</option>
                    <option value="Barbeiro 6">Barbeiro 6</option>
                </select>

                <!-- Cabeçalho do Calendário -->
                <div class="calendar-header">
                    <button onclick="prevMonth()">&#9664;</button>
                    <div id="month-year"></div>
                    <button onclick="nextMonth()">&#9654;</button>
                </div>

                <div class="calendar" id="calendar-days"></div>

                <!-- Seleção de horário -->
                <select id="time-select" onchange="updateTime(this.value)">
                    <option value="">Escolha um horário</option>
                    <option value="09:00-09:30">09:00-09:30</option>
                    <option value="10:00-10:30">10:00-10:30</option>
                    <option value="11:00-11:30">11:00-11:30</option>
                    <option value="13:00-13:30">13:00-13:30</option>
                    <option value="14:00-14:30">14:00-14:30</option>
                </select>

                <!-- Detalhes do Agendamento -->
                <div class="details">
                    <h2>Detalhes do agendamento:</h2>
                    <p id="service">Serviço: -</p>
                    <p id="selected-date">Data: -</p>
                    <p id="selected-barber">Barbeiro: -</p>
                    <p id="selected-time">Horário: -</p>
                    <p id="price">Preço: R$ 0,00</p>
                </div>

                <button class="agendar-btn" onclick="scheduleAppointment()">AGENDAR</button>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL?>public/assets/script/agendamento.js"></script>
    
</body>
</html>


