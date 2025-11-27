<?php
header("Content-Type: application/json");
require "conexao.php";

if (!isset($_GET['id'])) {
    echo json_encode(["erro" => "ID não enviado"]);
    exit;
}

$id = intval($_GET['id']);

$sql = $conexao->prepare("SELECT * FROM livros WHERE id_livro = ?");
$sql->bind_param("i", $id);
$sql->execute();

$result = $sql->get_result();
$livro = $result->fetch_assoc();

echo json_encode($livro);