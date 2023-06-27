<?php
    require_once("../modelo/Estudante.php");
    $arquivo = $_FILES['arquivo'];

    $estudante = new Estudante();
    $estudante->inserirEstudanteCSV($arquivo);
    header("Location: ../front/Estudante.php");
?>