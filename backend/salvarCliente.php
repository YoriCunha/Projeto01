<?php
require 'conexao.php';

if (isset($_POST['saveclient'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));

    // Montando o SQL para inserir os dados na tabela 'cliente'
    $sql = "INSERT INTO clientes (nome, email, telefone, endereco) VALUES ('$nome', '$email', '$telefone', '$endereco')";

    // Executando a query
    if (mysqli_query($conexao, $sql)) {
        echo "Cliente cadastrado com sucesso!";
        header("Location: ../view/clientes.php");
    } else {
        echo "Erro ao cadastrar cliente: " . mysqli_error($conexao);
    }

}