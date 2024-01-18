<?php

include "conexao.php";
session_start();
$dataInicial = $con->escape_string($_POST['dataInicial']);
$dataFinal = $con->escape_string($_POST['dataFinal']);
$horaInicial = $con->escape_string($_POST['horaInicial']);
$horaFinal = $con->escape_string($_POST['horaFinal']);
$quantidadeMax = $con->escape_string($_POST['quantidadeMax']);
$idCidade = $con->escape_string($_POST['idCidade']);
$token = password_hash($quantidadeMax, PASSWORD_DEFAULT);
$link = 'sistemas.gmfrutal.com/gm_projoc/cadastro.php?tkd=' . $token;

$con->query("INSERT into validade_cadastro VALUES(null,'$dataInicial','$dataFinal','$horaInicial','$horaFinal',
'$link','$token','0','$quantidadeMax','$idCidade')");

$_SESSION['msg'] = ' <div class="alert alert-success" role="alert"> <p> Link gerado com sucesso! </div> </p> ';
echo "<script>window.location='../pagina_principal.php'</script>";
exit();
