<?php
$id = $_GET['id'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$telefone = $_GET['telefone'];
$html = "<form action='alterarSupervisor.php?id=$id' method='post'>";
//$html .= "<input type='text' placeholder='iD:' id='id' name='id' value='$id'>";
$html .= "<input type='text' placeholder='Nome:' id='nome' name='nome' value='$nome'>";
$html .= "<input type='email' placeholder='email:' id='email' name='email' value='$email'>";
$html .= "<input type='text' placeholder='Telefone:' id='telefone' name='telefone' value='$telefone'>";
$html .="<input type='submit'>";
$html .="</form>";
echo $html;
echo $id;
?>