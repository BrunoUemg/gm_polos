<?php

include_once "dao/conexao.php";
$idPolo=$_GET['idPolo'];

$sql = "DELETE FROM polo where idPolo = '$idPolo' "; 


if($con->query($sql)=== true ){
    

echo "<script>alert('Cadastro excluido com sucesso!');window.location='consultar_polos.php'</script>";
} else {
	echo "<script>alert('Cadastro não pode ser excluido, possui relações!');window.location='consultar_polos.php'</script>";
	
}
$con->close();
?>