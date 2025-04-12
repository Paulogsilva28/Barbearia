<?php
$servername = "localhost:3306";
$dbname = "barbearia";
$password = "";
$username = "root";

$conn = new mysqli($servername, $username, $password, $dbname);

// Tratamento de erro da conexão
if ($conn->connect_error) {
    error_log("Erro de conexão: " . $conn->connect_error); // Registra o erro no log
    die("Ocorreu um erro ao conectar ao banco de dados. Tente novamente mais tarde.");
}

// Função para reutilizar a conexão
function getDatabaseConnection() {
    global $conn;
    return $conn;
}
?>
