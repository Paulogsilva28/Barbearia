<?php
require_once 'authFunctions.php';
include_once '../../config/url.php';

// var_dump($_POST);
// exit();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (loginUser($email, $password)) {
        selectInfo($_SESSION['user_id']);
        header("Location:". BASE_URL ."public/index.php");
        exit();
    } else{
        echo "Email ou senha inválidos!";
        $_SESSION['msg']= "Email ou senha inválidos!";
    }
    if(logAdm($email,$password)){
       header("Location:" . BASE_URL . "adm/index.php");
       exit();
    }else{
        echo "Erro ao logar!";
    }
}
?>
