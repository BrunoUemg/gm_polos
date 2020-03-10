<?php

include_once "dao/conexao.php";

$idMonitor = $_POST["idMonitor"];
$nomeMonitor = $_POST["nomeMonitor"];

$cpf = $_POST["cpf"];
$dtNascimento = $_POST["dtNascimento"];

$idPolo = $_POST["idPolo"];


$sql = "UPDATE  monitor SET nomeMonitor = '$nomeMonitor',  cpf = '$cpf', dtNascimento = '$dtNascimento',  
  idPolo = '$idPolo' where idMonitor ='$idMonitor' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='pagina_principal.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>