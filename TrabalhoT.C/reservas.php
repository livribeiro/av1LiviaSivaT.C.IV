<?php

require_once('conexao.php');

if (isset($_POST['id_quartos']) && $_POST['id_quartos'] != "") {
	$id_quartos = $_POST['id_quartos'];
	$sql = " select valor from quartos where id = " . $id_quartos .  "";
	$resultado = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_array($resultado);
	$valor = $dados['valor'];
}

if (isset($_POST['id_clientes']) && $_POST['id_clientes'] != "") {
	$id = $_POST['id'];
	$id_clientes = $_POST['id_clientes'];
	$data_entrada = $_POST['data_entrada'];
	$data_saida = $_POST['data_saida'];
	$diferenca = strtotime($data_saida) - strtotime($data_entrada);
	$dias = floor($diferenca / (60 * 60 * 24));

	$valor_reserva = $dias * $valor;
	$status_reserva = $_POST['status_reserva'];
	$datahora_status = date('Y/m/d H:i');

	if ($id == "") {
		$sql = "insert into reservas (id_quartos, id_clientes, data_entrada, data_saida, valor_reserva, status_reserva, datahora_status )
				values ('$id_quartos', '$id_clientes', '$data_entrada', '$data_saida', '$valor_reserva', '$status_reserva', '$datahora_status')
			";
	} else {
		$sql = "update reservas set id_quartos = '$id_quartos', id_clientes = '$id_clientes', data_entrada = '$data_entrada', data_saida = '$data_saida', valor_reserva = '$valor_reserva', status_reserva = '$status_reserva', datahora_status = '$datahora_status'
					where id = " . $id;
	}

	$resultado = mysqli_query($conexao, $sql);

	if ($resultado && $id == "") {
		$_GET['msg'] = 'Dados inseridos com sucesso';
		$_POST = null;
	} elseif ($resultado && $id != "") {
		$_GET['msg'] = 'Dados alterados com sucesso';
		$_POST = null;
	} elseif (!$resultado) {
		$_GET['msg'] = 'Falha ao inserir a mensagem';
	}
}

if (isset($_GET['msg']) && $_GET['msg'] != "") {
	echo $_GET['msg'];
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Pousada</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
	<?php include_once("index.php"); ?>
	<h2 align=center>Reservas:</h2>

	<table border=1 width=80% align=center>
		<tr>
			<td><label for="numero">Número do quarto:</label></td>
			<td><label for="nome_cliente">Nome do cliente:</label></td>
			<td><label for="data_entrada">Data de Entrada:</label></td>
			<td><label for="data_saida">Data de Saída:</label></td>
			<td><label for="valor_reserva">Valor da Reserva:</label></td>
			<td><label for="status_reserva">Status da Reserva:</label></td>
			<td><label for="datahora_status">Data/Hora Status da Reserva:</label></td>
			<td><label for="acoes">Editar</label></td>
		</tr>

		<?php
		//$sql = "select r. *,q.numero,c.nome_cliente ";
		$sql = "select r.*, q.numero, c.nome_cliente from reservas as r left join quartos as q on r.id_quartos = q.id left join clientes as c on r.id_clientes = c.id";
		$resultado = mysqli_query($conexao, $sql);

		while ($dados = mysqli_fetch_array($resultado)) {
			echo '<tr><td>' . $dados['numero'] . '</td>
				  <td>' . $dados['nome_cliente'] . '</td>
				  <td>' . $dados['data_entrada'] . '</td>        
					<td>' . $dados['data_saida'] . '</td>
					<td>' . $dados['valor_reserva'] . '</td>
					<td>' . $dados['status_reserva'] . '</td>
					<td>' . $dados['datahora_status'] . '</td>
				  <td>
					<a href="cadReserva.php?id=' . $dados['id'] . '">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

		?>

	</table>
</body>

</html>