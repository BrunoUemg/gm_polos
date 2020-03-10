<?php

include_once "dao/conexao.php";
$idMonitor=$_GET['idMonitor'];

$sql = "DELETE FROM monitor where idMonitor = '$idMonitor' "; 


if($con->query($sql)=== true ){
     $sql2 = "DELETE FROM usuario where idMonitor = '$idMonitor' ";

echo "<script>alert('Cadastro excluido com sucesso!');window.location='consultar_monitores.php'</script>";
} else {
	echo "Erro para excluir: " . $con->error; 
	
}
$con->close();
?>