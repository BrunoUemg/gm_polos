<?php 

include_once "dao/conexao.php";

$nomeEscola = $_POST["nomeEscola"];
$idCidade = $_POST['idCidade'];


$sql = $con->query("SELECT * FROM escola WHERE nomeEscola='$nomeEscola'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Escola já existente! Cadastre uma nova escola');window.location='pagina_principal.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO escola (nomeEscola,idCidade) VALUES ('$nomeEscola','$idCidade')");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='pagina_principal.php'</script>";
}
$con->close();


?>