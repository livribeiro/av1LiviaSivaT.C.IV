<?php

require_once('conexao.php');

$nome_cliente = '';
$documento = '';
$data_nascimento = '';
$cidade = '';
$estado = '';
$id = '';

if(isset($_GET['id']) && $_GET['id'] != ""){
  $sql = "select * from clientes where id = ".$_GET['id'];
  $resultado = mysqli_query($conexao, $sql);
  if($resultado){
     $dados = mysqli_fetch_array($resultado);
     $nome_cliente = $dados['nome_cliente'];
     $documento = $dados['documento'];
     $data_nascimento = $dados['data_nascimento'];
     $cidade = $dados['cidade'];
     $estado = $dados['estado'];
     $id = $dados['id'];
 }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário Cliente</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estiloo.css">
</head>

<body background-color = "gray">
  <?php include_once("index.php"); ?>
    <div width=60% align=center>
        <form class="formulario" method="post" action="clientes.php" align=left> 
        <p id="title"> CADASTRO DE CLIENTES</p>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="field">
                <label for="nome_cliente">Nome Completo:</label>
                <input type="text" id="nome_cliente" name="nome_cliente" value="<?php echo $nome_cliente; ?>" placeholder="Digite o nome completo*" required>
            </div>

             <div class="field">
                <label for="documento">CPF ou RG:</label>
                <input type="text" id="documento" name="documento" value="<?php echo $documento; ?>" placeholder="Digite o documento*" required>
            </div>

            <div class="field">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $data_nascimento; ?>" placeholder="Digite a data de nascimento*" required>
            </div>        

            <div class="field">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>" placeholder="Digite a cidade*" required>
            </div>

            <div class="field">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?php echo $estado; ?>" placeholder="Digite o estado*" required>
            </div>

            <input type="submit" name="clientes" value="Enviar">
        </form>
    </div>
</body>
</html>