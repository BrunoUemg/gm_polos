<?php 

include_once "dao/conexao.php";

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




$sql = "INSERT INTO aluno ( nomeAluno, dtNascimento, nomePai, profissaoPai, nomeMae, profissaoMae, sexo, enderecoResidencial, bairro, idPolo, telefoneContato, escola, anoEscola, turmaEscola, turnoEscola,
nacionalidadeAluno, nacionalidadeResponsavel, rgAluno, cpfAluno, rgResponsavel, cpfResponsavel, dtMatricula, status, tipoSanguineo, fatorRh,
altura, peso, equipamentosAuxilio, permicao, emergenciasMedicas, avisarEmergencia, medContinuos, alergia, planoMedico, numCarteira,
nadar, sonambulo, cardiaco, restricoesAlimentos, impedimentoFisico, distubioComportamento, disturbioAlimentar, disturbioAnsiedade,
deficiencia    ) VALUES ('$nomeAluno', '$dtNascimento', '$nomePai', '$profissaoPai', '$nomeMae', '$profissaoMae', 
'$sexo', '$enderecoResidencial', '$bairro', '$idPolo', '$telefoneContato','$escola', '$anoEscola', '$turmaEscola', '$turnoEscola',
'$nacionalidadeAluno', '$nacionalidadeResponsavel', '$rgAluno', '$cpfAluno', '$rgResponsavel', '$cpfResponsavel','$dtMatricula', 1, '$tipoSanguineo', '$fatorRh',
'$altura', '$peso', '$equipamentosAuxilio', '$permicao', '$emergenciasMedicas', '$avisarEmergencia', '$medContinuos', '$alergia', '$planoMedico',
'$numCarteira', '$nadar', '$sonambulo', '$cardiaco', '$restricoesAlimentos', '$impedimentoFisico', '$distubioComportamento', '$disturbioAlimentar',
'$disturbioAnsiedade', '$deficiencia' )";

  

if ($con->query($sql) === TRUE){

	echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_alunos.php'</script>";
} else {
	echo "Erro para inserir: " . $con->error; 
}

$query = mysqli_query($con, "SELECT Max(idAluno)  AS codigo FROM aluno");
$result = mysqli_fetch_array($query);

$idAluno = $result['codigo'];


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
P.idPolo,
P.nomePolo
from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1  and A.idAluno = $idAluno ";

$res = $con-> query($sql4);
$linha = $res->fetch_assoc();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = strftime('%d de %B de %Y',strtotime('today'));

use Dompdf\Dompdf;

