<?php 

include_once "dao/conexao.php";

$nomePolo = $_POST["nomePolo"];
$dtCriacao = $_POST["dtCriacao"];
$enderecoFuncionamento = $_POST["enderecoFuncionamento"];
$localFuncionamento = $_POST["localFuncionamento"];
$horaFuncionamento = $_POST["horaFuncionamento"];
$diaFuncionamento = $_POST["diaFuncionamento"];
$idCidade = $_POST["idCidade"];




$sql = $con->query("SELECT * FROM polo WHERE nomePolo='$nomePolo'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Polo já existente! Cadastre um Polo novo');window.location='cadastrar_polo.php'</script>";
exit();
} else {
 $confirma = $con->query("INSERT INTO polo (nomePolo, dtCriacao, enderecoFuncionamento, localFuncionamento, horaFuncionamento, diaFuncionamento, status, idCidade ) VALUES ('$nomePolo', '$dtCriacao', '$enderecoFuncionamento',
 '$localFuncionamento', '$horaFuncionamento', '$diaFuncionamento', 1, '$idCidade'  )");
 
 if($confirma === true){
	echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_polos.php'</script>";
 }else{
	echo "Erro para inserir: " . $con->error;
 }
}
$con->close();
