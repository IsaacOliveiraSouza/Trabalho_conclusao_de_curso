<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contrato</title>
</head>
<body>
    <form action="controleContrato.php" method="get">
        <input type="text" name="matricula" id="matricula" placeholder="Matricula do estudante:">
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ da empresa:">
        <p>Data de Inicio do estágio: </p>
        <input type="date" name="dataInicio" id="dataInicio" placeholder="Data de Inicio do estágio:">
        <input type="text" name="cargaHorariaDia" id="cargaHorariaDia" placeholder="Carga horaria diaria:">
        <p>Data de fim do estágio: </p>
        <input type="date" name="dataFim" id="dataFim" placeholder="Data do fim do contrato:"><br>
        <?php
            include "conexaoBD.php";
            $supervisor = new Banco();
            $tbl = $supervisor->comboSupervisores();
            echo $tbl;
        ?>
        <br>
        <input type="text" name="apolice" id="apolice" placeholder="Apolice de serviço:">
        <button type="submit">enviar</button>
    </form>
</body>
</html>