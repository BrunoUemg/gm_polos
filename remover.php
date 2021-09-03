<?php

include_once "dao/conexao.php";

$idComposicao_familiar = $_GET['idComposicao_familiar'];
$idAluno = $_GET['idAluno'];

$con->query("DELETE FROM composicao_familiar where idComposicao_familiar = '$idComposicao_familiar'");



echo "<script>alert('Item excluido com sucesso!');window.location='processamento_alunos_pendentes.php?idAluno=$idAluno'</script>";

?>
