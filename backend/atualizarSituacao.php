<?php
header("Content-Type: application/json");
require 'conexao.php';

// Lê os dados JSON enviados pelo fetch()
$input = json_decode(file_get_contents("php://input"), true);

$id = $input['id'] ?? null;
$situacao = $input['situacao'] ?? null;

if (!$id || !$situacao) {
    echo json_encode(["success" => false, "error" => "Dados incompletos"]);
    exit;
}

$sql = $conexao->prepare("UPDATE livros SET situacao = ? WHERE id_livro = ?");
$sql->bind_param("si", $situacao, $id);

if ($sql->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Erro ao atualizar: " . $conexao->error
    ]);
}
?>

