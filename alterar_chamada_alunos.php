<?php 

include_once "dao/conexao.php";





$idAluno = $_POST["idAluno"];
$presenca = $_POST["presenca"];
$idEncontro = $_POST["idEncontro"];
$idMonitor = $_POST["idMonitor"];
$nomeEncontro = $_POST["nomeEncontro"];
$dataChamada = $_POST['dataChamada'];


$sql1 = "UPDATE lista_chamda SET idEncontro = '$idEncontro', presenca = '$presenca', idMonitor = '$idMonitor' where
idAluno = '$idAluno' and idEncontro = '$idEncontro' ";
if ($con->query($sql1) === TRUE){

	if($_POST['presenca'] == 1){
$sql2 = "UPDATE movimentacao set descricao = 'Faltou no encontro $nomeEncontro' where idAluno = '$idAluno' and dataMovimentacao = '$dataChamada'";
	}else{
		$sql2 = "UPDATE movimentacao set descricao = 'Presente no encontro $nomeEncontro' where idAluno = '$idAluno' and dataMovimentacao = '$dataChamada'";
	}
	if($con->query($sql2) === TRUE){
echo "<script>alert('Falta retirara ou dada para aluno');window.location='dados_encontro.php?idEncontro=$idEncontro'</script>";
	}
} else {
	echo "Erro para inserir: " . $con->error; 

}
$con->close();


?>