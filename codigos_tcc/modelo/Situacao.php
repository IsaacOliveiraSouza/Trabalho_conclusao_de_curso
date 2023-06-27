<?php
require_once("Banco.php");
class Situacao implements JsonSerializable {
    private $id_situacao;
    private $situacao;
    private $data_situacao;
    private $descricao;
    private $id_contrato;
    private $matricula_estudante;

    public function jsonSerialize() {
        
        $vetorEmpresa['id_situacao']            =   $this->getId();
        $vetorEmpresa['situacao']               =   $this->getSituacao();
        $vetorEmpresa['data_situacao']          =   $this->getDataSituacao();
        $vetorEmpresa['descricao']              =   $this->getDescricao();
        $vetorEmpresa['id_contrato']            =   $this->getIdContrato();
        $vetorEmpresa['matricula_estudante']    =   $this->getMatriculaAluno();
        return $vetorEmpresa;
    }
    public function unserialize($data) {}

    function inserirSituacao($situacao, $dataSituacao, $descricao, $id_contrato, $matricula_estudante){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("insert into situacao (situacao, data_situacao, descricao, id_contrato, matricula_estudante) values (?,?,?,?,?);");
        $stmt->bind_param("sssss", $situacao, $dataSituacao, $descricao, $id_contrato, $matricula_estudante);
        $stmt->execute();
        header("Location: ../front/pesquisaEstudante.php?pesquisaMatricula=$matricula_estudante");
    }

    function pesquisarSituacoesAluno($matricula_aluno){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from situacao where matricula_estudante = ?;");
        $stmt->bind_param("s", $matricula_aluno);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $sit = "<h2>Situações do aluno</h2><br>";
        $sit .= "<table border='1'>";
        $sit .= "<tr>
                    <td>Situação</td>
                    <td>Data de registro</td>
                    <td>Descrição</td>
                 </tr>";
        while($linha = $resultado->fetch_object()){
            $sit .= "<tr><td>$linha->situacao</td>";
            $sit .= "<td>$linha->data_situacao</td>";
            $sit .= "<td>$linha->descricao</td></tr>";
        } 
        $sit .= "</table><br>";
        echo $sit;
    }

    public function getId(){
        return $this->id_situacao;
    }
    public function setId($id_situacao){
        $this->id_situacao = $id_situacao;
    }

    public function getSituacao(){
        return $this->situacao;
    }
    public function setSituacao($situacao){
        $this->situacao = $situacao;
    }

    public function getDataSituacao(){
        return $this->data_situacao;
    }
    public function setDataSituacao($data_situacao){
        $this->data_situacao = $data_situacao;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getIdContrato(){
        return $this->id_contrato;
    }
    public function setIdContrato($id_contrato){
        $this->id_contrato = $id_contrato;
    }

    public function getMatriculaAluno(){
        return $this->matricula_estudante;
    }
    public function setMatriculaAluno($matricula_estudante){
        $this->matricula_estudante = $matricula_estudante;
    }
}
?>