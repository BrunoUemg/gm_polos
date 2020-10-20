<?php

include_once "dao/conexao.php";
$idComposicao_familiar = $_GET['idComposicao_familiar'];

$sql = "DELETE FROM composicao_familiar where idComposicao_familiar = '$idComposicao_familiar' "; 

$query = mysqli_query($con, "SELECT idAluno  AS codigo FROM composicao_familiar where idComposicao_familiar = '$idComposicao_familiar'");
  $result = mysqli_fetch_array($query);
  
  $idAluno = $result['codigo'];

if($con->query($sql)=== true ){
    

echo "<script>alert('Cadastro excluido com sucesso!');window.location='dados_alterar_composicao.php?idAluno=$idAluno '</script>";
} else {
	echo "<script>alert('Cadastro não pode ser excluido, possui relações!');window.location='consultar_polos.php'</script>";
	
}
$con->close();
?>