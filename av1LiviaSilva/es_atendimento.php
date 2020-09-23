<?php

include("conexao.php");
$Id = $_POST["Id"];
$btn = $_POST["btn"];


if ($btn == "atender") {
    $now = date('Y/m/d h:m:s');
    $sql = "UPDATE atendimentos SET  STATUS = 'atendido', ATENDIMENTO = '$now'  WHERE Id = '$Id'";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        echo "<script>alert('Atendimento realizado com sucesso!')</script>";
        header('Location: ./atendimento.php');
    } else {
        echo "<script>alert('atendimento não realizado')</script>";
        header('Location: ./atendimento.php');
    }
} else if ($btn == 'cancelar') {
    $sql = "UPDATE atendimentos SET  STATUS = 'cancelado'  WHERE Id = '$Id'";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        echo "<script>alert('Atendimento realizado com sucesso!')</script>";
        header('Location: ./atendimento.php');
    } else {
        echo "<script>alert('Atendimento não realizado')</script>";
        header('Location: ./atendimento.php');
    }
}
