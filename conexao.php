<?php 
$host="localhost";
$port=3307;
$socket="";
$user="root";
$password="root";
$dbname="estoque";

try {
    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>