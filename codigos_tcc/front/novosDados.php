<!DOCTYPE html>
<html lang="en">
<head>
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
        
    </header><br>
</body>
</html>
<?php
$id = $_GET['id'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$telefone = $_GET['telefone'];
$cargo = $_GET['cargo'];
$html = "<form action='../controle/controle_Supervisor_alterar.php' method='post'>";
$html .= "<input type='hidden' id='id' name='id' value='$id'>";
$html .= "<input type='text' placeholder='Nome:' id='nome' name='nome' value='$nome'>";
$html .= "<input type='email' placeholder='email:' id='email' name='email' value='$email'>";
$html .= "<input type='text' placeholder='Telefone:' id='telefone' name='telefone' value='$telefone'>";
$html .= "<input type='text' placeholder='Cargo:' id='cargo' name='cargo' value='$cargo'>";
$html .="<input type='submit'>";
$html .="</form>";
echo $html;
?>