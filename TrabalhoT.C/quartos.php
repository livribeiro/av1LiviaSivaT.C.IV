
<?php

	require_once('conexao.php');

	if(isset($_POST['numero']) && $_POST['numero'] != ""){

		$id = $_POST['id'];
		$numero = $_POST['numero'];
		$tipo = $_POST['tipo'];
		$valor = $_POST['valor'];
		$status = $_POST['status'];

		if($id == ""){
			$sql = "insert into quartos (numero, tipo, valor, status)
				values ('$numero', '$tipo', '$valor', '$status')
			";
		}else{
			$sql = "update quartos set numero = '$numero', tipo = '$tipo', valor = '$valor', status = '$status', 
					where id = ".$id;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $id==""){
			$_GET['msg'] = 'Dados cadastrados com sucesso!';
			$_POST = null;
		}elseif($resultado && $id!=""){
			$_GET['msg'] = 'Dados modificados com sucesso!';
			$_POST = null;
		}elseif(!$resultado){
			$_GET['msg'] = 'Falha ao cadastrar a mensagem';
		}
	}
	
	if(isset($_GET['msg']) && $_GET['msg'] != ""){
		echo $_GET['msg'];
	}
 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Quartos</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<?php include_once("index.php"); ?>
    <h2 align=center> Quartos Cadastrados</h2>
    <table border=1 width=80% align=center><tr>
        <td><label for="numero">Número da Porta:</label></td>
        <td><label for="tipo">Tipo de Quarto:</label></td>
        <td><label for="valor">Valor:</label></td>        
        <td><label for="status">Status:</label></td>
        <td><label for="Editar">Editar</label></td>
    </tr>

    
    <?php
    	$sql = "select id, numero, tipo, valor, status from quartos ";
		$resultado = mysqli_query($conexao, $sql);

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['numero'].'</td>
				  <td>'.$dados['tipo'].'</td>
				  <td>'.$dados['valor'].'</td>        
				  <td>'.$dados['status'].'</td>
				  <td>
					<a href="exQuartos.php?id='.$dados['id'].'">Excluir</a>
					<a href="cadQuartos.php?id='.$dados['id'].'">Editar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="cadQuartos.php">Cadastrar</a></p>
</body>
</html>