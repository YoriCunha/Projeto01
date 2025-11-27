<?php
header('Content-Type: application/json');
require 'conexao.php';

$sql = "SELECT id_livro, titulo, quantidade, autor, editora, data_pub, situacao, observacao, faixa, localizacao, sinopse, genero, imagem FROM livros";
$result = $conexao->query($sql);

$livros = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }
}

echo json_encode($livros, JSON_UNESCAPED_UNICODE);
$conexao->close();
?>

