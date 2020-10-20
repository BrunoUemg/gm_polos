<?php 

include_once "dao/conexao.php";

$nomePolo = $_POST["nomePolo"];
$dtCriacao = $_POST["dtCriacao"];
$enderecoFuncionamento = $_POST["enderecoFuncionamento"];
$localFuncionamento = $_POST["localFuncionamento"];
$horaFuncionamento = $_POST["horaFuncionamento"];
$diaFuncionamento = $_POST["diaFuncionamento"];




$sql = $con->query("SELECT * FROM polo WHERE nomePolo='$nomePolo'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Polo já existente! Cadastre um Polo novo');window.location='cadastrar_polo.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO polo (nomePolo, dtCriacao, enderecoFuncionamento, localFuncionamento, horaFuncionamento, diaFuncionamento, status, teste, teste2 ) VALUES ('$nomePolo', '$dtCriacao', '$enderecoFuncionamento',
 '$localFuncionamento', '$horaFuncionamento', '$diaFuncionamento', 1  )");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_polos.php'</script>";
}
$con->close();


?>