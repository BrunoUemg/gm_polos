<?php

include_once "dao/conexao.php";

$idPolo = $_POST["idPolo"];
$nomePolo = $_POST["nomePolo"];
$dtCriacao = $_POST["dtCriacao"];
$enderecoFuncionamento = $_POST["enderecoFuncionamento"];
$localFuncionamento = $_POST["localFuncionamento"];
$horaFuncionamento = $_POST["horaFuncionamento"];
$diaFuncionamento = $_POST["diaFuncionamento"];
$status = $_POST["status"];
$dtDesativacao = $_POST["dtDesativacao"];
$idCidade = $_POST["idCidade"];




$sql = "UPDATE  polo SET nomePolo = '$nomePolo', dtCriacao = '$dtCriacao', enderecoFuncionamento = '$enderecoFuncionamento',
localFuncionamento = '$localFuncionamento', horaFuncionamento = '$horaFuncionamento', diaFuncionamento = '$diaFuncionamento',
status = '$status', dtDesativacao = '$dtDesativacao', idCidade = '$idCidade'  where idPolo ='$idPolo' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_polos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>