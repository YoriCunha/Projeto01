<?php 
session_start();
require 'conexao.php';

if (isset($_POST['savebook'])) {
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['qtd']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['editora']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['situacao']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['obs']));

    $sql = "INSERT INTO livros (titulo, qtd, autor, editora, data_pub, situacao, observacao) VALUES ('$titulo', '$qtd', '$autor', '$editora', '$data', '$situacao', '$obs')";
}
?>