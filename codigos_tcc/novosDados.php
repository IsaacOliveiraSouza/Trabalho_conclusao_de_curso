<?php
$id = $_GET['id'];
$html = "<form action='alterarSupervisor.php?id=$id' method='post'>";
$html .= "<input type='text' placeholder='Nome:' id='nome' name='nome'>";
$html .= "<input type='email' placeholder='email:' id='email' name='email'>";
$html .= "<input type='text' placeholder='Telefone:' id='telefone' name='telefone'>";
$html .="<input type='submit'>";
$html .="</form>";
echo $html;
echo $id;
?>