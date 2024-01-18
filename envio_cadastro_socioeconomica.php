<?php 

include_once "dao/conexao.php";

$idAluno = $_POST["idAluno"];
$gestante = $_POST["gestante"];
$semDocumento = $_POST["semDocumento"];
$dependenteQuimico = $_POST["dependenteQuimico"];
$nomeDependenteQui = $_POST["nomeDependenteQui"];
$gastosMedicamentos = $_POST["gastosMedicamentos"];
$gastosMedicamentosValor = $_POST["gastosMedicamentosValor"];
$doencaFamilia = $_POST["doencaFamilia"];
$nomeDoencaFamilia = $_POST["nomeDoencaFamilia"];
$residencia = $_POST["residencia"];
$valorResidencia = $_POST["valorResidencia"];
$numQuartos = $_POST["numQuartos"];
$numBanheiro = $_POST["numBanheiros"];
$agua = $_POST["agua"];
$valorAgua = $_POST["valorAgua"];
$energia = $_POST["energia"];
$valorEnergia = $_POST["valorEnergia"];

$sql = $con->query("SELECT * FROM ficha_social WHERE idAluno ='$idAluno'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Ficha Social já existente! ');window.location='cadastrar_socioeconomica.php?idAluno=$idAluno'</script>";
exit();
} else {
 !$con->query("INSERT INTO ficha_social (idAluno, gestante, semDocumento, dependenteQuimico, nomeDependenteQui, gastosMedicamentos,
 gastosMedicamentosValor, doencaFamilia, nomeDoencaFamilia, residencia, valorResidencia, numQuartos, numBanheiros,
 agua, valorAgua, energia, valorEnergia ) 
VALUES ('$idAluno', '$gestante', '$semDocumento', '$dependenteQuimico', '$nomeDependenteQui',
 '$gastosMedicamentos', '$gastosMedicamentosValor', '$doencaFamilia', '$nomeDoencaFamilia', '$residencia', '$valorResidencia',
 '$numQuartos', '$numBanheiro', '$agua', '$valorAgua', '$energia', '$valorEnergia' )");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='ficha_socioeconomica.php'</script>";
}
$con->close();



?>