<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Contrato</title>
</head>
<body>
<header class="cabecalho">
      <nav>
          <h1><img href="index.html" src="univap.png" align="left" id="logo"> </h1> 
          <h3>SISTEMA DE CONTROLE DE DOCUMENTOS DE ESTAGIO<br></h3>
          <a href="estudante.php">ESTUDANTE</a>
          <a href="empresa.php">EMPRESA</a>
          <a href="contrato.php">CONTRATO</a>
          <a href="supervisor.php">SUPERVISOR</a><br><br>
        </nav>
        
    </header>
    <form action="../controle/controle_Inserir_Contrato.php" method="get">
        <input type="text" name="matricula" id="matricula" placeholder="Matricula do estudante:">
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ da empresa:">
        <p>Data de Inicio do estágio: </p>
        <input type="date" name="dataInicio" id="dataInicio" placeholder="Data de Inicio do estágio:">
        <input type="text" name="cargaHorariaDia" id="cargaHorariaDia" placeholder="Carga horaria diaria:">
        <p>Data de fim do estágio: </p>
        <input type="date" name="dataFim" id="dataFim" placeholder="Data do fim do contrato:"><br>
        <?php
            include "../modelo/Supervisor.php";
            $supervisor = new Supervisor();
            $tbl = $supervisor->comboSupervisores();
            echo $tbl;
        ?>
        <br>
        <input type="text" name="apolice" id="apolice" placeholder="Apolice de serviço:">
        <button type="submit">enviar</button>
    </form>
</body>
</html>