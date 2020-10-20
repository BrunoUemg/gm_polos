<?php 

include_once "dao/conexao.php";


$nomeIntegrante = $_POST["nomeIntegrante"];
$renda = $_POST["renda"];
$idade = $_POST["idade"];
$parentesco = $_POST["parentesco"];
$profissao = $_POST["profissao"];
$escolaridade = $_POST["escolaridade"];
$estadoCivil = $_POST["estadoCivil"];
$cpfAluno_composicao = $_POST["cpfAluno_composicao"];



$sql = "INSERT INTO composicao_familiar (nomeIntegrante,cpfAluno_composicao, renda, idade, parentesco, profissao, escolaridade, estadoCivil, status ) 
VALUES ( '$nomeIntegrante', '$cpfAluno_composicao', '$renda', '$idade', '$parentesco', '$profissao', '$escolaridade', '$estadoCivil', 0)";
if ($con->query($sql) === TRUE){
    
        echo "<script>window.location='cadastrar_alunos.php'</script>";
   
	
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();


?>