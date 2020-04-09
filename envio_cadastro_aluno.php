<?php 

include_once "dao/conexao.php";

$nomeAluno = $_POST["nomeAluno"];
$dtNascimento = $_POST["dtNascimento"];
$sexo = $_POST["sexo"];
$nomePai = $_POST["nomePai"];
$profissaoPai = $_POST["profissaoPai"];
$nomeMae = $_POST["nomeMae"];
$profissaoMae = $_POST["profissaoMae"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$telefoneContato = $_POST["telefoneContato"];
$idPolo = $_POST["idPolo"];
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$turnoEscola = $_POST["turnoEscola"];
$nacionalidadeAluno = $_POST["nacionalidadeAluno"];
$nacionalidadeResponsavel = $_POST["nacionalidadeResponsavel"];
$rgAluno = $_POST["rgAluno"];
$cpfAluno = $_POST["cpfAluno"];
$rgResponsavel = $_POST["rgResponsavel"];
$cpfResponsavel = $_POST["cpfResponsavel"];
$dtMatricula = $_POST["dtMatricula"];




$sql = "INSERT INTO aluno ( nomeAluno, dtNascimento, nomePai, profissaoPai, nomeMae, profissaoMae, sexo, enderecoResidencial, bairro, idPolo, telefoneContato, escola, anoEscola, turmaEscola, turnoEscola,
nacionalidadeAluno, nacionalidadeResponsavel, rgAluno, cpfAluno, rgResponsavel, cpfResponsavel, dtMatricula, status) VALUES ('$nomeAluno', '$dtNascimento', '$nomePai', '$profissaoPai', '$nomeMae', '$profissaoMae', 
'$sexo', '$enderecoResidencial', '$bairro', '$idPolo', '$telefoneContato','$escola', '$anoEscola', '$turmaEscola', '$turnoEscola',
'$nacionalidadeAluno', '$nacionalidadeResponsavel', '$rgAluno', '$cpfAluno', '$rgResponsavel', '$cpfResponsavel','$dtMatricula', 1)";

  

if ($con->query($sql) === TRUE){

	echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_alunos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();


?>