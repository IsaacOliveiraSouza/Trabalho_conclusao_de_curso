<?php
    require_once("../modelo/Supervisor.php");
    $sup = new Supervisor();
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];
    $excluir = $sup->alterarSupervisor($id, $nome, $email, $telefone, $cargo);
?>