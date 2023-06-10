<?php
require_once("Banco.php");
class Contrato{
    function inserirContrato($matricula,  $cnpj, $dataInicio, $cargaHorariaDia, $dataFim, $supervisor, $apolice){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("insert into contrato(matricula_aluno, cnpj_empresa, data_inicio, carga_horaria_dia, data_fim_contrato, codsupervisor, apolice) values (?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssss",$matricula,  $cnpj, $dataInicio, $cargaHorariaDia, $dataFim, $supervisor, $apolice);
        $stmt->execute();
        header("Location: contrato.php");
    } 
}
?>