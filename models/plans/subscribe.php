<?php
require_once __DIR__ . "/../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $plan_id = $_POST["plan_id"];
    $data_inicio = date("Y-m-d");
    $data_fim = date("Y-m-d", strtotime("+1 month"));

    $sql = "INSERT INTO assinaturas (user_id, plan_id, data_inicio, data_fim) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $user_id, $plan_id, $data_inicio, $data_fim);

    if ($stmt->execute()) {
        echo "Plano assinado com sucesso!";
    } else {
        echo "Erro ao assinar o plano.";
    }
}
?>
