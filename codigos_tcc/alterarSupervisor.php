<?php
include "conexaoBD.php";
$sup = new Banco;
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$excluir = $sup->alterarSupervisor($id, $nome, $email, $telefone);
?>