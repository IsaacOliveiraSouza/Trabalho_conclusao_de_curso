<!DOCTYPE html>
<html lang="en">
<head>
    <!-- matricula, nome, telefone,
     cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso) -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Supervisor</title>
</head>
<body>
<form action="controleEmpresa.php" method="get">
        <input type="text" placeholder="CNPJ:" id="cnpj" name="cnpj">
        <input type="text" placeholder="Nome da Empresa:" id="nome" name="nome">
        <input type="endereco" placeholder="endereco:" id="endereco" name="endereco">
        <input type="text" placeholder="telefone:" id="telefone" name="telefone">
        <input type="submit">
    </form>
</body>
</html>
<?php
include "conexaoBD.php";
    $empresa = new Banco;
    $tbl = $empresa->mostrarEmpresas();
    echo $tbl
?>