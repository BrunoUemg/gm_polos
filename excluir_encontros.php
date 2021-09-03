<?php

include_once "dao/conexao.php";
$idEncontro = $_GET['idEncontro'];

$sql = "DELETE FROM encontro where idEncontro = '$idEncontro' "; 


if($con->query($sql)=== true ){
    

echo "<script>alert('Cadastro excluido com sucesso!');window.location='consultar_encontros.php'</script>";
} else {
	echo "<script>alert('Cadastro não pode ser excluido, possui relações!');window.location='consultar_encontros.php'</script>";
	
}
$con->close();
?>