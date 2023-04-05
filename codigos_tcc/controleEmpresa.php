<?php
    include "conexaoBD.php";
    $empresa = new Banco;
    $cnpj = $_GET['cnpj'];
    $telefone = $_GET['telefone'];
    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $novo = $empresa->inserirEmpresa($cnpj, $nome, $endereco, $telefone);
?>