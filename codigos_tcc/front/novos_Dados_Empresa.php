<?php
    $cnpj = $_GET['cnpj'];
    $telefone = $_GET['telefone'];
    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $html = "<form action='../controle/controle_Alterar_Empresa.php' method='get'>";
    $html .= "<input type='hidden' placeholder='CNPJ:' id='cnpj' name='cnpj' value='$cnpj'>";
    $html .= "<input type='text' placeholder='Telefone:' id='telefone' name='telefone' value='$telefone'>";
    $html .= "<input type='text' placeholder='Nome:' id='nome' name='nome' value='$nome'>";
    $html .= "<input type='text' placeholder='Endereco:' id='endereco' name='endereco' value='$endereco'>";
    $html .="<input type='submit'>";
    $html .="</form>";
echo $html;
?>