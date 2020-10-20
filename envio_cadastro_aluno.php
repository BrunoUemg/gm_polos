<?php 

include_once "dao/conexao.php";
session_start();
$nomeAluno = $_POST["nomeAluno"];
$dtNascimento = $_POST["dtNascimento"];
$sexo = $_POST["sexo"];
$nomePai = $_POST["nomePai"];
$profissaoPai = $_POST["profissaoPai"];
$nomeMae = $_POST["nomeMae"];
$profissaoMae = $_POST["profissaoMae"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$telefoneContato = $_POST["telefoneContato"];
$idPolo = $_POST["idPolo"];
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$turnoEscola = $_POST["turnoEscola"];
$nacionalidadeAluno = $_POST["nacionalidadeAluno"];
$nacionalidadeResponsavel = $_POST["nacionalidadeResponsavel"];
$rgAluno = $_POST["rgAluno"];
$cpfAluno = $_POST["cpfAluno"];
$rgResponsavel = $_POST["rgResponsavel"];
$cpfResponsavel = $_POST["cpfResponsavel"];
$dtMatricula = $_POST["dtMatricula"];
$tipoSanguineo = $_POST["tipoSanguineo"];
$fatorRh = $_POST["fatorRh"];
$altura = $_POST["altura"];
$peso = $_POST["peso"];
$equipamentosAuxilio = $_POST["equipamentosAuxilio"];
$permicao = $_POST["permicao"];
$emergenciasMedicas = $_POST["emergenciasMedicas"];
$avisarEmergencia = $_POST["avisarEmergencia"];
$medContinuos = $_POST["medContinuos"];
$alergia = $_POST["alergia"];
$planoMedico = $_POST["planoMedico"];
$numCarteira = $_POST["numCarteira"];
$nadar = $_POST["nadar"];
$sonambulo = $_POST["sonambulo"];
$cardiaco = $_POST["cardiaco"];
$restricoesAlimentos = $_POST["restricoesAlimentos"];
$impedimentoFisico = $_POST["impedimentoFisico"];
$distubioComportamento = $_POST["distubioComportamento"];
$disturbioAlimentar = $_POST["disturbioAlimentar"];
$disturbioAnsiedade = $_POST["disturbioAnsiedade"];
$deficiencia = $_POST["deficiencia"];
$telefoneEmergencia = $_POST["telefoneEmergencia"];
$numeroEndereco = $_POST["numeroEndereco"];
$desArquivo1 = $_POST["desArquivo1"];
$desArquivo2 = $_POST["desArquivo2"];
$desArquivo3 = $_POST["desArquivo3"];
$desArquivo4 = $_POST["desArquivo4"];
$desArquivo5 = $_POST["desArquivo5"];
$desArquivo6 = $_POST["desArquivo6"];
$desArquivo7 = $_POST["desArquivo7"];
$desArquivo8 = $_POST["desArquivo8"];
$desArquivo9 = $_POST["desArquivo9"];
$desArquivo10 = $_POST["desArquivo10"];
$desArquivo11 = $_POST["desArquivo11"];
$desArquivo12 = $_POST["desArquivo12"];
$oculos = $_POST["oculos"];
$aparelhoDentario = $_POST["aparelhoDentario"];
$marcapasso = $_POST["marcapasso"];
$sonda = $_POST["sonda"];
$aparelhoAudicao = $_POST["aparelhoAudicao"];
$lentesContato = $_POST["lentesContato"];
$outroEquipamento = $_POST["outroEquipamento"];
$picadaInseto = $_POST["picadaInseto"];
$alergiaMedicamentos = $_POST["alergiaMedicamentos"];
$plantas = $_POST["plantas"];
$alimentos = $_POST["alimentos"];
$outraAlergia = $_POST["outraAlergia"];
$outraAlergiaDesc = $_POST["outraAlergiaDesc"];
$disturbioComportamentoDesc = $_POST["disturbioComportamentoDesc"];
$disturbioAlimentarDesc = $_POST["disturbioAlimentarDesc"];
$disturbioAnsiedadeDesc = $_POST["disturbioAnsiedadeDesc"];
$fisica = $_POST["fisica"];
$visual = $_POST["visual"];
$auditiva = $_POST["auditiva"];
$intectual = $_POST["intectual"];
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
$tipoEscola = $_POST["tipoEscola"];
$valorEscola = $_POST["valorEscola"];
$valorIdioma = $_POST["valorIdioma"];
$valorInformatica = $_POST["valorInformatica"];
$valorAlimentacao = $_POST["valorAlimentacao"];
$parentescoGestante = $_POST["parentescoGestante"];
$restricoesAlimentosDesc = $_POST["restricoesAlimentosDesc"];
$cadUnico = $_POST["cadUnico"];
$bolsaFamilia = $_POST["bolsaFamilia"];




$sql = "INSERT INTO aluno ( nomeAluno, dtNascimento, nomePai, profissaoPai, nomeMae, profissaoMae, sexo, enderecoResidencial, bairro, idPolo, telefoneContato, escola, anoEscola, turmaEscola, turnoEscola,
nacionalidadeAluno, nacionalidadeResponsavel, rgAluno, cpfAluno, rgResponsavel, cpfResponsavel, dtMatricula, status, tipoSanguineo, fatorRh,
altura, peso, equipamentosAuxilio, permicao, emergenciasMedicas, avisarEmergencia, medContinuos, alergia, planoMedico, numCarteira,
nadar, sonambulo, cardiaco, restricoesAlimentos, impedimentoFisico, distubioComportamento, disturbioAlimentar, disturbioAnsiedade,
deficiencia, telefoneEmergencia, numeroEndereco, composicaoFamiliar, oculos, aparelhoDentario, marcapasso,
sonda, aparelhoAudicao, lentesContato, outroEquipamento, picadaInseto, alergiaMedicamentos, plantas,
alimentos, outraAlergia, outraAlergiaDesc, disturbioComportamentoDesc, disturbioAlimentarDesc, disturbioAnsiedadeDesc,
fisica, visual, auditiva, intectual, restricoesAlimentosDesc   ) VALUES ('$nomeAluno', '$dtNascimento', '$nomePai', '$profissaoPai', '$nomeMae', '$profissaoMae', 
'$sexo', '$enderecoResidencial', '$bairro', '$idPolo', '$telefoneContato','$escola', '$anoEscola', '$turmaEscola', '$turnoEscola',
'$nacionalidadeAluno', '$nacionalidadeResponsavel', '$rgAluno', '$cpfAluno', '$rgResponsavel', '$cpfResponsavel','$dtMatricula', 1, '$tipoSanguineo', '$fatorRh',
'$altura', '$peso', '$equipamentosAuxilio', '$permicao', '$emergenciasMedicas', '$avisarEmergencia', '$medContinuos', '$alergia', '$planoMedico',
'$numCarteira', '$nadar', '$sonambulo', '$cardiaco', '$restricoesAlimentos', '$impedimentoFisico', '$distubioComportamento', '$disturbioAlimentar',
'$disturbioAnsiedade', '$deficiencia', '$telefoneEmergencia', '$numeroEndereco', 'Pendente', '$oculos', '$aparelhoDentario', '$marcapasso',
'$sonda', '$aparelhoAudicao', '$lentesContato', '$outroEquipamento', '$picadaInseto', '$alergiaMedicamentos', '$plantas',
'$alimentos', '$outraAlergia', '$outraAlergiaDesc', '$disturbioComportamentoDesc', '$disturbioAlimentarDesc',
'$disturbioAnsiedadeDesc', '$fisica', '$visual', '$auditiva', '$intectual', '$restricoesAlimentosDesc' )";

  

