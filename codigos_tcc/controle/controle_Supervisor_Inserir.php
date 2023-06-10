<?php
    require_once("../modelo/Supervisor.php");
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $cargo = $_GET['cargo'];

    $sup = new Supervisor();

    $sup->inserirSupervisor($nome, $email, $telefone, $cargo);
?>