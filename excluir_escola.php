<?php

include_once "dao/conexao.php";
$idEscola = $_GET['idEscola'];

$sql = "DELETE FROM escola where idEscola = '$idEscola' "; 


if($con->query($sql)=== true ){
    

echo "<script>alert('Cadastro excluido com sucesso!');window.location='atualizar_escola.php'</script>";
} else {
	echo "<script>alert('Cadastro não pode ser excluido, possui relações!');window.location='consultar_polos.php'</script>";
	
}
$con->close();
?>