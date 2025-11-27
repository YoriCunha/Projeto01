<?php
include "conexao.php";

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

$id = intval($_GET['id']);

// Busca os dados do livro
$sql = mysqli_query($conexao, "SELECT * FROM livros WHERE id_livro = $id");

if (mysqli_num_rows($sql) == 0) {
    echo json_encode(["error" => "Livro não encontrado"]);
    exit;
}

$dados = mysqli_fetch_assoc($sql);

// Retorna JSON com os campos do formulário
echo json_encode([
    "titulo" => $dados['titulo'],
    "autor" => $dados['autor'],
    "editora" => $dados['editora'],
    "situacao" => $dados['situacao']
]);
?>