if ($con->query($sql) === TRUE){

  $query = mysqli_query($con, "SELECT Max(idAluno)  AS codigo FROM aluno");
  $result = mysqli_fetch_array($query);
  
  $idAluno = $result['codigo'];
  
  if (NULL!=($_FILES['rgalunodigi'] && $_FILES['cpfalunodigi'] && $_FILES['cpfrespdigi'] && $_FILES['cpfresp2digi'] && $_FILES['rgrespdigi']
  && $_FILES['rgresp2digi'] && $_FILES['comprovanteresidigi'] && $_FILES['atestadoescolardigi'] && $_FILES['outro'] && $_FILES['fotoAluno'] 
  && $_FILES['arquivo10'] && $_FILES['arquivo11'] && $_FILES['arquivo12'])){
  
    $idaluno = mysqli_insert_id($con);
  
    $extensao1 = strtolower(substr($_FILES['rgalunodigi']['name'], -4));
    $extensao2 = strtolower(substr($_FILES['cpfalunodigi']['name'], -4));
    $extensao3 = strtolower(substr($_FILES['cpfrespdigi']['name'], -4));
    $extensao4 = strtolower(substr($_FILES['cpfresp2digi']['name'], -4));
    $extensao5 = strtolower(substr($_FILES['rgrespdigi']['name'], -4));
    $extensao6 = strtolower(substr($_FILES['rgresp2digi']['name'], -4));
    $extensao7 = strtolower(substr($_FILES['comprovanteresidigi']['name'], -4));
    $extensao8 = strtolower(substr($_FILES['atestadoescolardigi']['name'], -4));
    $extensao9 = strtolower(substr($_FILES['outro']['name'], -4));
    $extensao10 = strtolower(substr($_FILES['fotoAluno']['name'], -4));
    $extensao11 = strtolower(substr($_FILES['arquivo10']['name'], -4));
    $extensao12 = strtolower(substr($_FILES['arquivo11']['name'], -4));
    $extensao13 = strtolower(substr($_FILES['arquivo12']['name'], -4));
  
    $novo_nome1 = "rgalunodigi-".$idAluno.".".$extensao1; //define o nome do arquivo
    $novo_nome2 = "cpfalunodigi-".$idAluno.".".$extensao2; //define o nome do arquivo
    $novo_nome3 = "cpfrespdigi-".$idAluno.".".$extensao3; //define o nome do arquivo
    $novo_nome4 = "cpfresp2digi-".$idAluno.".".$extensao4; //define o nome do arquivo
    $novo_nome5 = "rgrespdigi-".$idAluno.".".$extensao5; //define o nome do arquivo
    $novo_nome6 = "rgresp2digi-".$idAluno.".".$extensao6; //define o nome do arquivo
    $novo_nome7 = "comprovanteresidigi-".$idAluno.".".$extensao7; //define o nome do arquivo
    $novo_nome8 = "atestadoescolardigi-".$idAluno.".".$extensao8; //define o nome do arquivo
    $novo_nome9 = "outro-".$idAluno.".".$extensao9; //define o nome do arquivo
    $novo_nome10 = "fotoAluno-".$idAluno.".".$extensao10; //define o nome do arquivo
    $novo_nome11 = "arquivo10-".$idAluno.".".$extensao11; //define o nome do arquivo
    $novo_nome12 = "arquivo11-".$idAluno.".".$extensao12; //define o nome do arquivo
    $novo_nome13 = "arquivo12-".$idAluno.".".$extensao13; //define o nome do arquivo
  
    $diretorio ="digitalizados/"; 
    
    move_uploaded_file($_FILES['rgalunodigi']['tmp_name'], $diretorio.$novo_nome1);
    move_uploaded_file($_FILES['cpfalunodigi']['tmp_name'], $diretorio.$novo_nome2);
    move_uploaded_file($_FILES['cpfrespdigi']['tmp_name'], $diretorio.$novo_nome3);
    move_uploaded_file($_FILES['cpfresp2digi']['tmp_name'], $diretorio.$novo_nome4);
    move_uploaded_file($_FILES['rgrespdigi']['tmp_name'], $diretorio.$novo_nome5);
    move_uploaded_file($_FILES['rgresp2digi']['tmp_name'], $diretorio.$novo_nome6);
    move_uploaded_file($_FILES['comprovanteresidigi']['tmp_name'], $diretorio.$novo_nome7);
    move_uploaded_file($_FILES['atestadoescolardigi']['tmp_name'], $diretorio.$novo_nome8);
    move_uploaded_file($_FILES['outro']['tmp_name'], $diretorio.$novo_nome9);
    move_uploaded_file($_FILES['fotoAluno']['tmp_name'], $diretorio.$novo_nome10);
    move_uploaded_file($_FILES['arquivo10']['tmp_name'], $diretorio.$novo_nome11);
    move_uploaded_file($_FILES['arquivo11']['tmp_name'], $diretorio.$novo_nome12);
    move_uploaded_file($_FILES['arquivo12']['tmp_name'], $diretorio.$novo_nome13);
  
  $sql3 = "UPDATE  aluno SET rgalunodigi = '$novo_nome1', cpfalunodigi = '$novo_nome2', cpfrespdigi = '$novo_nome3', 
  cpfresp2digi = '$novo_nome4', rgrespdigi = '$novo_nome5', rgresp2digi = '$novo_nome6', comprovanteresidigi = '$novo_nome7',
  atestadoescolardigi = '$novo_nome8', outro = '$novo_nome9', fotoAluno = '$novo_nome10', arquivo10 = '$novo_nome11',
  arquivo11 = '$novo_nome12', arquivo12 = '$novo_nome13', desArquivo1 = '$desArquivo1', desArquivo2 = '$desArquivo2',
  desArquivo3 = '$desArquivo3', desArquivo4 = '$desArquivo4', desArquivo5 = '$desArquivo5', desArquivo6 = '$desArquivo6',
  desArquivo7 = '$desArquivo7', desArquivo8 = '$desArquivo8', desArquivo9 = '$desArquivo9', desArquivo10 = '$desArquivo10', desArquivo11 = '$desArquivo11', desArquivo12 = '$desArquivo12' where idAluno ='$idAluno'"; 
  
  } if ($con->query($sql3) === TRUE){
    
    
  $sql5 = "UPDATE composicao_familiar SET idAluno = '$idAluno', status = 1 WHERE status = 0 ";  

  
  if ($con->query($sql5) === TRUE){

    $query5 = mysqli_query($con, "SELECT status,renda, SUM(renda)/SUM(status) AS rendaPercapita from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno");
    $resultPercapita = mysqli_fetch_array($query5);
    $percapita = $resultPercapita['rendaPercapita'];


   
    $query2 = mysqli_query($con, "SELECT renda, SUM(renda) AS rendaSom from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno");
    
    $resultRendaSom = mysqli_fetch_array($query2);
  
    $rendaSom = $resultRendaSom['rendaSom'];
    $rendaTotal = $rendaSom - ($valorAgua + $valorEnergia + $valorResidencia + $gastosMedicamentosValor + $valorAlimentacao + $valorEscola + $valorIdioma + $valorInformatica);

   $sql6 =  "INSERT INTO ficha_social (idAluno, gestante, semDocumento, dependenteQuimico, nomeDependenteQui, gastosMedicamentos,
 gastosMedicamentosValor, doencaFamilia, nomeDoencaFamilia, residencia, valorResidencia, numQuartos, numBanheiros,
 agua, valorAgua, energia, valorEnergia, rendaTotal, valorAlimentacao, valorEscola, valorIdioma, valorInformatica, tipoEscola, parentescoGestante, bolsaFamilia, cadUnico, status, percapita ) 
VALUES ('$idAluno', '$gestante', '$semDocumento', '$dependenteQuimico', '$nomeDependenteQui',
 '$gastosMedicamentos', '$gastosMedicamentosValor', '$doencaFamilia', '$nomeDoencaFamilia', '$residencia', '$valorResidencia',
 '$numQuartos', '$numBanheiro', '$agua', '$valorAgua', '$energia', '$valorEnergia', '$rendaTotal', '$valorAlimentacao', '$valorEscola', '$valorIdioma', '$valorInformatica',
 '$tipoEscola', '$parentescoGestante', '$bolsaFamilia', '$cadUnico', 1, '$percapita'  )";

if ($con->query($sql6) === TRUE){
$sql7 = "INSERT INTO movimentacao (dataMovimentacao, descricao,idAluno) VALUES ('$dtMatricula', 'Matricula do Jovem', '$idAluno' )";


if ($con->query($sql7)=== TRUE ){


}

else{
  echo "Erro para inserir: " . $con->error; 
}

}else 

{
  echo "Erro para inserir: " . $con->error; 

}

  } else {
    echo "Erro para inserir: " . $con->error; 
  }
 
} else {
	echo "Erro para inserir: " . $con->error; 
}

}else{
	echo "Erro para inserir: " . $con->error; 

}





