<?php

include_once "dao/conexao.php";

$idAluno = $_POST["idAluno"];
$status = $_POST["status"];
$dataDesligamento = $_POST["dataDesligamento"];





$sql = "UPDATE  aluno SET status = '$status', dataDesligamento = '$dataDesligamento'  where idAluno ='$idAluno' "; 



if($con->query($sql)=== true){

	$sql7 = "INSERT INTO movimentacao (dataMovimentacao, descricao,idAluno) VALUES ('$dataDesligamento', 'Jovem Desligado', '$idAluno' )";

if($con->query($sql7)=== TRUE ){
	echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
}

	
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>