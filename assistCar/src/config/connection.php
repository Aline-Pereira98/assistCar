<?php

$servername = "000.0.0.0";
$username = "usuario_do_seu_banco";
$password = "senha_do_seu_banco";
$dbname = "nome_do_seu_banco";

$conn = new mysqli(
    $servername, 
    $username, 
    $password, 
    $dbname
);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
