<?php include_once "conexao.php"; session_start();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$nomeAluno = $_POST["nomeAluno"];
$dtNascimento = $_POST["dtNascimento"];
$sexo = $_POST["sexo"];
$nomePai = $_POST["nomePai"];
$nomeMae = $_POST["nomeMae"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$telefoneContato = $_POST["telefoneContato"];
if(isset($_POST["idPolo"])){$idPolo = $_POST["idPolo"];}else{$idPolo = NULL;}
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turnoEscola = $_POST["turnoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$dtMatricula = date("d/m/Y");
$numeroEndereco = $_POST["numeroEndereco"];
$telefoneAluno = $_POST["telefoneAluno"];
$telefoneResponsavel = $_POST["telefoneResponsavel"];
$cep = $_POST["cep"];
$token = $_POST['token'];
$idCidade = $_POST['idCidade'];
$cpfAluno = $_POST['cpfAluno'];
if(isset($_POST['rgAluno'])){$rgAluno = $_POST['rgAluno'];}else{$rgAluno = NULL;}
$cpfResponsavel = $_POST['cpfResponsavel'];
$rgResponsavel = $_POST['rgResponsavel'];

$tipoSanguineo = $_POST['tipoSanguineo'];
$fatorRh = $_POST['fatorRh'];
$emergenciasMedicas = $_POST['emergenciasMedicas'];
$telefoneEmergencia = $_POST['telefoneEmergencia'];
$avisarEmergencia = $_POST['avisarEmergencia'];
$permicao = $_POST['permicao'];
$medContinuos = $_POST['medContinuos'];
$nomeMedicamento = $_POST['nomeMedicamento'];
$equipamentosAuxilio = $_POST['equipamentosAuxilio'];
$oculos = $_POST['oculos'];
$aparelhoDentario = $_POST['aparelhoDentario'];
$marcapasso = $_POST['marcapasso'];
$sonda = $_POST['sonda'];
$aparelhoAudicao = $_POST['aparelhoAudicao'];
$lentesContato = $_POST['lentesContato'];
$alergia = $_POST['alergia'];
$picadaInseto = $_POST['picadaInseto'];
$alergiaMedicamentos = $_POST['alergiaMedicamentos'];
$plantas = $_POST['plantas'];
$alimentos = $_POST['alimentos'];
$outraAlergia = $_POST['outraAlergia'];
$outraAlergiaDesc = $_POST['outraAlergiaDesc'];
$nadar = $_POST['nadar'];
$cardiaco = $_POST['cardiaco'];
$restricoesAlimentos = $_POST['restricoesAlimentos'];
$planoMedico = $_POST['planoMedico'];
$numCarteira = $_POST['numCarteira'];
$distubioComportamento = $_POST['distubioComportamento'];



$select_validade = mysqli_query($con, "SELECT * FROM validade_cadastro where token = '$token';");
$linha_validade = mysqli_fetch_array($select_validade);

if($linha_validade['quantidadeMax'] == $linha_validade['quantidadeCadastro']){
$_SESSION['msg'] = ' <div class="alert alert-danger text-center" role="alert"> <p> Esse link atingiu o máximo de cadastro, solicite um novo link! </div> </p> ';
echo "<script>window.location='../cadastro.php?tkd=$token'</script>";
die();
}



try{


$quantidadeNova = $linha_validade['quantidadeCadastro'] + 1;
$update = $con->query("UPDATE validade_cadastro set quantidadeCadastro = '$quantidadeNova' where token = '$token';");


$query = mysqli_query($con, "SELECT Max(idAluno) AS codigo FROM aluno;");
$result = mysqli_fetch_array($query);


function gerarIdUnico(){$geraId = uniqid(); $geraId = md5($geraId); $geraId = substr($geraId, 0, 16); return $geraId;}
$get_url = gerarIdUnico();

$extensao = pathinfo($_FILES['fotoAluno']['name'], PATHINFO_EXTENSION);
$src_fotoAluno = 'ftA-'.$get_url.'.'. $extensao;

$extensoesPermitidas_fotoAluno = array('jpg', 'jpeg', 'png');

if(in_array(strtolower($extensao), $extensoesPermitidas_fotoAluno)){
$diretorio_fotoAluno = '../arquivos/fotoAluno/';

if(move_uploaded_file($_FILES['fotoAluno']['tmp_name'], $diretorio_fotoAluno . $src_fotoAluno)){
// Foto movida com sucesso.
}else{
echo "<script>alert('Ops, ocorreu um erro com o arquivo \"Foto do jovem\".');window.location='../cadastro.php?tkd=$token'</script>";
die();
}
}else{
echo "<script>alert('Ops, o arquivo enviado pelo campo \"Foto do jovem\" não é válido.');window.location='../cadastro.php?tkd=$token'</script>";
die();
}



if($con->query("INSERT INTO `aluno` (`idAluno`, `nomeAluno`, `dtNascimento`, `nomePai`, `profissaoPai`, `nomeMae`, `profissaoMae`, `sexo`, `enderecoResidencial`, `bairro`, `numeroEndereco`, `cep`, `idCidade`, `idPolo`, `graduacao`, `telefoneContato`, `telefoneAluno`, `telefoneResponsavel`, `escola`, `anoEscola`, `turmaEscola`, `turnoEscola`, `status`, `dataDesligamento`, `nacionalidadeAluno`, `nacionalidadeResponsavel`, `rgAluno`, `cpfAluno`, `cpfResponsavel`, `rgResponsavel`, `dtMatricula`, `tipoSanguineo`, `fatorRh`, `altura`, `peso`, `equipamentosAuxilio`, `oculos`, `aparelhoDentario`, `marcapasso`, `sonda`, `aparelhoAudicao`, `lentesContato`, `outroEquipamento`, `permicao`, `emergenciasMedicas`, `avisarEmergencia`, `telefoneEmergencia`, `medContinuos`, `nomeMedicamento`, `alergia`, `picadaInseto`, `alergiaMedicamentos`, `plantas`, `alimentos`, `outraAlergia`, `outraAlergiaDesc`, `planoMedico`, `numCarteira`, `nadar`, `sonambulo`, `cardiaco`, `restricoesAlimentos`, `restricoesAlimentosDesc`, `impedimentoFisico`, `distubioComportamento`, `disturbioComportamentoDesc`, `disturbioAlimentar`, `disturbioAlimentarDesc`, `disturbioAnsiedade`, `disturbioAnsiedadeDesc`, `deficiencia`, `fisica`, `visual`, `auditiva`, `intectual`, `composicaoFamiliar`, `rgalunodigi`, `cpfalunodigi`, `cpfrespdigi`, `cpfresp2digi`, `rgrespdigi`, `rgresp2digi`, `comprovanteresidigi`, `atestadoescolardigi`, `outro`, `fotoAluno`, `arquivo10`, `arquivo11`, `arquivo12`, `desArquivo1`, `desArquivo2`, `desArquivo3`, `desArquivo4`, `desArquivo5`, `desArquivo6`, `desArquivo7`, `desArquivo8`, `desArquivo9`, `desArquivo10`, `desArquivo11`, `desArquivo12`, `fichaDigitalizada`) VALUES (NULL, '$nomeAluno', '$dtNascimento', '$nomePai', NULL, '$nomeMae', NULL, '$sexo', '$enderecoResidencial', '$bairro', '$numeroEndereco', '$cep', '$idCidade', NULL, '', '$telefoneContato', '$telefoneAluno', '$telefoneResponsavel', '$escola', '$anoEscola', '$turmaEscola', '$turnoEscola', 1, NULL, NULL, NULL, '$rgAluno', '$cpfAluno', '$cpfResponsavel', '$rgResponsavel', '$dtMatricula', '$tipoSanguineo', '$fatorRh', NULL, NULL, '$equipamentosAuxilio', '$oculos', '$aparelhoDentario', '$marcapasso', '$sonda', '$aparelhoAudicao', '$lentesContato', NULL, '$permicao', '$emergenciasMedicas', '$avisarEmergencia', '$telefoneResponsavel', '$medContinuos', '$nomeMedicamento', '$alergia', '$picadaInseto', '$alergiaMedicamentos', '$plantas', '$alimentos', '$outraAlergia', '$outraAlergiaDesc', '$planoMedico', '$numCarteira', '$nadar', NULL, '$cardiaco', '$restricoesAlimentos', NULL, NULL, '$distubioComportamento', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$src_fotoAluno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)") === TRUE){



$consulta_idAluno = $con->query("SELECT `idAluno` FROM `aluno` WHERE `cpfAluno` = '$cpfAluno' AND `dtMatricula` = '$dtMatricula' LIMIT 1;");
$idAluno = mysqli_fetch_assoc($consulta_idAluno);
if($con->query("INSERT INTO `repositorio_aluno` VALUES (null, '$src_fotoAluno', '$idAluno[idAluno]', 'Foto do jovem com fundo branco');") === FALSE){
echo "<script>alert('Ops, ocorreu um erro com o repositório deste aluno.');window.location='../cadastro.php?tkd=$token'</script>";
die();
}


$con->query("INSERT INTO `processamento_cadastro` (`etapa`,`status`,`idAluno`)VALUES('Continuação cadastro',0,'$idAluno[idAluno]');");



$_SESSION['msg'] = ' <div class="alert alert-success text-center" role="alert"> <p> Cadastrado com sucesso! </div> </p> ';
echo "<script>window.location='../cadastro.php?tkd=$token'</script>";
die();

}else{
echo "<script>alert('Ops, ocorreu um erro em nossa base de dados.');window.location='../cadastro.php?tkd=$token'</script>";
die();
}


}catch(Exception $e){
echo "<script>alert('Ops, ocorreu um erro inesperado.');window.location='../cadastro.php?tkd=$token'</script>";
} die(); ?>