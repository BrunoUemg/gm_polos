<?php

include_once "dao/conexao.php";

$idUsuario = $_POST["idUsuario"];
$nomeUsuario = $_POST["nomeUsuario"];
$userAcesso = $_POST["userAcesso"];



$sql = "UPDATE  usuario SET nomeUsuario = '$nomeUsuario', userAcesso = '$userAcesso' 
   where idUsuario = '$idUsuario' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='profile.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>