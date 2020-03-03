<?php

include_once "dao/conexao.php";

$idPolo = $_POST["idPolo"];
$nomePolo = $_POST["nomePolo"];




$sql = "UPDATE  polo SET nomePolo = '$nomePolo' where idPolo ='$idPolo' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_polos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>