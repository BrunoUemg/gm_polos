<?php

include_once "dao/conexao.php";

$idAluno = $_POST['idAluno'];
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


$con->query("UPDATE aluno SET tipoSanguineo = '$tipoSanguineo', fatorRh = '$fatorRh', altura = '$altura',
peso = '$peso', equipamentosAuxilio = '$equipamentosAuxilio', permicao = '$permicao', emergenciasMedicas = '$emergenciasMedicas',
avisarEmergencia = '$avisarEmergencia', medContinuos = '$medContinuos', alergia = '$alergia', planoMedico = '$planoMedico',
numCarteira = '$numCarteira', nadar = '$nadar', sonambulo = '$sonambulo', cardiaco = '$cardiaco', restricoesAlimentos = '$restricoesAlimentos',
impedimentoFisico = '$impedimentoFisico', distubioComportamento = '$distubioComportamento', disturbioAlimentar = '$disturbioAlimentar',
disturbioAnsiedade = '$disturbioAnsiedade', deficiencia = '$deficiencia', telefoneEmergencia = '$telefoneEmergencia',
oculos = '$oculos', aparelhoDentario = '$aparelhoDentario', marcapasso = '$marcapasso',
sonda = '$sonda', aparelhoAudicao = '$aparelhoAudicao', lentesContato = '$lentesContato', outroEquipamento = '$outroEquipamento',
picadaInseto = '$picadaInseto', alimentos = '$alimentos', alergiaMedicamentos = '$alergiaMedicamentos', outraAlergia = '$outraAlergia', outraAlergiaDesc = '$outraAlergiaDesc',
disturbioComportamentoDesc = '$distubioComportamento', disturbioAnsiedadeDesc = '$disturbioAnsiedadeDesc',
disturbioAlimentarDesc = '$disturbioAlimentarDesc', fisica = '$fisica', intectual = '$intectual', visual = '$visual',
auditiva = '$auditiva', restricoesAlimentosDesc = '$restricoesAlimentosDesc'  WHERE idAluno = '$idAluno'");


$con->query("UPDATE processamento_cadastro set etapa = 'Documento Digitalizado', status = 0 where idAluno = '$idAluno'");


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
 if ($con->query($sql6)=== TRUE ){ 



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
 C.cpfIntegrante_composicao,
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