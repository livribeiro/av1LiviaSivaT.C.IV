<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br><br>
    <div class="container">
    <h2> ATENDIMENTO</h2>
        <form action="cad_atendimento.php" method="POST">
           
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome">
                    <label for="TELEFONE">Telefone: </label>
                    <input type="tel" name="TELEFONE">
                    <label for="Atividade">Atividade: </label>
                    <select name="Atividade" id="Atividade">
                            <option value="Segunda Via de Conta">Segunda Via de Conta</option>
                            <option value="Mudança de Endereço">Mudança de Endereço</option>
                            <option value="Suspensão do Serviço">Suspensão do Serviço</option>
                            <option value="Negociação de Débitos">Negociação de Débitos</option>
                        </select>
                          
            <button type="submit" class="button"> Cadastrar </button>
        </form>

</div>
        <br><br><br>
        <h4>Atendimentos</h4> <br>
        <table class="Table">
            <tr>
                <td>Id: </td>
                <td>nome: </td>
                <td>Telefone: </td>
                <td>Atividade: </td>
                <td>Registro: </td>
                <td>Atendimento: </td>
                <td>Status: </td>
                <td>Ações: </td>
            </tr>
            <?php
            include("conexao.php");
            $query = mysqli_query($conexao, "SELECT * FROM atendimentos");

            while ($result = mysqli_fetch_array($query)) {


            ?>

                <div class="container">
                    <form action="es_atendimento.php" method="POST">
                        <?= "<input type='hidden' name='ID' value='" . $result['ID'] . "'>"; ?>
                        <tr>
                            <td><?= $result["Id"]; ?></td>
                            <td><?= $result["Nome"]; ?></td>
                            <td><?= $result["Telefone"]; ?></td>
                            <td><?= $result["Atividade"]; ?></td>
                            <td> <?php if ($result["Registro"] != '') echo (new DateTime($result["Registro"]))->format('d/m/Y H:i:s'); ?></td>
                            <td>
                                <?php if ($result["Atendimento"] != '') echo (new DateTime($result["Atendimento"]))->format('d/m/Y H:i:s'); ?>
                            </td>
                            <td><?= $result["Status"]; ?></td>
                            <td>
                                <?php
                                if ($result["Status"] == "espera") {
                                    echo " <button type='submit' name='btn' value='atender' class='botao'>Atender</button>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($result["Status"] == "espera") {
                                    echo "<button type='submit' name='btn' value='cancelar' class='botao'>Cancelar</button>";
                                }
                                ?>
                            </td>
                        </tr>
                    </form>
                </div>
            <?php } ?>

        </table>

    </div>




</body>

</html>