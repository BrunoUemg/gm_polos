<?php 

include_once "dao/conexao.php";





$idAluno = $_POST["idAluno"];
$presenca = $_POST["presenca"];
$idEncontro = $_POST["idEncontro"];
$nomeEncontro = $_POST["nomeEncontro"];
$idMonitor = $_POST["idMonitor"];
$idPolo = $_POST["idPolo"];
$date = date("d/m/y");


$sql = $con->query("SELECT * FROM lista_chamda WHERE dataChamada= '$date' and idAluno = '$idAluno'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Ja foi dado a presença para esse aluno');window.location='chamada_alunos.php?idEncontro=$idEncontro'</script>";
exit();
} else {


$sql1 = "INSERT INTO lista_chamda (dataChamada, idAluno, idEncontro, presenca, idMonitor, idPolo) VALUES ('$date', '$idAluno', 	'$idEncontro',	 '$presenca', '$idMonitor', '$idPolo' )";
if ($con->query($sql1) === TRUE){

	if($presenca == 0){

		$sql2 = "INSERT INTO movimentacao (dataMovimentacao, descricao, idAluno) VALUES ('$date', 
		'Presente no encontro $nomeEncontro', '$idAluno')";
	}else {
		$sql2 = "INSERT INTO movimentacao (dataMovimentacao, descricao, idAluno) VALUES ('$date', 
		'Faltou no encontro $nomeEncontro', '$idAluno')";
	}
	if ($con->query($sql2) === TRUE){
echo "<script>window.location='chamada_alunos.php?idEncontro=$idEncontro'</script>";
	}
} else {
	echo "Erro para inserir: " . $con->error; 

}
$con->close();
}

?>