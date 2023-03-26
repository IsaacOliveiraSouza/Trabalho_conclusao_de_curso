<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Supervisor</title>
</head>
<body>
<form action="controleSupervisor.php" method="get">
        <input type="text" placeholder="Nome:" id="nome" name="nome">
        <input type="email" placeholder="Email:" id="email" name="email">
        <input type="text" placeholder="telefone:" id="telefone" name="telefone">
        <input type="submit">
    </form>
    <button><a href=""></a></button>
</body>
</html>
<?php
include "conexaoBD.php";
    $sup = new Banco;
    $tbl = $sup->mostrarSurpevisores();
    echo $tbl
?>