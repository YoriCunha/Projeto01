<?php
include "conexao.php";

// Recebe JSON do fetch
$dados = json_decode(file_get_contents("php://input"), true);

if (!$dados || !isset($dados['id']) || !isset($dados['situacao'])) {
    echo json_encode(["success" => false, "error" => "Dados inválidos"]);
    exit;
}

$id = intval($dados['id']);
$situacao = mysqli_real_escape_string($conexao, $dados['situacao']);

// Atualiza apenas a situação
$sql = "UPDATE livros SET situacao = '$situacao' WHERE id_livro = $id";

if (mysqli_query($conexao, $sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => mysqli_error($conexao)]);
}
?>