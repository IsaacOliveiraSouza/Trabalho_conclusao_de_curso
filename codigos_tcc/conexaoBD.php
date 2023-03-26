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

	function inserirSupervisor($nome, $email, $telefone){

        $stmt = $this->con->prepare("insert into supervisor(telefone, email, nome) values (?,?,?);");
        $stmt->bind_param("sss", $telefone, $email, $nome);
        $stmt->execute();
        header("Location: supervisor.php");
	}  
    
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

    function excluirSupervisor($id){
        $stmt = $this->con->prepare("delete from supervisor where cod_supervisor = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header("Location: supervisor.php");
    }
}
		
?>