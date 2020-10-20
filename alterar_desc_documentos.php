<?php

include_once "dao/conexao.php";

$idDocumentos = $_POST["idDocumentos"];
$nomeDocumento = $_POST["nomeDocumento"];





$sql = "UPDATE  documentos SET nomeDocumento = '$nomeDocumento'  where idDocumentos ='$idDocumentos' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='atualizar_documentos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>