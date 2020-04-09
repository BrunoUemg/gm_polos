<?php 

include_once "dao/conexao.php";





$idAluno = $_POST["idAluno"];
$presenca = $_POST["presenca"];
$idEncontro = $_POST["idEncontro"];
$idMonitor = $_POST["idMonitor"];
$date = date("d/m/y");



$sql1 = "UPDATE lista_chamda SET idEncontro = '$idEncontro', presenca = '$presenca', idMonitor = '$idMonitor' where
idAluno = '$idAluno' and dataChamada = '$date' ";
if ($con->query($sql1) === TRUE){
echo "<script>alert('Falta retirara ou dada para aluno');window.location='chamada_alunos.php'</script>";
	
} else {
	echo "Erro para inserir: " . $con->error; 

}
$con->close();


?>