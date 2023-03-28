<?php
include "conexaoBD.php";
$empresa = new Banco;
$cnpj = $_GET['cnpj'];
$excluir = $empresa->excluirEmpresa($cnpj);
?>
