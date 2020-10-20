<?php 

include_once "dao/conexao.php";

$nomeProfissao = $_POST["nomeProfissao"];





$sql = $con->query("SELECT * FROM profissao WHERE nomeProfissao='$nomeProfissao'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Polo já existente! Cadastre um Polo novo');window.location='cadastrar_polo.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO profissao (nomeProfissao) VALUES ('$nomeProfissao' )");
 echo "<script>window.location='pagina_principal.php'</script>";
}
$con->close();


?>