$sql4 = "SELECT A.idAluno,
A.nomeAluno,
A.dtNascimento,
A.nomePai,
A.profissaoPai,
A.nomeMae,
A.profissaoMae,
A.sexo,
A.enderecoResidencial,
A.bairro,
A.telefoneContato,
A.escola,
A.anoEscola,
A.turmaEscola,
A.turnoEscola,
A.status,
A.dataDesligamento,
A.nacionalidadeAluno,
A.nacionalidadeResponsavel,
A.rgAluno,
A.cpfAluno,
A.rgResponsavel,
A.cpfResponsavel,
A.dtMatricula,
A.tipoSanguineo,
A.fatorRh,
A.altura,
A.peso,
A.equipamentosAuxilio,
A.permicao,
A.emergenciasMedicas,
A.avisarEmergencia,
A.medContinuos,
A.alergia,
A.planoMedico,
A.numCarteira,
A.nadar,
A.sonambulo,
A.cardiaco,
A.restricoesAlimentos,
A.impedimentoFisico,
A.distubioComportamento,
A.disturbioAlimentar,
A.disturbioAnsiedade,
A.deficiencia,
A.telefoneEmergencia,
A.numeroEndereco,
A.oculos,
A.aparelhoDentario,
A.marcapasso,
A.sonda,
A.aparelhoAudicao,
A.lentesContato,
A.outroEquipamento,
A.picadaInseto, 
A.alergiaMedicamentos,
A.plantas,
A.alimentos,
A.outraAlergia,
A.outraAlergiaDesc,
A.disturbioComportamentoDesc,
A.disturbioAlimentarDesc,
A.disturbioAnsiedadeDesc,
A.fisica,
A.visual,
A.auditiva,
A.intectual,
A.restricoesAlimentosDesc,
A.outro,
P.idPolo,
P.nomePolo
from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1  and A.idAluno = $idAluno ";

