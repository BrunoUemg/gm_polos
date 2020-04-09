<?php 

include_once "dao/conexao.php";





$foto = $_POST["foto"];
$descricao = $_POST["descricao"];
$idEncontro = $_POST["idEncontro"];
$idMonitor = $_POST["idMonitor"];
$idPolo = $_POST["idPolo"];
$date = date("d/m/y");


$sql = $con->query("SELECT * FROM chamada WHERE dtChamada = '$date' ");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Ja foi encerrada essa chamada ! ');window.location='Chamada_alunos.php'</script>";
exit();
} else {


$sql1 = "INSERT INTO chamada (dtChamada, idEncontro, idMonitor, idPolo, foto, descricao) VALUES ('$date', '$idEncontro', '$idMonitor', '$idPolo', '$foto', '$descricao' )";
if ($con->query($sql1) === TRUE){
echo "<script>window.location='chamada_alunos.php'</script>";
	
} else {
	echo "Erro para inserir: " . $con->error; 

}
$con->close();
}

?>