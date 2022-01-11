<?php

include_once "dao/conexao.php";

$nomeAluno = $_POST["nomeAluno"];
$dtNascimento = $_POST["dtNascimento"];
$sexo = $_POST["sexo"];
$nomePai = $_POST["nomePai"];
$nomeMae = $_POST["nomeMae"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$telefoneContato = $_POST["telefoneContato"];
$idPolo = $_POST["idPolo"];
$escola = $_POST["escola"];
$dtMatricula = $_POST["dtMatricula"];
$numeroEndereco = $_POST["numeroEndereco"];
$telefoneAluno = $_POST["telefoneAluno"];
$telefoneResponsavel = $_POST["telefoneResponsavel"];
$cep = $_POST["cep"];


$confirma = $con->query("INSERT INTO aluno (nomeAluno, dtNascimento, sexo, nomePai, nomeMae, 
enderecoResidencial,bairro,telefoneContato,idPolo,escola,dtMatricula,numeroEndereco,telefoneAluno,
telefoneResponsavel,status,cep)VALUES('$nomeAluno','$dtNascimento','$sexo','$nomePai','$nomeMae','$enderecoResidencial',
'$bairro','$telefoneContato','$idPolo','$escola','$dtMatricula','$numeroEndereco','$telefoneAluno','$telefoneResponsavel',1,'$cep')");

$query = mysqli_query($con, "SELECT Max(idAluno)  AS codigo FROM aluno");
$result = mysqli_fetch_array($query);

$idAluno = $result['codigo'];

$con->query("INSERT INTO processamento_cadastro (etapa,status,idAluno)VALUES('Continuação cadastro',0,'$idAluno')");

if($confirma === true){
    echo "<script>alert('Cadastrado com sucesso!');window.location='cadastro_aluno_inicial.php'</script>";
    exit();
}else{
    echo "<script>alert('Erro, entre em contato com o suporte!');window.location='cadastro_aluno_inicial.php'</script>";
    exit();
}