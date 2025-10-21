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
    $sinopse = mysqli_real_escape_string($conexao, trim($_POST['sinopse']));
    $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));

    $sql = "INSERT INTO livros (titulo, quantidade, data_pub, autor, editora, situacao, observacao, sinopse, genero) 
            VALUES ('$titulo', '$qtd', '$date', '$autor', '$editora', '$situacao', '$obs', '$sinopse', '$genero')";

    mysqli_query($conexao, $sql);

    header('Location: ../view/lista.php');
}
?>