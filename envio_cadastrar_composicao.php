<?php 

include_once "dao/conexao.php";


$nomeIntegrante = $_POST["nomeIntegrante"];
$renda = $_POST["renda"];
$idade = $_POST["idade"];
$parentesco = $_POST["parentesco"];
$profissao = $_POST["profissao"];
$escolaridade = $_POST["escolaridade"];
$estadoCivil = $_POST["estadoCivil"];
$cpfIntegrante_composicao = $_POST["cpfIntegrante_composicao"];
$idAluno = $_POST['idAluno'];


$sql = "INSERT INTO composicao_familiar (nomeIntegrante,cpfIntegrante_composicao, renda, idade, parentesco, profissao, escolaridade, estadoCivil, status, idAluno  ) 
VALUES ( '$nomeIntegrante', '$cpfIntegrante_composicao', '$renda', '$idade', '$parentesco', '$profissao', '$escolaridade', '$estadoCivil', 1, '$idAluno')";
if ($con->query($sql) === TRUE){
    
        echo "<script>window.location='processamento_alunos_pendentes.php?idAluno=$idAluno'</script>";
   
	
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();


?>