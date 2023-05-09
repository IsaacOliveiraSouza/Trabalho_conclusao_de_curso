<?php
    include "conexaoBD.php";
    $contrato = new Banco();
    $matricula = $_GET['matricula'];
    $cnpj = $_GET['cnpj'];
    $dataInicio = $_GET['dataInicio'];
    $cargaHorariaDia = $_GET['cargaHorariaDia'];
    $dataFim = $_GET['dataFim'];
    $supervisor = $_GET['supervisores'];
    $apolice = $_GET['apolice'];
    $contrato->inserirContrato($matricula,  $cnpj, $dataInicio, $cargaHorariaDia, $dataFim, $supervisor, $apolice)
?>