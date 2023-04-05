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
    function inserirEstudante($primeiraLinha, $dadosExcel){
        while($linha = fgetcsv($dadosExcel, 1000, ";")){
        
            // Vê se está na primeira linha (cabeçalho Excel) e pula ela
            if($primeiraLinha){
                $primeiraLinha = false;
                continue;
            }
    
            // Chama função para converter caracteres especiaisa
            array_walk_recursive($linha, 'converterCaracteresEspeciais');
    
            // Cria conexão e executa as instruções de inserção no banco
            $stmt = $this->con->prepare("insert into estudante (matricula, nome, telefone, cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso)
                                         values (?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("sssssssss", $linha[0], $linha[1], $linha[2], $linha[3], $linha[4], $linha[5], $linha[6], $linha[7], $linha[8]);
            $stmt->execute();
            echo "$dadosExcel";
        }
    }
    function inserirEstudanteCRUD($matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso){
        $stmt = $this->con->prepare("insert into estudante (matricula, nome, telefone, cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso)
        values (?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssssss",$matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso);
        $stmt->execute();
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
            $tabela .= "<td><a href='novosDados.php?id=$id&nome=$nome&email=$email&telefone=$telefone'>Alterar</a></td>";
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
            $tabela .= "<td><a href='novosDadosEmpresa.php?cnpj=$cnpj&nome=$nomeEmpresa&endereco=$endereco&telefone=$telefone'>Alterar</a></td>";
        }
        return $tabela;
    }
    function mostrarCursos(){
        $stmt = $this->con->prepare("select * from curso;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $combo = " <select name='cursos' id='cursos'>";
        while($linha = $resultado->fetch_object()){
            $nome = $linha->nome_curso;
            $cod = $linha->cod_curso;
            $combo .= "<option value='$cod'>$nome</option>";
        }
        $combo .= "</section>";
        return $combo;
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
        header("Location: supervisor.php");
    }    
    function alterarEmpresa($cnpj,$nome,$endereco,$telefone){
        $stmt = $this->con->prepare("update empresa set nome_empresa = '$nome', endereco = '$endereco', telefone_empresa = '$telefone' where cnpj = ?");
        $stmt->bind_param("s", $cnpj);
        $stmt->execute();
        header("Location: empresa.php");
    }
}
		
?>