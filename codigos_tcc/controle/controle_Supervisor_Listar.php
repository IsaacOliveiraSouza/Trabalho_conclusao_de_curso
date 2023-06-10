<?php
    require_once("../modelo/Supervisor.php");

    $sup = new Supervisor();
    
    $vetor = $sup->listarSupervisores();
    
    echo json_encode($vetor);


?>