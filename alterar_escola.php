<?php

include_once "dao/conexao.php";

$idEscola = $_POST["idEscola"];
$nomeEscola = $_POST["nomeEscola"];





$sql = "UPDATE  escola SET nomeEscola = '$nomeEscola'  where idEscola ='$idEscola' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='atualizar_escola.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>