<?php
require_once("Banco.php");
class Contrato{
    function inserirContrato($matricula,  $cnpj, $dataInicio, $cargaHorariaDia, $dataFim, $supervisor, $apolice){
        $banco = new Banco();

        $dataInicio = date('d/m/Y', strtotime($dataInicio));
        $dataFim = date('d/m/Y', strtotime($dataFim));

        $stmt = $banco->getCon()->prepare("insert into contrato(matricula_aluno, cnpj_empresa, data_inicio, carga_horaria_dia, data_fim_contrato, codsupervisor, apolice) values (?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssss",$matricula,  $cnpj, $dataInicio, $cargaHorariaDia, $dataFim, $supervisor, $apolice);
        $stmt->execute();
        header("Location: ../front/contrato.php");
    } 

    function comboContratos($matricula_aluno){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from contrato where matricula_aluno = ?");
        $stmt->bind_param("s", $matricula_aluno);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $combo = "<label for='contratos'>Selecione o contrato referido: </label>";
        $combo .= "<select name='contratos' id='contratos'>";
        while($linha = $resultado->fetch_object()){
            $dado = $linha->cnpj_empresa;
            $dado .= " - " . $linha->data_inicio;
            $id_contrato = $linha->id_contrato;
            $combo .= "<option value='$id_contrato'>$dado</option>";
        }   
        $combo .= "</select><br>";
        return $combo;
    }
}
?>