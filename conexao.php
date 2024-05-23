<?php
$hostname = "localhost";
$dbname = "cadastro_clientes";
$username = "root";
$password = "";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
//$conn->close();
?>
