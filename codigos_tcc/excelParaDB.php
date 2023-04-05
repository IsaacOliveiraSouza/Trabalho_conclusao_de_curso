<?php
include "conexaoBD.php";

$arquivo = $_FILES['arquivo'];
$primeiraLinha = true;
$conexao = new Banco();

if($arquivo['type'] == "text/csv"){

    $dadosExcel = fopen($arquivo['tmp_name'], "r");
    $conexao->inserirEstudante($primeiraLinha, $dadosExcel);
    /*while($linha = fgetcsv($dadosExcel, 1000, ";")){
        
        // Vê se está na primeira linha (cabeçalho Excel) e pula ela
        if($primeiraLinha){
            $primeiraLinha = false;
            continue;
        }

        // Chama função para converter caracteres especiais
        array_walk_recursive($linha, 'converterCaracteresEspeciais');

        // Cria conexão e executa as instruções de inserção no banco
        $query = $banco->getConexao()->prepare("insert into dadosexcel (matricula, nome, email, telefone) values (?,?,?,?)");
        $query->bind_param("ssss", $linha[0], $linha[1], $linha[2], $linha[3]);
        $query->execute();
    }*/
}else{
    echo "Nescessário enviar arquivo csv";
}

// Variável "dadosArquivo" está como parâmetro por referência, ou seja, o que 
// for alterada nela, será alterado na variável que foi passada como parâmetro
function converterCaracteresEspeciais(&$dadosArquivo){
    
    // Converte os caracteres de ISO-8859-1 (Excel) para UTF-8
    $dadosArquivo = mb_convert_encoding($dadosArquivo, "UTF-8", "ISO-8859-1");
}
