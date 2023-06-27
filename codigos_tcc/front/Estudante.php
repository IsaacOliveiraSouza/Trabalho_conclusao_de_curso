<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Excel para DB</title>
</head>
<body>
<header class="cabecalho">
      <nav>
          <h1><img href="index.html" src="univap.png" align="left" id="logo"> </h1> 
          <h3>SISTEMA DE CONTROLE DE DOCUMENTOS DE ESTAGIO<br></h3>
          <a href="estudante.php">ESTUDANTE</a>
          <a href="empresa.php">EMPRESA</a>
          <a href="contrato.php">CONTRATO</a>
          <a href="supervisor.php">SUPERVISOR</a><br><br>
        </nav>
        
    </header>

    
    <h2>Inserir estudante: </h2>
    <form action="../controle/controle_Inserir_Estudante.php" method="get">
        <input type="text" placeholder="Matricula:" id="matricula" name="matricula">
        <input type="text" placeholder="Nome:" id="nome" name="nome">
        <input type="text" placeholder="telefone:" id="telefone" name="telefone">
        <input type="text" placeholder="CPF:" id="cpf" name="cpf">
        <input type="text" placeholder="Ano de conclusão do curso:" id="ano" name="ano">
        <input type="text" placeholder="CEP:" id="cep" name="cep">
        <input type="text" placeholder="Numero casa:" id="numero" name="numero">
        <input type="text" placeholder="Complemento:" id="complemento" name="complemento" value="">
        <?php
            include "../modelo/Cursos.php";
            $cursos = new Cursos;
            $tbl = $cursos->mostrarCursos();
            echo $tbl
        ?>
        <input type="submit">
    </form><br>


    <h2>Ler arquivo excel com estudantes</h2>
    <form action="../controle/controle_Inserir_Estudante_CSV.php" method="post" enctype="multipart/form-data">
        <label for="arquivo">Arquivo: </label>
        <input type="file" name="arquivo" id="arquivo" accept="text/csv"><br>

        <input type="submit" value="Enviar">
    </form><br>


    <h2>Verificar/adicionar situação para algum aluno</h2>
    <form action="pesquisaEstudante.php" method="get">
        <input type="text" placeholder="Matrícula do aluno" name="pesquisaMatricula" id="pesquisaMatricula">

        <input type="submit" value="Pesquisar">
    </form>
</body>
</html>