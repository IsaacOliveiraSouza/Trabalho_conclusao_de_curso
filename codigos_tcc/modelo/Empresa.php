<?php
require_once("Banco.php");
class Empresa implements JsonSerializable {
    private $cnpj;
    private $nome_empresa;
    private $endereco;
    private $telefone_empresa;

    function inserirEmpresa($cnpj, $nome, $endereco, $telefone){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("insert into empresa(cnpj, nome_empresa, endereco, telefone_empresa) values (?,?,?,?);");
        $stmt->bind_param("ssss", $cnpj, $nome, $endereco, $telefone);
        $stmt->execute();
        header("Location: ../front/empresa.php");
    } 

    public function jsonSerialize() {
        
        $vetorEmpresa['cnpj']      =   $this->getCNPJ();
        $vetorEmpresa['nome']      =   $this->getNomeEmpresa();
        $vetorEmpresa['telefone']  =   $this->getTelefone();
        $vetorEmpresa['endereco']  =   $this->getEndereco();
        return $vetorEmpresa;
    }
    public function unserialize($data) {}
    function listarEmpresas(){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from empresa;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $vetorSupervisor = array();
        $i=0;
        while($linha = $resultado->fetch_object()){
            $vetorSupervisor[$i] = new Empresa();
            $vetorSupervisor[$i]->setCNPJ($linha->cnpj);
            $vetorSupervisor[$i]->setNomeEmpresa($linha->nome_empresa);
            $vetorSupervisor[$i]->setTelefone($linha->endereco);
            $vetorSupervisor[$i]->setEndereco($linha->telefone_empresa);
            $i++;
        }
       
        return $vetorSupervisor;
    }

    function mostrarEmpresas(){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from empresa;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $tabela = "<table border='1'>";
        while($linha = $resultado->fetch_object()){
            $cnpj = $linha->cnpj;
            $nomeEmpresa = $linha->nome_empresa;
            $endereco = $linha->endereco;
            $telefone = $linha->telefone_empresa;
            $tabela .= "<tr>";
            $tabela .= "<td>$cnpj</td>"; 
            $tabela .= "<td>$nomeEmpresa</td>";
            $tabela .= "<td>$endereco</td>";
            $tabela .= "<td>$telefone</td>";
            $tabela .= "<td><a href='../controle/controle_Excluir_Empresa.php?cnpj=$cnpj'>Excluir</a></td>";
            $tabela .= "<td><a href='../front/novos_Dados_Empresa.php?cnpj=$cnpj&nome=$nomeEmpresa&endereco=$endereco&telefone=$telefone'>Alterar</a></td>";
        }
        return $tabela;
    }

    function excluirEmpresa($cnpj){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("delete from empresa where cnpj = ?;");
        $stmt->bind_param("s", $cnpj);
        $stmt->execute();
        header("Location: ../front/empresa.php");
    }

    function alterarEmpresa($cnpj,$nome,$endereco,$telefone){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("update empresa set nome_empresa = ?, endereco = ?, telefone_empresa = ? where cnpj = ?");
        $stmt->bind_param("ssss", $nome,$endereco,$telefone,$cnpj);
        $stmt->execute();
        header("Location: ../front/empresa.php");
    }

    public function getCNPJ(){
        return $this->cnpj;
    }
    public function setCNPJ($cnpj){
        $this->cnpj = $cnpj;
    }

    public function getNomeEmpresa(){
        return $this->nome_empresa;
    }
    public function setNomeEmpresa($nome_empresa){
        $this->nome_empresa = $nome_empresa;
    }

    public function getTelefone(){
        return $this->telefone_empresa;
    }
    public function setTelefone($telefone){
        $this->telefone_empresa = $telefone;
    }

    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}
?>