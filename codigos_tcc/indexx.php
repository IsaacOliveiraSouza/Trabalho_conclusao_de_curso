<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Excel para DB</title>
</head>
<body>
    <form action="excelParaDB.php" method="post" enctype="multipart/form-data">
        <label for="arquivo">Arquivo: </label>
        <input type="file" name="arquivo" id="arquivo" accept="text/csv"><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>