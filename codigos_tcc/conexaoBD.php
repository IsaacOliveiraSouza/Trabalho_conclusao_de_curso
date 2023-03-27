<?php
class Banco{
	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $dbname = "tcc_teste1";
	private $con = null;

	function __construct(){	
            $this->con = new mysqli($this->servidor, $this->usuario, $this->senha,$this->dbname);
    }
    //funcoes de inserir
	function inserirSupervisor($nome, $email, $telefone){

        $stmt = $this->con->prepare("insert into supervisor(telefone, email, nome) values (?,?,?);");
        $stmt->bind_param("sss", $telefone, $email, $nome);
        $stmt->execute();
        header("Location: supervisor.php");
	} 	
    function inserirEmpresa($cnpj, $nome, $endereco, $telefone){

        $stmt = $this->con->prepare("insert into empresa(cnpj, nome_empresa, endereco, telefone_empresa) values (?,?,?,?);");
        $stmt->bind_param("ssss", $cnpj, $nome, $endereco, $telefone);
        $stmt->execute();
        header("Location: empresa.php");
	}  

    
    //funcoes de mostrar
    function mostrarSurpevisores(){
        $stmt = $this->con->prepare("select * from supervisor;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $tabela = "<table border='1'>";
        while($linha = $resultado->fetch_object()){
            $nome = $linha->nome;
            $email = $linha->email;
            $telefone = $linha->telefone;
            $id = $linha->cod_supervisor;//ta escrito errado no banco tbm
            $tabela .= "<tr>";
            $tabela .= "<td>$nome</td>"; 
            $tabela .= "<td>$email</td>";
            $tabela .= "<td>$telefone</td>";
            $tabela .= "<td><a href='excluirSupervisor.php?id=$id'>Excluir</a></td>";
            $tabela .= "<td><a href='novosDados.php?id=$id'>Alterar</a></td>";
        }
        return $tabela;
    }   
     function mostrarEmpresas(){
        $stmt = $this->con->prepare("select * from empresa;");
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
            $tabela .= "<td><a href='excluirEmpresa.php?cnpj=$cnpj'>Excluir</a></td>";
            $tabela .= "<td><a href='novosDadosEmpresa.php?cnpj=$cnpj'>Alterar</a></td>";
        }
        return $tabela;
    }

    //funcoes de excluir
    function excluirSupervisor($id){
        $stmt = $this->con->prepare("delete from supervisor where cod_supervisor = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header("Location: supervisor.php");
    }   
     function excluirEmpresa($cnpj){
        $stmt = $this->con->prepare("delete from empresa where cnpj = ?;");
        $stmt->bind_param("s", $cnpj);
        $stmt->execute();
        header("Location: empresa.php");
    }


    //funcoes de alterar
    function alterarSupervisor($id,$nome,$email,$telefone){
        $stmt = $this->con->prepare("update supervisor set nome = '$nome', email = '$email', telefone = '$telefone' where cod_supervisor = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
}
		
?>