<?php 

include_once "dao/conexao.php";

$nomePolo = $_POST["nomePolo"];

$sql = $con->query("SELECT * FROM polo WHERE nomePolo='$nomePolo'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Polo já existente! Cadastre um Polo novo');window.location='CadastrarPolo.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO polo (nomePolo) VALUES ('$nomePolo')");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='CadastrarPolo.php'</script>";
}
$con->close();


?>