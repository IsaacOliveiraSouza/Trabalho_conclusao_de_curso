<?php
    require_once("../modelo/Empresa.php");

    $cnpj = $_GET['cnpj'];
    $empresa = new Empresa();
    $empresa->excluirEmpresa($cnpj);
?>