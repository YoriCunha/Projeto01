<?php
require 'conexao.php';

if (isset($_POST['editclient'])) {

    // Nome CORRETO do campo do formulário:
    $id = mysqli_real_escape_string($conexao, $_POST['id_clientes']);

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);

    // COMEÇO DO UPDATE
    $sql = "UPDATE clientes SET 
        nome='$nome',
        email='$email',
        telefone='$telefone',
        endereco='$endereco'
        WHERE id_clientes='$id'";

    mysqli_query($conexao, $sql);

    header("Location: ../view/clientes.php");
    exit;
}