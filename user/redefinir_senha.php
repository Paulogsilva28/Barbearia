<?php
// Inclui o arquivo de conexão


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
    <style>
        /* Resetando margens e preenchimentos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo do body */
        body.redefinir-senha-pagina {
            font-family: 'Arial', sans-serif;
            background-color: #2a2a2a; /* Fundo escuro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            flex-direction: column; /* Centraliza o conteúdo verticalmente */
        }

        /* Estilo para o formulário */
        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Título */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #9fb134; /* Verde */
            font-size: 28px;  /* Aumentei o tamanho da fonte */
            font-weight: bold;
            margin-top: 0;  /* Remover margens extras */
        }

        /* Estilo dos grupos de input */
        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333; /* Preto */
        }

        .password-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .password-input:focus {
            border-color: #28a745; /* Verde */
            outline: none;
        }

        /* Botão de submit */
        button {
            width: 100%;
            padding: 12px;
            background-color:#9fb134;/* Verde */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:  #28a745; /* Verde escuro */
        }

        /* Mensagens de erro ou sucesso */
        p {
            text-align: center;
            color: #ff0000;
            font-size: 14px;
        }

        /* Responsividade para dispositivos móveis */
        @media (max-width: 480px) {
            form {
                padding: 20px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
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
