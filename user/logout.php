        <?php 
        
        include_once('../config/url.php');
    
        require '../config/conection.php'; // Incluir o arquivo de conexão
        require '../vendor/autoload.php'; // Carrega o PHPMailer automaticamente
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
        
            // Verifica se o e-mail existe no banco
            $sql = "SELECT iduser FROM user WHERE email_user = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();
        
            if ($resultado->num_rows > 0) {
               // Gera um código aleatório de 6 dígitos
        $cod_verificacao = rand(100000, 999999);
        
                // Salva o token no banco
                $sql = "UPDATE user SET cod_verificacao = ? WHERE email_user = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $cod_verificacao, $email);
                $stmt->execute();
        
                // Configuração do PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'timeagend7@gmail.com';  // Seu e-mail
                $mail->Password = 'dkjd qyak voic tfde';  // ---------Use a senha de aplicativo aqui---------
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
        
                 // Remetente e destinatário
            $mail->setFrom('timeagend7@gmail.com', 'TIMEAGEND'); // Seu e-mail
            $mail->addAddress($email);  // Destinatário

            // Conteúdo do e-mail
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->Subject = 'Código de Verificação';
            $mail->Body    = "Seu código de verificação é: <b>$cod_verificacao</b>";

            // Envia o e-mail
            $mail->send();
            header("Location: ../user/cod_verificacao.php?email=" . urlencode($email));
            exit(); // Importante para não continuar executando o script
        } catch (Exception $e) {
            echo "Falha ao enviar o e-mail. Erro: {$mail->ErrorInfo}";
        }
    } else {
        echo "E-mail não encontrado.";
    }
        
        
    
}
        ?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recuperar Senha</title>
            <link rel="stylesheet" href="<?= BASE_URL ?>user/assets/css/logout.css">

        </head>
        <body>
            <div class="container">
                <h1>Recuperar senha</h1>
                <form method="POST" action="">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="usuario@gmail.com" required />
                </div>
                <button type="submit">Enviar</button>
            </form>
            </div>
            </form>
        </body>
        </html>