$res = $con-> query($sql4);
$linha = $res->fetch_assoc();

$sql5 = "SELECT F.idFicha_social,
F.gestante,
F.semDocumento,
F.dependenteQuimico,
F.nomeDependenteQui,
F.gastosMedicamentos,
F.gastosMedicamentosValor,
F.doencaFamilia,
F.nomeDoencaFamilia,
F.residencia,
F.valorResidencia,
F.numQuartos,
F.numBanheiros,
F.agua,
F.valorAgua,
F.energia,
F.valorEnergia,
F.rendaTotal,
F.tipoEscola,
F.valorEscola,
F.valorIdioma,
F.valorInformatica,
F.valorAlimentacao,
F.parentescoGestante,
F.bolsaFamilia,
F.cadUnico,
A.idAluno,
A.nomeAluno
from aluno A, ficha_social F
where F.idAluno = A.idAluno  and F.idAluno = '$idAluno' ";
$res = $con-> query($sql5);
$linha2 = $res->fetch_assoc();


$html .='<table border=1>';
$html .= '<thead>';
$html .='<tr>';
$html .='<td>Nome Integrante</td>';
$html .='<td> Parentesco </td>';
$html .='<td> Idade</td>';
$html .='<td> Escolaridade </td>';
$html .='<td> Estado Civil </td>';
$html .='<td> Renda </td>';
$html .='<td> Profissão </td>';
$html .='</tr>';
$html .= '</thead>';

