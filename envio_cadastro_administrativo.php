<?php 

include_once "dao/conexao.php";


$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$senha = $_POST['cpf'];
$idCidade = $_POST['idCidade'];

$con->query("INSERT INTO usuario (nomeUsuario,userAcesso,senha,tipoAcesso,idCidade)VALUES('$nome','$cpf','$senha','administrativo', '$idCidade')");
$response = array("success" => true);

echo json_encode($response);