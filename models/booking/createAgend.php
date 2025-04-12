<?php
require_once __DIR__ . "/../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $barbeiro_id = $_POST["barbeiro_id"];
    $servico_id = $_POST["servico_id"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];

    $sql = "INSERT INTO agendamentos (user_id, barbeiro_id, servico_id, data, hora) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $user_id, $barbeiro_id, $servico_id, $data, $hora);

    if ($stmt->execute()) {
        echo "Agendamento realizado com sucesso!";
    } else {
        echo "Erro ao agendar.";
    }
}
?>
