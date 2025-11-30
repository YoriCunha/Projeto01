<?php
header('Content-Type: application/json');
require 'conexao.php';

if (!isset($_GET['id'])) {
    echo json_encode(["erro" => "ID não informado"]);
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT id_clientes, nome, email, telefone, endereco
        FROM clientes 
        WHERE id_clientes = $id";
    
$result = $conexao->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["erro" => "Cliente não encontrado"]);
}

$conexao->close();
?>