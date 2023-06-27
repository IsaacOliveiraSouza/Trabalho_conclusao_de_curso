<?php
require_once("Banco.php");
class Estudante{

    function inserirEstudanteCSV($arquivo){

        $banco = new Banco();
        $primeiraLinha = true;

        $dadosExcel = fopen($arquivo['tmp_name'], "r");
        while($linha = fgetcsv($dadosExcel, 1000, ";")){
        
            // Vê se está na primeira linha (cabeçalho Excel) e pula ela
            if($primeiraLinha){
                $primeiraLinha = false;
                continue;
            }

            // Converte caracteres especiais ISO-8859-1 (Excel) para UTF-8
            $linha = mb_convert_encoding($linha, "UTF-8", "ISO-8859-1");

            // Cria conexão e executa as instruções de inserção no banco
            $stmt = $banco->getCon()->prepare("insert into estudante (matricula, nome, telefone, cpf, ano_conclusao_curso, cod_curso, cep, numero, complemento)
                                                values (?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("sssssssss", $linha[0], $linha[1], $linha[2], $linha[3], $linha[4], $linha[5], $linha[6], $linha[7], $linha[8]);
            $stmt->execute();
        }
    }

    function inserirEstudanteCRUD($matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("insert into estudante (matricula, nome, telefone, cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso)
        values (?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssssss",$matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso);
        $stmt->execute();
        header("Location: ../front/Estudante.php");
    }

    function pesquisarAluno($matricula_aluno){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("select * from estudante where matricula = ?;");
        $stmt->bind_param("s", $matricula_aluno);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_object();

        $dados = "<p style='margin-bottom: 0;'><b>Matrícula: </b>". $resultado->matricula ."</p>"; 
        $dados .= "<p style='margin-bottom: 0;'><b>Nome: </b>". $resultado->nome ."</p>"; 
        $dados .= "<p style='margin-bottom: 0;'><b>CPF: </b>". $resultado->cpf ."</p>"; 
        $dados .= "<p style='margin-bottom: 0;'><b>Ano de conclusão: </b>". $resultado->ano_conclusao_curso ."</p>"; 
        $dados .= "<p style='margin-bottom: 0;'><b>Código do curso: </b>". $resultado->cod_curso ."</p>"; 
        $dados .= "<p style='margin-bottom: 0;'><b>CEP: </b>". $resultado->cep ."</p>"; 

        /*$dados = "<h2>Dados do aluno</h2><br>";
        $dados .= "<table border='1'>";
        $dados .= "<tr><td>$resultado->matricula</td>";
        $dados .= "<td>$resultado->nome</td>";
        $dados .= "<td>$resultado->telefone</td>";
        $dados .= "<td>$resultado->cpf</td>";
        $dados .= "<td>$resultado->ano_conclusao_curso</td>";
        $dados .= "<td>$resultado->cod_curso</td></tr>";
        $dados .= "</table><br><br>";*/
        echo $dados;
    }
}
?>