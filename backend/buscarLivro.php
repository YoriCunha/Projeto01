<?php
header("Content-Type: application/json");
include "conexao.php";

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

$id = intval($_GET['id']);

$sql = $conexao->prepare("SELECT titulo, autor, editora, situacao, data_pub FROM livros WHERE id_livro = ?");
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["error" => "Livro não encontrado"]);
    exit;
}

$dados = $result->fetch_assoc();

// Retorna todos os dados necessários ao formulário
echo json_encode([
    "titulo" => $dados['titulo'],
    "autor" => $dados['autor'],
    "editora" => $dados['editora'],
    "situacao" => $dados['situacao'],
    "data_pub" => $dados['data_pub'] // importante para preencher o <input type="date">
]);
?>