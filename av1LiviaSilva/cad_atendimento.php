<?php

include("conexao.php");

$Nome = @$_POST["Nome"];
$Telefone = @$_POST["Telefone"];
$Atividade = @$_POST["Atividade"];
$Registro = date('Y/m/d h:m:s');
$Status = 'espera';

$sql = "INSERT INTO `atendimentos`(`Id`, `Nome`, `Telefone`, `Atividade`, `Registro`, `Status`) 
            VALUES (null,'$Nome', '$Telefone', '$Atividade', '$Registro', '$Status') ";

$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<script>alert('Cadastrado realizado com sucesso !')</script>";
    header('Location: ./atendimento.php');
} else {
    echo "<script>alert('Cadastrado realizado com sucesso !')</script>";
    header('Location: ./atendimento.php');
};
