<?php

include_once "dao/conexao.php";
$idEncontro = $_POST["idEncontro"];
$idPolo = $_POST["idPolo"];
$nomeEncontro = $_POST["nomeEncontro"];
$descricao = $_POST["descricao"];
$dt = $_POST["dt"];
$horaInicio = $_POST["horaInicio"];
$horaFinal = $_POST["horaFinal"];



$sql = "UPDATE  encontro SET nomeEncontro = '$nomeEncontro', descricao = '$descricao', dt = '$dt',
 horaInicio = '$horaInicio', horaFinal = '$horaFinal', idPolo = '$idPolo' where idEncontro = '$idEncontro' "; 



if($con->query($sql)=== true){
echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_encontros.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}
$con->close();
?>