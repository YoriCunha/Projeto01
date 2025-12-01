<?php 
$host="localhost";
$port=3307;
$socket="";
$user="root";
$password="root";
$dbname="estoque";

$conexao = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>