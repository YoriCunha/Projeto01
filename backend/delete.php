<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM livros WHERE id_livro=$id";
    mysqli_query($conexao, $sql);
    header("Location: ../view/lista.php");
}
?>
