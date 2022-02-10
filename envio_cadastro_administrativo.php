<?php 

include_once "dao/conexao.php";


$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$senha = $_POST['cpf'];

$con->query("INSERT INTO usuario (nomeUsuario,userAcesso,senha,tipoAcesso)VALUES('$nome','$cpf','$senha','administrativo')");
$response = array("success" => true);

echo json_encode($response);