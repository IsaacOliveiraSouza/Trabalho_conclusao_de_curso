<!DOCTYPE html>
<html lang="en">
<head>
    <!-- matricula, nome, telefone,
     cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso) -->
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Supervisor</title>
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
<form action="../controle/controle_Inserir_Empresa.php" method="get">
        <input type="text" placeholder="CNPJ:" id="cnpj" name="cnpj">
        <input type="text" placeholder="Nome da Empresa:" id="nome" name="nome">
        <input type="endereco" placeholder="endereco:" id="endereco" name="endereco">
        <input type="text" placeholder="telefone:" id="telefone" name="telefone">
        <input type="submit">
    </form>
</body>
</html>
<?php
include "../controle/controle_Listar_Empresa.php";
    $empresa = new Empresa;
    $tbl = $empresa->mostrarEmpresas();
    echo $tbl
?>