<?php
include "conexaoBD.php";
$empresa = new Banco;
$cnpj = $_POST['cnpj'];
$telefone = $_POST['telefone'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$alterar = $empresa->alterarEmpresa($cnpj,$nome,$endereco,$telefone);
?>