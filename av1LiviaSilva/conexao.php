<?php

$host = "localhost";
$port = '3306';
$user = "root";
$pass = "";
$dbname = "agencia";


$conexao = mysqli_connect($host, $user, $pass, $dbname);

if (!$conexao) {
    die("Falha ao conectar com o banco de dados: " . mysqli_connect_error());
}
