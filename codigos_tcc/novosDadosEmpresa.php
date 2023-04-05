<?php
$cnpj = $_GET['cnpj'];
$telefone = $_GET['telefone'];
$nome = $_GET['nome'];
$endereco = $_GET['endereco'];;
$html = "<form action='alterarEmpresa.php' method='post'>";
$html .= "<input type='hidden' id='cnpj' name='cnpj' value='$cnpj'>";
$html .= "<input type='text' placeholder='Nome da Empresa:' id='nome' name='nome' value='$nome'>";
$html .= "<input type='text' placeholder='endereco:' id='endereco' name='endereco' value='$endereco'>";
$html .= "<input type='text' placeholder='Telefone:' id='telefone' name='telefone' value='$telefone'>";
$html .="<input type='submit'>";
$html .="</form>";
echo $html;
?>