<?php
    require_once("../modelo/Empresa.php");
    $empresa = new Empresa();

    $cnpj = $_GET['cnpj'];
    $telefone = $_GET['telefone'];
    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $empresa->alterarEmpresa($cnpj, $nome, $endereco, $telefone);
?>