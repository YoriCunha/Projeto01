<?php
require 'conexao.php';

if (isset($_POST['editbook'])) {

    // Nome CORRETO do campo do formulário:
    $id = mysqli_real_escape_string($conexao, $_POST['id_livro']);

    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $qtd = mysqli_real_escape_string($conexao, $_POST['quantidade']);
    $data = mysqli_real_escape_string($conexao, $_POST['data']);
    $autor = mysqli_real_escape_string($conexao, $_POST['autor']);
    $editora = mysqli_real_escape_string($conexao, $_POST['editora']);
    $situacao = mysqli_real_escape_string($conexao, $_POST['situacao']);
    $obs = mysqli_real_escape_string($conexao, $_POST['observacoes']);
    $sinopse = mysqli_real_escape_string($conexao, $_POST['sinopse']);
    $genero = mysqli_real_escape_string($conexao, $_POST['genero']);
    $faixa = mysqli_real_escape_string($conexao, $_POST['faixa']);
    $local = mysqli_real_escape_string($conexao, $_POST['local']);

    // COMEÇO DO UPDATE
    $sql = "UPDATE livros SET 
        titulo='$titulo',
        quantidade='$qtd',
        data_pub='$data',
        autor='$autor',
        editora='$editora',
        situacao='$situacao',
        observacao='$obs',
        sinopse='$sinopse',
        genero='$genero',
        faixa='$faixa',
        localizacao='$local'";

    // Se enviou nova imagem
    if (!empty($_FILES['imagem']['name'])) {

        $imagem = basename($_FILES['imagem']['name']);
        $destino = "../uploads/" . $imagem;

        move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);

        $sql .= ", imagem='$imagem'";
    }

    // ID CORRETO
    $sql .= " WHERE id_livro='$id'";

    mysqli_query($conexao, $sql);

    header("Location: ../view/lista.php");
    exit;
}
?>