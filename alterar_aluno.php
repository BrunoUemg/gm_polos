<?php

include_once "dao/conexao.php";

$idAluno = $_POST["idAluno"];
$nomeAluno = $_POST["nomeAluno"];

$nomePai = $_POST["nomePai"];
$profissaoPai = $_POST["profissaoPai"];
$nomeMae = $_POST["nomeMae"];
$profissaoMae = $_POST["profissaoMae"];
$sexo = $_POST["sexo"];
$dtNascimento = $_POST["dtNascimento"];
$telefoneContato = $_POST["telefoneContato"];
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$turnoEscola = $_POST["turnoEscola"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$status = $_POST["status"];
$dataDesligamento = $_POST ["dataDesligamento"];
$idPolo = $_POST["idPolo"];
$nacionalidadeAluno = $_POST["nacionalidadeAluno"];
$nacionalidadeResponsavel = $_POST["nacionalidadeResponsavel"];
$rgAluno = $_POST["rgAluno"];
$cpfAluno = $_POST["cpfAluno"];
$rgResponsavel = $_POST["rgResponsavel"];
$cpfResponsavel = $_POST["cpfResponsavel"];
$dtMatricula = $_POST["dtMatricula"];


$sql = "UPDATE  aluno SET nomeAluno = '$nomeAluno', dtNascimento = '$dtNascimento', 
  enderecoResidencial = '$enderecoResidencial' , bairro = '$bairro',
nomePai = '$nomePai', profissaoPai = '$profissaoPai', nomeMae = '$nomeMae', profissaoMae = '$profissaoMae' , telefoneContato = '$telefoneContato',
 sexo = '$sexo', escola = '$escola', anoEscola = '$anoEscola', turmaEscola = '$turmaEscola', turnoEscola = '$turnoEscola',
  idPolo = '$idPolo', status = '$status', 
  dataDesligamento = '$dataDesligamento', nacionalidadeAluno = '$nacionalidadeAluno', nacionalidadeResponsavel = '$nacionalidadeResponsavel',
  rgAluno = '$rgAluno', cpfAluno = '$cpfAluno', rgResponsavel = '$rgResponsavel', cpfResponsavel = '$cpfResponsavel',
  dtMatricula = '$dtMatricula' where idAluno ='$idAluno' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>