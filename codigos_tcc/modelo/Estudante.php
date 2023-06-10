<?php
require_once("Banco.php");
class Estudante{
    function inserirEstudante($primeiraLinha, $dadosExcel){

        $banco = new Banco();
        while($linha = fgetcsv($dadosExcel, 1000, ";")){
        
            // Vê se está na primeira linha (cabeçalho Excel) e pula ela
            if($primeiraLinha){
                $primeiraLinha = false;
                continue;
            }

            // Chama função para converter caracteres especiaisa
            array_walk_recursive($linha, 'converterCaracteresEspeciais');

            // Cria conexão e executa as instruções de inserção no banco
            $stmt = $banco->getCon()->prepare("insert into estudante (matricula, nome, telefone, cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso)
                                        values (?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("sssssssss", $linha[0], $linha[1], $linha[2], $linha[3], $linha[4], $linha[5], $linha[6], $linha[7], $linha[8]);
            $stmt->execute();
            echo "$dadosExcel";
            $data = date('d/m/Y');
            $situ = "em aberto";
            $stmt = $banco->getCon()->prepare("insert into situacao (id_situacao, situacao, data)
            values (?,?,?);");
            $stmt->bind_param("sss", $linha[0], $situ ,$data);
            $stmt->execute();
            echo "$linha[0], $situ ,$data";
        }
    }
    function inserirEstudanteCRUD($matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso){
        $banco = new Banco();
        $stmt = $banco->getCon()->prepare("insert into estudante (matricula, nome, telefone, cpf, ano_conclusao_curso, cep, numero, complemento, cod_curso)
        values (?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssssss",$matricula,$nome,$telefone,$cpf,$anoConclusao,$cep,$numeroCasa,$complemento,$curso);
        $stmt->execute();
        $data = date('d/m/Y');
        $stmt = $banco->getCon()->prepare("insert into situacao (id_situacao, situacao, data)
        values (?,'em aberto',?);");
        $stmt->bind_param("ss", $matricula, $data);
        header("Location: ../front/Estudante.php");
    }
}
        //    echo "jksadbbbjcjbkjckj";
        //     echo $matricula;
        //     echo $nome;
        //     echo $telefone;
        //     echo $cpf;
        //     echo $cep;
        //     echo $numeroCasa;
        //     echo $complemento;
        //     echo $curso;
?>