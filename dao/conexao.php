<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "gmpolos";

$con = new mysqli($servidor, $usuario, $senha, $banco);
ob_start();
if($con->connect_error)
{
	die("Erro de conexao " . $con->connect_error);
}
?>