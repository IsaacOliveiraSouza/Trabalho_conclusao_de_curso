<?php
    require_once("../modelo/Empresa.php");

    $empresa = new Empresa();
    
    $vetor = $empresa->listarEmpresas();
    
   // echo json_encode($vetor);
?>