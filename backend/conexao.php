<?php 
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="SqlHome321!";
$dbname="estoque";

$conexao = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>