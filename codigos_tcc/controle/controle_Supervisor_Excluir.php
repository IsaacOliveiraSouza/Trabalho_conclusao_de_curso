<?php
    require_once("../modelo/Supervisor.php");
    $id = $_GET['id'];
    
    $sup = new Supervisor();
    $sup->excluirSupervisor($id);
?>