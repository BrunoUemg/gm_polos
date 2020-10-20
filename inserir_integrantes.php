<?php 

include_once "dao/conexao.php";

$idAluno = $_POST["idAluno"];
$nomeIntegrante = $_POST["nomeIntegrante"];
$renda = $_POST["renda"];
$idade = $_POST["idade"];
$parentesco = $_POST["parentesco"];
$profissao = $_POST["profissao"];
$escolaridade = $_POST["escolaridade"];
$estadoCivil = $_POST["estadoCivil"];
$cpfAluno_composicao = $_POST["cpfAluno_composicao"];
$status = $_POST["status"];



$sql = "INSERT INTO composicao_familiar (idAluno,nomeIntegrante,cpfAluno_composicao, renda, idade, parentesco, profissao, escolaridade, estadoCivil, status ) 
VALUES ('$idAluno', '$nomeIntegrante', '$cpfAluno_composicao', '$renda', '$idade', '$parentesco', '$profissao', '$escolaridade', '$estadoCivil', '$status')";
if ($con->query($sql) === TRUE){
    
        echo "<script>window.location='visualizar_alunos.php?idAluno=$idAluno '</script>";
   
	
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();


?>