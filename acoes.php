<?php
session_start();
require 'conexao.php';

if (isset($_POST['savebook'])) {
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $qtd = mysqli_real_escape_string($conexao, trim($_POST['qtd']));
    $date = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $editora = mysqli_real_escape_string($conexao, trim($_POST['editora']));
    $situacao = mysqli_real_escape_string($conexao, trim($_POST['situacao']));
    $obs = mysqli_real_escape_string($conexao, trim($_POST['observacoes']));

    $sql = "INSERT INTO livros (titulo, quantidade, data_pub, autor, editora, situacao, observacao) 
            VALUES ('$titulo', '$qtd', '$date', '$autor', '$editora', '$situacao', '$obs')";

    mysqli_query($conexao, $sql);

    header('Location: ../view/lista.php');
}
?>