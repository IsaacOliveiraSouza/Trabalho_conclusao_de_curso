<?php
    include "conexaoBD.php";
    $sup = new Banco;
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $nome = $_GET['nome'];
    $novo = $sup->inserirSupervisor($nome, $email, $telefone);
?>