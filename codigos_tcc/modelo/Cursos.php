<?php
require_once("Banco.php");
class Cursos{
    function mostrarCursos(){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from curso;");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $combo = " <select name='cursos' id='cursos'>";
        while($linha = $resultado->fetch_object()){
            $nome = $linha->nome_curso;
            $cod = $linha->cod_curso;
            $combo .= "<option value='$cod'>$nome</option>";
        }
        $combo .= "</section>";
        return $combo;
    }
}
?>