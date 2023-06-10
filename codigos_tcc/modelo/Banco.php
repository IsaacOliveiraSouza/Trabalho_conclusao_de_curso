<?php
class Banco{
	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $dbname = "tcc_teste1";
	private $con = null;

	function __construct(){	
           $this->conectar();
    }
    function conectar(){
        $this->con = new mysqli($this->servidor, $this->usuario, $this->senha,$this->dbname);
    }
    function getCon(){
       
        return $this->con;
    }
}
		
?>