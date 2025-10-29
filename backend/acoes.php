<?php
require 'conexao.php';

if (isset($_POST['savebook'])) {
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $qtd = mysqli_real_escape_string($conexao, trim($_POST['qtd']));
    $data = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $editora = mysqli_real_escape_string($conexao, trim($_POST['editora']));
    $situacao = mysqli_real_escape_string($conexao, trim($_POST['situacao']));
    $obs = mysqli_real_escape_string($conexao, trim($_POST['observacoes']));
    $sinopse = mysqli_real_escape_string($conexao, trim($_POST['sinopse']));
    $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
    $faixa = mysqli_real_escape_string($conexao, trim($_POST['faixa']));
    $local = mysqli_real_escape_string($conexao, trim($_POST['local']));

    $pasta = "../img/";
    $nomeImagem = $_FILES['imagem']['name'];
    $caminho = $pasta . basename($nomeImagem);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
        $sql = "INSERT INTO livros 
                (titulo, quantidade, data_pub, autor, editora, situacao, observacao, faixa, localizacao, sinopse, genero, imagem) 
                VALUES 
                ('$titulo', '$qtd', '$data', '$autor', '$editora', '$situacao', '$obs', '$faixa', '$local', '$sinopse', '$genero', '$caminho')";
        mysqli_query($conexao, $sql);
        header("Location: ../view/lista.php");
    } else {
        echo "Erro ao enviar imagem.";
    }
}
?>