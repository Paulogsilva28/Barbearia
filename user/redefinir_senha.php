<?php
// Inclui o arquivo de conexão
include_once('../config/conection.php'); // Incluir o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // O e-mail do usuario
    $nova_senha = $_POST['new_password']; // Nova senha
    $confirm_senha = $_POST['confirm_password']; // Senha de confirmação

    // Verifica se as senhas coincidem
    if ($nova_senha !== $confirm_senha) {
        echo "As senhas não coincidem.";
        exit();
    }

    // Atualiza a senha no banco de dados SEM usar hash
    $sql_update = "UPDATE user SET password = '$nova_senha' WHERE email_user = '$email'";
    if (mysqli_query($conn, $sql_update)) {
        echo "Senha redefinida com sucesso!";
        // Você pode redirecionar para a página de login ou onde desejar
        header("Location: ../user/login.php");
        exit();
    } else {
        echo "Erro ao redefinir a senha: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body class="redefinir-senha-pagina">
    
    <h2>Redefinir senha</h2>
    <form method="POST" action="">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
        <div class="input-group">
            <label for="new-password">Nova senha</label>
            <input type="password" id="new-password" name="new_password" required class="password-input">
        </div>
        <div class="input-group">
            <label for="confirm-password">Repita a senha</label>
            <input type="password" id="confirm-password" name="confirm_password" required class="password-input">
        </div>
        <button type="submit">Enviar</button>
    </form>

</body>
</html>
