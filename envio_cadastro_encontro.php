<?php 

include_once "dao/conexao.php";

$idPolo = $_POST["idPolo"];
$nomeEncontro = $_POST["nomeEncontro"];
$descricao = $_POST["descricao"];
$dt = $_POST["dt"];
$horaInicio = $_POST["horaInicio"];
$horaFinal = $_POST["horaFinal"];

$sql = "INSERT INTO encontro (idPolo, nomeEncontro, descricao, dt, horaInicio, horaFinal ) VALUES ('$idPolo', '$nomeEncontro', '$descricao', '$dt', '$horaInicio', '$horaFinal')";
if ($con->query($sql) === TRUE){

	echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_encontro.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();


?>