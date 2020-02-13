<?php 

include_once "../dao/conexao.php";

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





$sql = "INSERT INTO aluno ( nomeAluno, dtNascimento, nomePai, profissaoPai, nomeMae, profissaoMae, sexo, enderecoResidencial, bairro, idPolo) VALUES ('$nomeAluno', '$dtNascimento', '$nomePai', '$profissaoPai', '$nomeMae', '$profissaoMae', '$sexo', '$enderecoResidencial', '$bairro', '$idPolo')";

  

if ($con->query($sql) === TRUE){

	echo "<script>alert('Cadastro realizado com sucesso!');window.location='CadastroAlunos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();


?>