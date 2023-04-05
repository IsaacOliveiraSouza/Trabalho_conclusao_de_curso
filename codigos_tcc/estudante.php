<!DOCTYPE html>
<html lang="en">
<head>
    <!-- matricula, nome, telefone,
     cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso) -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Supervisor</title>
</head>
<body>
<form action="controleEstudante.php" method="get">
        <input type="text" placeholder="Matricula:" id="matricula" name="matricula">
        <input type="text" placeholder="Nome:" id="nome" name="nome">
        <input type="text" placeholder="telefone:" id="telefone" name="telefone">
        <input type="text" placeholder="CPF:" id="cpf" name="cpf">
        <input type="text" placeholder="Ano de conclusão do curso:" id="ano" name="ano">
        <input type="text" placeholder="CEP:" id="cep" name="cep">
        <input type="text" placeholder="Numero casa:" id="numero" name="numero">
        <input type="text" placeholder="Complemento:" id="complemento" name="complemento" value="">
        <input type="submit">
        <?php
            include "conexaoBD.php";
            $cursos = new Banco;
            $tbl = $cursos->mostrarCursos();
            echo $tbl
        ?>
    </form>
</body>
</html>
