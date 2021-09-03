<?php

include_once "dao/conexao.php";

$idMonitor = $_POST["idMonitor"];
$nomeMonitor = $_POST["nomeMonitor"];

$cpf = $_POST["cpf"];
$dtNascimento = $_POST["dtNascimento"];

$rua = $_POST["rua"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$tel = $_POST["telefone"];
$cel = $_POST["celular"];
$email = $_POST["email"];
$idPolo = $_POST["idPolo"];
$tipoAcesso = $_POST['tipoAcesso'];

$sql = "UPDATE  monitor SET nomeMonitor = '$nomeMonitor',  cpf = '$cpf', dtNascimento = '$dtNascimento', 
  rua = '$rua' , numero = '$numero',
bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep' , telefone = '$tel' , celular = '$cel', email = '$email', idPolo = '$idPolo' where idMonitor ='$idMonitor' "; 



if($con->query($sql)=== true){

  $sql2 = "UPDATE usuario SET tipoAcesso = '$tipoAcesso' where idMonitor = '$idMonitor'";
  if($con->query($sql2) === true){

echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_monitores.php'</script>";
  }
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>