<?php 
$servidor = "localhost";
$usuario = "gmfr6199_suporte";
$senha = "gmfrutal@19";
$banco = "gmfr6199_gmpolos";

$con = new mysqli($servidor, $usuario, $senha, $banco);
ob_start();
if($con->connect_error)
{
	die("Erro de conexao " . $con->connect_error);
}
?>