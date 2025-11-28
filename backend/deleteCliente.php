<?php
require 'conexao.php';

if (isset($_GET['id_clientes'])) {
    $id = intval($_GET['id_clientes']); // Garante que é um número inteiro

    // Prepared statement para maior segurança
    $stmt = $conexao->prepare("DELETE FROM clientes WHERE id_clientes = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Sucesso, redireciona
        header("Location: ../view/clientes.php");
        exit;
    } else {
        // Erro ao deletar
        echo "Erro ao deletar cliente: " . $stmt->error;
    }

    $stmt->close();
}

$conexao->close();
?>