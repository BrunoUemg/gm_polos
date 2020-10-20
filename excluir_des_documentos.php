<?php

include_once "dao/conexao.php";
$idDocumentos = $_GET['idDocumentos'];

$sql = "DELETE FROM documentos where idDocumentos = '$idDocumentos' "; 


if($con->query($sql)=== true ){
    

echo "<script>alert('Cadastro excluido com sucesso!');window.location='atualizar_documentos.php'</script>";
} else {
	echo "<script>alert('Cadastro não pode ser excluido, possui relações!');window.location='consultar_polos.php'</script>";
	
}
$con->close();
?>