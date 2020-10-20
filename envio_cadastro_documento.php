<?php 

include_once "dao/conexao.php";

$nomeDocumento = $_POST["nomeDocumento"];
$obrigatorio = $_POST["obrigatorio"];


$sql = $con->query("SELECT * FROM documentos WHERE nomeDocumento='$nomeDocumento'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Documento já existente! Cadastre um documento novo');window.location='CadastrarPolo.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO documentos (nomeDocumento,obrigatorio) VALUES ('$nomeDocumento', '$obrigatorio' )");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='pagina_principal.php'</script>";
}
$con->close();


?>