<?php

include_once "dao/conexao.php";
$idComposicao_familiar = $_GET['idComposicao_familiar'];

$sql = "DELETE FROM composicao_familiar where idComposicao_familiar = '$idComposicao_familiar' "; 

$query = mysqli_query($con, "SELECT cpfAluno_composicao  AS codigo FROM composicao_familiar where idComposicao_familiar = '$idComposicao_familiar'");
  $result = mysqli_fetch_array($query);
  
  $cpfAlunoComposicao = $result['codigo'];

if($con->query($sql)=== true ){
    

echo "<script>alert('Cadastro excluido com sucesso!');window.location='cadastrar_composicao.php?cpfAluno_composicao=$cpfAlunoComposicao '</script>";
} else {
	echo "<script>alert('Cadastro não pode ser excluido, possui relações!');window.location='consultar_polos.php'</script>";
	
}
$con->close();
?>