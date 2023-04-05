<?php
    include "conexaoBD.php";
    $estudante = new Banco;
    $matricula = $_GET['matricula'];
    $nome = $_GET['nome'];
    $telefone = $_GET['telefone'];
    $cpf = $_GET['cpf'];
    $anoConclusao = $_GET['ano'];
    $cep = $_GET['cep'];
    $numeroCasa = $_GET['numero'];
    $complemento = $_GET['complemento'];
    $curso = $_GET['cursos'];
    $novo = $estudante->inserirEstudanteCRUD($matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso);
?>