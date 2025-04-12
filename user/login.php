<?php
session_start();
include_once('../config/conection.php'); // Incluir o arquivo de conexão

// Verificar se a requisição é um POST e se o usuário e senha foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_user = $_POST['email'];  // Renomeado para 'login' conforme o seu banco
    $password = $_POST['password'];

    // Verifique a conexão com o banco de dados
    try {
        // Query para verificar o usuário no banco de dados
        $sql = "SELECT * FROM user WHERE email_user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email_user);  // Corrigido: variável usada aqui é $login e não $email
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Aqui usamos o método fetch_assoc() do MySQLi
        $user = $resultado->fetch_assoc();

         // Comparar a senha diretamente (se não estiver usando hash)
         if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['iduser'];
            $_SESSION['user_name'] = $user['name_user']; // Certifique-se de que a coluna no banco é 'name'
            $_SESSION['user_email'] = $user['email_user'];
            $_SESSION['foto_perfil'] = $user['foto_perfil']; // Se houver

            header('Location: ../public/index.php');
            exit;
        } else {
            $_SESSION['login_error'] = "Usuário ou senha incorretos.";
        }
    } catch (Exception $e) {
        $_SESSION['login_error'] = "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <main>
        <div class="menu">
            <ul>
                <a href="index.php"><li>Início</li></a>
                <a href="#"><li>Sobre-nós</li></a>
                <a href="#"><li>Ajuda</li></a>
            </ul>
        </div>

        <div class="container">
            <div class="login-box">
                <h2>ACESSE SUA CONTA</h2>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="input-group">
                        <label for="username">Usuário:</label>
                        <input type="text" id="username" name="email" placeholder="Digite seu usuário" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Senha:</label>
                        <input type="password" name="password" placeholder="Digite sua senha" required/>
                    </div>

                    <?php if (isset($_SESSION['login_error'])): ?>
                        <p class="error-message"><?= $_SESSION['login_error']; ?></p>
                        <?php unset($_SESSION['login_error']); ?>
                    <?php endif; ?>

                    <a href="../user/logout.php" class="forgot-password">Esqueceu a senha?</a> <!-- Adicionando o link "Esqueceu a senha?"-->
                   
                    <button type="submit" id="loginButton">LOGIN</button>
                </form>
              <a href="#" id="open-modal">Cadastre-se aqui</a>
            </div>
        </div>

        <div id="modal-cadastro" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="conta">CRIE SUA CONTA</h2>
                <form action="DBregister.php" method="POST">
                    <div class="input-groupy">
                        <label for="cadastro-username">Usuário:</label>
                        <input type="text" name="cadastro-username" placeholder="Digite seu usuário" required>
                    </div>
                    <div class="input-groupy">
                        <label for="cadastro-email">Email:</label>
                        <input type="email" name="cadastro-email" placeholder="Digite seu email" required>
                    </div>
                    <div class="input-groupy">
                        <label for="cadastro-numero">Telefone:</label>
                        <input type="text" name="cadastro-numero" placeholder="Digite seu número" required>
                    </div>
                    <div class="input-groupy">
                        <label for="cadastro-senha">Senha:</label>
                        <input type="password" name="cadastro-senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="input-groupy">
                        <label for="cadastro-confirma-senha">Confirme a senha:</label>
                        <input type="password" name="cadastro-confirma-senha" placeholder="Confirme sua senha" required>
                    </div>
                    <button class="button" type="submit">CADASTRE-SE</button>
                </form>
            </div>
        </div>
    </main>

<script src="assets/script/cadastro.js"></script>

</body>
</html>
