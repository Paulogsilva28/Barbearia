<?php
session_start();
require_once __DIR__ ."/../../config/url.php"; 
require_once __DIR__ . "/../../config/conection.php"; 


function loginUser($email, $password) {
    global $con;

    $sql = "SELECT iduser, name_user, email_user, password FROM user WHERE email_user = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['iduser'];
        $_SESSION['user_name'] = $user['name_user'];
        $_SESSION['user_email'] = $user['email_user'];
        return true;
    }
    return false;
}

function isAuthenticated() {
     return isset($_SESSION['user_id']);
    
}

function logoutUser() {
    session_unset();
    session_destroy();
}

function selectInfo( $iduser){
    global $con;
    $sql = "SELECT email_user , phone FROM user WHERE iduser = ?";
     $stmt = $con -> prepare($sql);
     $stmt -> bind_param("i", $iduser);
     $stmt -> execute();
     $result = $stmt -> get_result();
     $user = $result -> fetch_assoc();

    if($result -> num_rows > 0){
        $_SESSION['user_email'] = $user['email_user'];
        $_SESSION['user_phone'] = $user['phone'];
        return true;
    }else{
        return false;
    }
}

function logAdm($email,$password){
  $chave = "adm@gmail.com";
  $numero = "7777777";
  if ($email == $chave && $password == $numero){
    $_SESSION['adm'] = $chave;
    return true;
  }else{
        return false;
        echo "Erro ao Logar!";
  }
}
