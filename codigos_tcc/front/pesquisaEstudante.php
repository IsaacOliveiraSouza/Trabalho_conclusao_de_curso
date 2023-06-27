<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudante</title>
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


    <h2>Situações estudante: </h2>
    <?php
        require_once("../modelo/Banco.php");
        require_once("../modelo/Estudante.php");
        require_once("../modelo/Situacao.php");
        $pesquisaMatricula = $_GET['pesquisaMatricula'];
        $banco = new Banco();

        // Dados do aluno
        $estudante = new Estudante();
        $estudante->pesquisarAluno($pesquisaMatricula);

        // Situações do aluno
        $situacao = new Situacao();
        $situacao->pesquisarSituacoesAluno($pesquisaMatricula);
    ?>

    <h2>Adicionar novas situações para o aluno</h2><br>
    <form action="../controle/controle_Inserir_Situacao.php" method="get">

        <label for="situacao">Situação: </label>
        <select id="situacao" name="situacao">
            <option value="Indeferido">Indeferido</option>
            <option value="Deferido">Deferido</option>
        </select><br>
        <label for="dataSituacao">Data de registro: </label>
        <input type="date" name="dataSituacao" id="dataSituacao" placeholder="Data de registro"><br>
        <?php
            require_once("../modelo/Contrato.php");
            $pesquisaMatricula = $_GET['pesquisaMatricula'];
            $input = "<input type='hidden' name='pesquisaMatricula' id='pesquisaMatricula' value='$pesquisaMatricula'>";
            echo $input;
            $contrato = new Contrato();
            $comboContratos = $contrato->comboContratos($pesquisaMatricula);
            echo $comboContratos;
        ?>
        <textarea name="descricao" id="descricao" placeholder="Descrição" cols="50" rows="5"></textarea><br>

        <input type="submit">
    </form>
</body>
</html>