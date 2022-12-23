<?php

include_once "conexao.php";

$idMonitor = $_GET['idMonitor'];

$con->query("UPDATE monitor SET status = '0' WHERE idMonitor = '$idMonitor'");

echo "<script>alert('Monitor desativado com sucesso!');window.location='../consultar_monitores.php'</script>";