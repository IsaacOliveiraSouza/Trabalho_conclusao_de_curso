<?php
    include "conexaoBD.php";
    $sup = new Banco;
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $nome = $_GET['nome'];
    $cargo = $_GET['cargo'];
    $novo = $sup->inserirSupervisor($nome, $email, $telefone, $cargo);
?>