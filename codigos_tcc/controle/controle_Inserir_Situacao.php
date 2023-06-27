<?php
    require_once("../modelo/Situacao.php");
    $situacao = $_GET['situacao'];
    $dataSituacao = $_GET['dataSituacao'];
    $descricao = $_GET['descricao'];
    $id_contrato = $_GET['contratos'];
    $matricula_estudante = $_GET['pesquisaMatricula'];

    $dataSituacao = date('d/m/Y', strtotime($dataSituacao));

    $objetoSituacao = new Situacao();
    $objetoSituacao->inserirSituacao($situacao, $dataSituacao, $descricao, $id_contrato, $matricula_estudante);

    
?>