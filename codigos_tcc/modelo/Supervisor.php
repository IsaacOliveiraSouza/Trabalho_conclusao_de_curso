<?php
require_once("Banco.php");
class Supervisor implements JsonSerializable {
    private $cod_supervidor;
    private $telefone;
    private $email;
    private $nome;
    private $cargo;
    
    public function jsonSerialize() {
        
        $vetorSupervisor['nome']        =   $this->getNome();
        $vetorSupervisor['email']       =   $this->getEmail();
        $vetorSupervisor['telefone']    =   $this->getTelefone();
        $vetorSupervisor['cod_supervisor']  =   $this->getCodSupervidor();
        $vetorSupervisor['cargo']   =   $this->getCargo();
          //print_r( $vetorSupervisor);
        return $vetorSupervisor;
    }
    public function unserialize($data) {}

    function listarSupervisores(){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from supervisor;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $vetorSupervisor = array();
        $i=0;
        while($linha = $resultado->fetch_object()){
            $vetorSupervisor[$i] = new Supervisor();
            $vetorSupervisor[$i]->setNome( $linha->nome);
            $vetorSupervisor[$i]->setEmail($linha->email);
            $vetorSupervisor[$i]->setTelefone($linha->telefone);
            $vetorSupervisor[$i]->setCodSupervidor($linha->cod_supervisor);
            $vetorSupervisor[$i]->setCargo($linha->cargo);
            $i++;
        }
       
        return $vetorSupervisor;
   }

    function inserirSupervisor($nome, $email, $telefone, $cargo){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("insert into supervisor(telefone, email, nome, cargo) values (?,?,?,?);");
        $stmt->bind_param("ssss", $telefone, $email, $nome, $cargo);
        $stmt->execute();
        header("Location: ../front/supervisor.php");
    } 	

    function mostrarSurpevisores(){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from supervisor;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $tabela = "<table border='1'>";
        while($linha = $resultado->fetch_object()){
            $nome = $linha->nome;
            $email = $linha->email;
            $telefone = $linha->telefone;
            $id = $linha->cod_supervisor;
            $cargo = $linha->cargo;
            $tabela .= "<tr>";
            $tabela .= "<td>$nome</td>"; 
            $tabela .= "<td>$email</td>";
            $tabela .= "<td>$telefone</td>";
            $tabela .= "<td>$cargo</td>";
            $tabela .= "<td><a href='../controle/controle_Supervisor_Excluir.php?id=$id'>Excluir</a></td>";
            $tabela .= "<td><a href='../front/novosDados.php?id=$id&nome=$nome&email=$email&telefone=$telefone&cargo=$cargo'>Alterar</a></td>";
        }
        return $tabela;
    }

    function excluirSupervisor($id){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("delete from supervisor where cod_supervisor = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header("Location: ../front/supervisor.php");
    }   

    function alterarSupervisor($id,$nome,$email,$telefone, $cargo){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("update supervisor set nome = '$nome', email = '$email', telefone = '$telefone', cargo = '$cargo' where cod_supervisor = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header("Location: ../front/supervisor.php");
    }   
    
    
    function comboSupervisores(){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from supervisor");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $combo = "<select name='supervisores' id='supervisores'>";
        while($linha = $resultado->fetch_object()){
            $nome = $linha->nome;
            $cod = $linha->cod_supervisor;
            $combo .= "<option value='$cod'>$nome</option>";
        }
        $combo .= "</select>";
        return $combo;
    }
    /**
     * Get the value of cod_supervidor
     */
    public function getCodSupervidor()
    {
        return $this->cod_supervidor;
    }

    /**
     * Set the value of cod_supervidor
     */
    public function setCodSupervidor($cod_supervidor): self
    {
        $this->cod_supervidor = $cod_supervidor;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone($telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set the value of cargo
     */
    public function setCargo($cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }
}

?>