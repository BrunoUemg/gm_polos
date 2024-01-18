<?php 

include_once "dao/conexao.php";






$descricao = $_POST["descricao"];
$idEncontro = $_POST["idEncontro"];
$idMonitor = $_POST["idMonitor"];
$idPolo = $_POST["idPolo"];
$date = date("d/m/y");


$sql = $con->query("SELECT * FROM chamada WHERE dtChamada = '$idEncontro' ");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Ja foi encerrada essa chamada ! ');window.location='Chamada_alunos.php'</script>";
exit();
} else {


$sql1 = "INSERT INTO chamada (dtChamada, idEncontro, idMonitor, idPolo, foto, descricao) VALUES ('$date', '$idEncontro', '$idMonitor', '$idPolo', '$foto', '$descricao' )";
if ($con->query($sql1) === TRUE){

	$sql2 = "UPDATE encontro SET funcionamento = 'Encerrado' WHERE idEncontro = '$idEncontro' ";
	if ($con->query($sql2) === TRUE){

echo "<script>window.location='consultar_encontros.php'</script>";
	}
} else {
	echo "Erro para inserir: " . $con->error; 

}

if (isset($_FILES['foto'] )){

	$idEncontro = $_POST["idEncontro"];

	$extensao1 = strtolower(substr($_FILES['foto']['name'], -4));
	

	$novo_nome1 = "foto-".$idEncontro.".".$extensao1; //define o nome do arquivo
 

	$diretorio ="files_encontros/"; 
	
	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome1);
	


$sql3 = "UPDATE  chamada SET foto = '$novo_nome1' where idEncontro ='$idEncontro'"; 

} 
$con->close();
}

?>