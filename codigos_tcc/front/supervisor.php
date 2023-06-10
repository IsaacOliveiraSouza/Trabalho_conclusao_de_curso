<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Supervisor</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<form action="../controle/controle_Supervisor_Inserir.php" method="get">
        <input type="text" placeholder="Nome:" id="nome" name="nome" >
        <input type="email" placeholder="Email:" id="email" name="email">
        <input type="text" placeholder="telefone:" id="telefone" name="telefone">
        <input type="text" placeholder="Cargo:" id="cargo" name="cargo">
        <input type="submit">
    </form>
</body>
</html>
<?php
include "../modelo/supervisor.php";
    $sup = new Supervisor;
    $tbl = $sup->mostrarSurpevisores();
    echo $tbl
?>