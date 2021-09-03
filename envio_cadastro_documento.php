<?php 

include_once "dao/conexao.php";

$nomeDocumento = $_POST["nomeDocumento"];
$obrigatorio = $_POST["obrigatorio"];
$variavelDocumento = uniqid();

$sql = $con->query("SELECT * FROM documentos WHERE nomeDocumento='$nomeDocumento'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Documento já existente! Cadastre um documento novo');window.location='pagina_principal.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO documentos (nomeDocumento,obrigatorio,variavelDocumento) VALUES ('$nomeDocumento', '$obrigatorio', '$variavelDocumento' )");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='pagina_principal.php'</script>";
}
$con->close();


?>