// include autoloader
require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$dompdf->loadHtml(' <div align="right"> Página 1 de 9 </div>
<h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>
Aluno: '.$linha['nomeAluno']. '<center><h2><u>QUADRO RESUMO</u></h2></center> 

   
 
     
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
    <td style="width: 60.0000%;">   Nome Mãe:'. $linha['nomeMae'] .' </td>
  </tr>

  <tr>
  <td style="width: 100.0000%;">    RG Responsável: '. $linha['rgResponsavel'] .'   </td>
  <td style="width: 100.0000%;">  CPF Responsável: '. $linha['cpfResponsavel'] .'    </td>
  </tr>

  

  <tr>
  <td style="width: 40.0000%;">   Profissão Pai: '. $linha['profissaoPai'] .'   </td>
  <td style="width: 60.0000%;">   Profissão Mãe: '. $linha['profissaoMae'] .'   </td>
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
  
  <td style="width: 100.0000%;"> Telefone Contato: '. $linha['telefoneContato'] .'  </td>
  </tr>

  <tr>
  
  <td style="width: 40.0000%;"> Nacionalidade Aluno:  '. $linha['nacionalidadeAluno'] .' </td>
  <td style="width: 60.0000%;"> Nacionalidade Aluno:  '. $linha['nacionalidadeResponsavel'] .' </td>

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
    



<table style="width: 100%;">
<tbody>
  <tr>
    <td style="width: 100.0000%;">  Tipo Sanguíneo: '. $linha['tipoSanguineo'] .'</td>
    <td style="width: 100.0000%;">Fator RH: '. $linha['fatorRh'] .' </td>
  </tr>
  <tr>
  <td style="width: 40.0000%;"> Peso: '. $linha['peso'] .'  </td>
    <td style="width: 60.0000%;">Altura: '. $linha['altura'] .' </td>
  </tr>

  <tr>
  <td style="width: 40.0000%;"> Emergencias Médicas: '. $linha['emergenciasMedicas'] .'  </td>
  <td style="width: 60.0000%;">  Avisar em Emergências: '. $linha['avisarEmergencia'] .' <br> </td>
</tr>
<tr>

<td style="width: 100.0000%;">  Utiliza os seguintes equipamentos de auxílio: '. $linha['equipamentosAuxilio'] .' </td>
</tr>
<tr>

<td style="width: 100.0000%;">  Permitir administrar medicamentos por profissionais em sáude que atuam no Grupo: '. $linha['permicao'] .' </td>
</tr>

<tr>
<td style="width: 100.0000%;">    Medicamentos em uso(contínuo ou não): '. $linha['medContinuos'] .'   </td>
<td style="width: 100.0000%;">  Alergia cite se tiver: '. $linha['alergia'] .'    </td>
</tr>



<tr>
<td style="width: 40.0000%;">  Plano médico: '. $linha['planoMedico'] .'   </td>
<td style="width: 60.0000%;">   Número carteira plano médico: '. $linha['numCarteira'] .'   </td>
</tr>


</tbody>
</table>
  
    

    <img style="position:fixed; bottom:150px; left:-48px;" src="img/footer3.png">

    <div style="page-break-after: always;"></div>
<div align="right"> Página 2 de 2 </div>
<h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>

Aluno: '. $linha['nomeAluno'] .' <br>
<br>


<h3> &nbsp; &nbsp; 4. Ficha médica:</h3>
<table style="width: 100%;">
<tbody>
<tr>
<td style="width: 100.0000%;">     Sabe nadar ? : '. $linha['nadar'] .'   </td>
<td style="width: 100.0000%;">  É sonâmbulo: '. $linha['sonambulo'] .' </td>
</tr>

<tr>

<td style="width: 100.0000%;"> Problemas cardíacos: '. $linha['cardiaco'] .'  </td>
</tr>

<tr>

<td style="width: 40.0000%;"> Restrições a alimentos?:  '. $linha['restricoesAlimentos'] .' </td>


</tr>
<tr>
<td style="width: 60.0000%;"> Possui impedimento Físico:  '. $linha['impedimentoFisico'] .' </td>
</tr>

<tr>
<td style="width: 100.0000%;">    Apresenta Distúrnio de comportamento? : '. $linha['distubioComportamento'] .' </td>
</tr>

<tr>
<td style="width: 100.0000%;">   Apresenta Distúrbio de alimentar?: '. $linha['disturbioAlimentar'] .'  </td>

</tr>
<tr>
<td style="width: 60.0000%;">  Apresenta Distúbio de ansiedade Fóbica: '. $linha['disturbioAnsiedade'] .'  </td>
</tr>
<tr>
<td style="width: 40.0000%;"> Deficiência: '. $linha['deficiencia'] .'   </td>

</tr>

</tbody>
</table>

<h3> &nbsp; &nbsp; AUTORIZAÇÃO PARA USO DE IMAGEM, VOZ E VÍDEO:</h3>
<div align="justify">
Autorizo a <strong>GUARDA-MIRIM DE FRUTAL/MG</strong>, associação privada sem fins lucrativos, 
inscrita no CNPJ sob o nº 03.284.717/0001-09, com sede na Rua Floriano Peixoto, nº 403, Centro,
Frutal/MG, CEP 38.200-000 a utilizar-se das imagens, voz e vídeo minha, e/ou daquele que represento ou assisto, captadas durante atividades, 
instruções, missões, durante o horário de serviço ou expediente ou a elas relacionadas, para a edição de filmes e fotos divulgando a Guarda-Mirim de Frutal.
Declaro que as informações acima foram por mim prestadas e são de minha inteira e total responsabilidade, declarando-os verdadeiros.</div>
<br>
<table style="width: 100%;">
	<tbody>
		<tr>
      <td style="width: 45.0000%;">______________________________________ </td>
      
	
		</tr>
		<tr>
      <td style="width: 45.0000%;"><strong>Assinatura Responsável</strong></td>
     
		
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
$dompdf->stream("contrato.pdf",
array ("Attachment" =>false //para realizar o download somente alterar para true
)
);




?>