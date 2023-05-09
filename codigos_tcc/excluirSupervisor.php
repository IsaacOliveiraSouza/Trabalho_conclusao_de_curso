<?php
include "conexaoBD.php";
$sup = new Banco;
$id = $_GET['id'];
$excluir = $sup->excluirSupervisor($id);
?>