$result_consultaComposicao = "SELECT C.idComposicao_familiar,
C.idAluno,
C.nomeIntegrante,
C.renda,
C.parentesco,
C.profissao,
C.escolaridade,
C.idade,
C.estadoCivil,
C.cpfAluno_composicao,
C.status

from composicao_familiar C
where C.idAluno = '$idAluno' and status = 1  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);

$result_pessoa = "SELECT status,renda, SUM(renda)/SUM(status) AS rendaPercapita from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno";

$res = $con-> query($result_pessoa);
$linha3 = $res->fetch_assoc();

while ($rows_consultaComposicao = mysqli_fetch_assoc($resultado_consultaComposicao)) { 
       $html .= '<tbody>';
       $html .=  '<tr> <td>' . $rows_consultaComposicao['nomeIntegrante']. '</td>'; 
       $html .= ' <td>'  . $rows_consultaComposicao['parentesco']. '</td>';
       $html .= ' <td>'  . $rows_consultaComposicao['idade']. '</td>';
       $html .=  ' <td>' . $rows_consultaComposicao['escolaridade']. '</td>';
       $html .= ' <td>'  . $rows_consultaComposicao['estadoCivil']. '</td>';
       $html .=  ' <td>' . $rows_consultaComposicao['renda']. '</td>';
       $html .=  ' <td>' . $rows_consultaComposicao['profissao']. '</td></tr>';
       $html .= '</tbody>';
}
$html .= '<tr> <td> Renda Per capita </td> ';
$html .= ' <td> R$ ' .$linha3['rendaPercapita']. '</td> </tr>';
$html .= '</table>';


$result_gastos = "SELECT valorResidencia,valorAgua,valorEnergia,gastosMedicamentosValor,valorAlimentacao,valorEscola, valorIdioma, valorInformatica, SUM(valorResidencia)+SUM(valorAgua)+ SUM(valorEnergia)+SUM(gastosMedicamentosValor)+SUM(valorAlimentacao)+SUM(valorEscola)+SUM(valorIdioma)+SUM(valorInformatica) AS gastos from ficha_social where idAluno = '$idAluno' GROUP BY idAluno";

$res = $con-> query($result_gastos);
$linha4 = $res->fetch_assoc();

$result_renda = "SELECT renda, SUM(renda) AS somaRenda from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno";

  
$res = $con-> query($result_renda);
$linha5 = $res->fetch_assoc();



setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = strftime('%d de %B de %Y',strtotime('today'));

use Dompdf\Dompdf;

