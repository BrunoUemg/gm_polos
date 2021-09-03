<?php

include_once "dao/conexao.php";
$idMonitor=$_GET['idMonitor'];

$sql = "DELETE FROM monitor where idMonitor = '$idMonitor' "; 


if($con->query($sql)=== true ){
     $sql2 = "DELETE FROM usuario where idMonitor = '$idMonitor' ";
if($con->query($sql2) === true){
echo "<script>alert('Cadastro excluido com sucesso!');window.location='consultar_monitores.php'</script>";
}
} else {
	echo "<script>alert('Esse comandante não pode ser excluido, possui ligações com as chamadas, apenas ser desligado!');window.location='consultar_monitores.php'</script>";
	
}
$con->close();
?>