// include autoloader
require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$dompdf->loadHtml(' <div align="right">  Página 1 de 4 </div>
<h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>  <img src=digitalizados/'. $linha['outro'] .' style="position:absolute; top:0px; left:480px; width: 10.0000%;" style="width: 10.0000%;"  >

Aluno: '.$linha['nomeAluno']. '<center><h4><u>QUADRO RESUMO</u></h4></center> 


 
     
    <p><h3> &nbsp; &nbsp; 1. Dados Aluno:</h3>


    <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 100.0000%;">  Nome completo: '. $linha['nomeAluno'] .'</td>
      </tr>
      <tr>
        <td style="width: 40.0000%;">Data de Nascimento: '. $linha['dtNascimento'] .' </td>
        <td style="width: 60.0000%;">Sexo: '. $linha['sexo'] .' </td>
      </tr>

      <tr>
      <td style="width: 40.0000%;"> RG Aluno: '. $linha['rgAluno'] .'  </td>
      <td style="width: 60.0000%;">  CPF Aluno: '. $linha['cpfAluno'] .' <br> </td>
    </tr>

    <tr>
    <td style="width: 40.0000%;"> Nome Pai: '. $linha['nomePai'] .'    </td>
    <td style="width: 60.0000%;">   Nome Mãe: '. $linha['nomeMae'] .' </td>
  </tr>

  <tr>
  <td style="width: 100.0000%;">    RG Responsável: '. $linha['rgResponsavel'] .'   </td>
  <td style="width: 100.0000%;">  CPF Responsável: '. $linha['cpfResponsavel'] .'    </td>
  </tr>

  

  <tr>
  <td style="width: 40.0000%;">   Profissão Pai: '. $linha['profissaoPai'] .'   </td>
  <td style="width: 60.0000%;">   Profissão Mãe: '. $linha['profissaoMae'] .'   </td>
  </tr>
  <tr>
  
  <td style="width: 40.0000%;"> Nacionalidade Aluno:  '. $linha['nacionalidadeAluno'] .' </td>
  <td style="width: 60.0000%;"> Nacionalidade Aluno:  '. $linha['nacionalidadeResponsavel'] .' </td>

  </tr>
  
    </tbody>
  </table>

  <h3> &nbsp; &nbsp; 2. Dados contato e matrícula:</h3>
  <table style="width: 100%;">
  <tbody>
  <tr>
  <td style="width: 100.0000%;">     Endereço : '. $linha['enderecoResidencial'] .'   </td>
  <td style="width: 100.0000%;">   Bairro: '. $linha['bairro'] .' </td>
  </tr>

  <tr>
  <td style="width: 100.0000%;"> Número: '. $linha['numeroEndereco'] .'  </td>
  <td style="width: 100.0000%;"> Telefone Contato: '. $linha['telefoneContato'] .'  </td>
  </tr>

  
  
	
	<tr>
	  <td style="width: 100.0000%;">    Data Matrícula: '. $linha['dtMatricula'] .' </td>
	</tr>

	<tr>
  <td style="width: 100.0000%;">   Nome Escola: '. $linha['escola'] .'  </td>
  <td style="width: 60.0000%;">  Turma Escola: '. $linha['turmaEscola'] .'  </td>
  </tr>

	<tr>
	  <td style="width: 40.0000%;"> Turno Escola: '. $linha['turnoEscola'] .'   </td>
	  <td style="width: 60.0000%;">  Ano Escola: '. $linha['anoEscola'] .'  </td>
	</tr>
<tr>
<td style="width: 100.0000%;">  Polo do Aluno: '. $linha['nomePolo'] .'  </td>
</tr>
  </tbody>
</table>

<p><h3> &nbsp; &nbsp; 3. Ficha médica:</h3>
    



<table border=1 style="width: 100%; ">
<tbody>
  <tr>
    <td style="width: 100.0000%;">  Tipo Sanguíneo: '. $linha['tipoSanguineo'] .'</td>
    <td style="width: 100.0000%;">Fator RH: '. $linha['fatorRh'] .' </td>
    <td style="width: 40.0000%;"> Peso: '. $linha['peso'] .'  </td>
  </tr>
  <tr>
  
    <td style="width: 60.0000%;">Altura: '. $linha['altura'] .' </td>
    <td style="width: 40.0000%;"> Emergencias Médicas: '. $linha['emergenciasMedicas'] .'  </td>
  </tr>

  

<tr>

<td style="width: 100.0000%;">  Equipamentos de auxílio ?: '. $linha['equipamentosAuxilio'] .' </td>
<td style="width: 100.0000%;">  Óculos: '. $linha['oculos'] .' </td>
<td style="width: 100.0000%;">  Aparelho Dentário: '. $linha['aparelhoDentario'] .' </td>
</tr>
<tr>
<td style="width: 100.0000%;">  Marcapasso: '. $linha['marcapasso'] .' </td>
<td style="width: 100.0000%;">  Sonda: '. $linha['sonda'] .' </td>
<td style="width: 100.0000%;">  Lentes Contato: '. $linha['lentesContato'] .' </td>

</tr>

<tr>
<td style="width: 100.0000%;">  Aparelho Audição: '. $linha['aparelhoAudicao'] .' </td>
<td style="width: 100.0000%;">  Outro Equipamento: '. $linha['outroEquipamento'] .' </td>
<td style="width: 100.0000%;">  Alergia ?: '. $linha['alergia'] .'    </td>

</tr>
<tr>
<td style="width: 100.0000%;">  Alergia Inseto: '. $linha['picadaInseto'] .'    </td>
<td style="width: 100.0000%;">  Alergia Medicamentos: '. $linha['alergiaMedicamentos'] .'    </td>
<td style="width: 100.0000%;">  Alergia Plantas: '. $linha['plantas'] .'    </td>
</tr>

<tr>
<td style="width: 100.0000%;">  Alergia Alimentos: '. $linha['alimentos'] .'    </td>
<td style="width: 100.0000%;">  Alergia outra: '. $linha['outraAlergia'] .'    </td>
<td style="width: 100.0000%;">  Alergia Descrição: '. $linha['outraAlergiaDesc'] .'    </td>
</tr>

</tbody>
</table>
  
    

    <img style="position:fixed; bottom:150px; left:-48px;" src="img/footer3.png">

    <div style="page-break-after: always;"></div>
<div align="right"> Página 2 de 4 </div>
<h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>

Aluno: '. $linha['nomeAluno'] .' <br>
<br>


<h3> &nbsp; &nbsp; 4. Ficha médica:</h3>
<table border=1 style="width: 100%;">
<tbody>

<tr>
  
  <td style="width: 60.0000%;">  Avisar em Emergências: '. $linha['avisarEmergencia'] .' <br> </td>
  
</tr>

<tr>

<td style="width: 100.0000%;">  Telefone Emergência: '. $linha['telefoneEmergencia'] .' </td>
</tr>

<tr>

<td style="width: 100.0000%;">  Permitir administrar medicamentos por profissionais em sáude que atuam no Grupo: '. $linha['permicao'] .' </td>
</tr>

<tr>
<td style="width: 100.0000%;">    Medicamentos em uso(contínuo ou não): '. $linha['medContinuos'] .'   </td>

</tr>



<tr>
<td style="width: 40.0000%;">  Plano médico: '. $linha['planoMedico'] .'   </td>

</tr>

<tr>
<td style="width: 60.0000%;">   Número carteira plano médico: '. $linha['numCarteira'] .'   </td>
</tr>

<tr>
<td style="width: 100.0000%;">     Sabe nadar ? : '. $linha['nadar'] .'   </td>

</tr>

<tr>
<td style="width: 100.0000%;">  É sonâmbulo: '. $linha['sonambulo'] .' </td>
</tr>

<tr>

<td style="width: 100.0000%;"> Problemas cardíacos: '. $linha['cardiaco'] .'  </td>
</tr>

<tr>

<td style="width: 40.0000%;"> Restrições a alimentos?:  '. $linha['restricoesAlimentos'] .' </td>


</tr>

<tr>

<td style="width: 40.0000%;"> Restrições a alimentos descrição:  '. $linha['restricoesAlimentosDesc'] .' </td>


</tr>
<tr>
<td style="width: 60.0000%;"> Possui impedimento Físico:  '. $linha['impedimentoFisico'] .' </td>
</tr>

<tr>
<td style="width: 100.0000%;">    Apresenta Distúrnio de comportamento?: '. $linha['distubioComportamento'] .' </td>

</tr>

<tr>
<td style="width: 100.0000%;">    Descrição Comportamento: '. $linha['disturbioComportamentoDesc'] .' </td>
</tr>

<tr>
<td style="width: 100.0000%;">   Apresenta Distúrbio de alimentar?: '. $linha['disturbioAlimentar'] .'  </td>


</tr>

<tr>
<td style="width: 100.0000%;">   Descrição Alimentar: '. $linha['disturbioAlimentarDesc'] .'  </td>
</tr>
<tr>
<td style="width: 60.0000%;">  Apresenta Distúbio de ansiedade Fóbica: '. $linha['disturbioAnsiedade'] .'  </td>

</tr>

<tr>
<td style="width: 60.0000%;">  Descrição Ansiedade: '. $linha['disturbioAnsiedadeDesc'] .'  </td>
</tr>
<tr>
<td style="width: 40.0000%;"> Deficiência: '. $linha['deficiencia'] .'   </td>

</tr>
<tr>
<td style="width: 40.0000%;"> Visual: '. $linha['fisica'] .'   </td>
</tr

<tr>
<td style="width: 40.0000%;"> Auditiva: '. $linha['auditiva'] .'   </td>
</tr>
<tr>
<td style="width: 40.0000%;"> Visual: '. $linha['visual'] .'   </td>



</tr>
<tr>
<td style="width: 40.0000%;"> Intelectual: '. $linha['intectual'] .'   </td>

</tr>
</tbody>
</table>
<br>




    <div style="page-break-after: always;"></div>
    <div align="right"> Página 3 de 4 </div>
    <h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>
    
    Aluno: '. $linha['nomeAluno'] .' <br>
    <br>
    <h3> &nbsp; &nbsp; 5. Composição Familiar:</h3>
'. $html . '
<br>

<p><h3> &nbsp; &nbsp; 6. Dados da Ficha Socioeconômica:</h3>
    
    
<table border=1 style="width: 100%;">
<tbody>
 
  <tr>
    <td style="width: 40.0000%;">Gestante na familia ?: '. $linha2['gestante'] .' </td>
    <td style="width: 60.0000%;">Sem Documento: '. $linha2['semDocumento'] .' </td>
  </tr>

  <tr>
  <td style="width: 40.0000%;">Dependente Químico na família ?: '. $linha2['dependenteQuimico'] .' </td>
  <td style="width: 60.0000%;">Nome Dependente Químico: '. $linha2['nomeDependenteQui'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Gastos com medicamentos ?: '. $linha2['gastosMedicamentos'] .' </td>
<td style="width: 60.0000%;">Valor Medicamentos: '. $linha2['gastosMedicamentosValor'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Doeça crônica ou deficiência na familia ?: '. $linha2['doencaFamilia'] .' </td>
<td style="width: 60.0000%;">Nome doença ou deficiência: '. $linha2['nomeDoencaFamilia'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Residência ?: '. $linha2['residencia'] .' </td>
<td style="width: 60.0000%;">Valor Residência: '. $linha2['valorResidencia'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Número de Quartos ?: '. $linha2['numQuartos'] .' </td>
<td style="width: 60.0000%;">Número de Banheiros: '. $linha2['numBanheiros'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Tipo de Água ?: '. $linha2['agua'] .' </td>
<td style="width: 60.0000%;">Valor da Água: '. $linha2['valorAgua'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Possui Energia Elétrica ?: '. $linha2['energia'] .' </td>
<td style="width: 60.0000%;">Valor energia: '. $linha2['valorEnergia'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Tipo escola: '. $linha2['tipoEscola'] .' </td>
<td style="width: 60.0000%;">Valor escola: '. $linha2['valorEscola'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Valor escola Idioma: '. $linha2['valorIdioma'] .' </td>
<td style="width: 60.0000%;">Valor curso informática: '. $linha2['valorInformatica'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Gastos com Alimentacao ?: '. $linha2['valorAlimentacao'] .' </td>
<td style="width: 60.0000%;">Parentesco Gestante: '. $linha2['parentescoGestante'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Bolsa Família ?: '. $linha2['bolsaFamilia'] .' </td>
<td style="width: 60.0000%;">CAD único: '. $linha2['cadUnico'] .' </td>
</tr>



</tbody>
</table>
<br>

    
    
    


        <div style="page-break-after: always;"></div>
        <div align="right"> Página 4 de 4 </div>
        <h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>
        
        Aluno: '. $linha['nomeAluno'] .' <br>
        <br>
        
        <p><h3> &nbsp; &nbsp; 7. Gastos famíliar:</h3>
<table border=1 style="width: 100%;">
<tbody>

<tr>
<td style="width: 100.0000%;">Renda Bruta: R$ '. $linha5['somaRenda'] .' </td>
<td style="width: 100.0000%;">Gastos Totais: R$ '. $linha4['gastos'] .' </td>
<td style="width: 100.0000%;">Renda Líquida: R$ '. $linha2['rendaTotal'] .' </td>


</tbody>
</table>
<br>
        
        
        <h3> &nbsp; &nbsp; AUTORIZAÇÃO PARA USO DE IMAGEM, VOZ E VÍDEO:</h3>
        <div align="justify">
        Autorizo a <strong>GUARDA MIRIM DE FRUTAL/MG</strong>, associação privada sem fins lucrativos, 
        inscrita no CNPJ sob o nº 03.284.717/0001-09, com sede na Rua Floriano Peixoto, nº 403, Centro,
        Frutal/MG, CEP 38.200-000 a utilizar-se das imagens, voz e vídeo minha, e/ou daquele que represento ou assisto, captadas durante atividades, 
        instruções, missões, durante o horário de serviço ou expediente ou a elas relacionadas, para a edição de filmes e fotos divulgando a Guarda-Mirim de Frutal.
        <p>Declaro que as informações acima foram por mim prestadas e são de minha inteira e total responsabilidade, declarando-os verdadeiros.</p></div>
        <br>
        <table style="width: 100%;">
          <tbody>
          <tr>
          <td style="width: 45.0000%;">______________________________________ </td>
          <td style="width: 10.0000%;"></td>
          <td style="width: 45.0000%;"><center>______________________________________</center> </td>
        </tr>
        <tr>
          <td style="width: 45.0000%;"><center><strong>Assinatura Responsável</strong></center></td>
          <td style="width: 10.0000%;"></td>
          <td style="width: 45.0000%;"><center><strong> Assinatura Aluno </strong> </center></td>
        </tr>
        
            </tbody>
            </table>
        
            <br>
        <br>
        <br>
        <br>
        
        <table style="width: 100%;">
          <tbody>
            <tr>
              <td style="width: 45.0000%;">______________________________________ </td>
              <td style="width: 10.0000%;"> </td>
              <td style="width: 45.0000%;"><center>______________________________________</center> </td>
            </tr>
            <tr>
              <td style="width: 45.0000%;"><center><strong>Testemunha 1</strong></center></td>
              <td style="width: 10.0000%;"> </td>
              <td style="width: 45.0000%;"> <center> <strong> Testemunha 2</strong></center> </td>
            </tr>
        
            </tbody>
            </table>
    


        

');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
ob_clean();
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Matrícula de '.$linha['nomeAluno']. '.pdf',
array ("Attachment" =>true //para realizar o download somente alterar para true
)
);

echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_alunos.php'</script>";
$con->close();

?>