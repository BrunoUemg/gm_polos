<?php
include_once "dao/conexao.php";
include_once("header.php");

$idAluno = $_GET['idAluno'];

$result_consultaAluno = "SELECT A.idAluno,
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
A.rgalunodigi,
A.cpfalunodigi,
A.cpfrespdigi,
A.cpfresp2digi,
A.rgrespdigi,
A.rgresp2digi,
A.comprovanteresidigi,
A.atestadoescolardigi,
A.outro,
A.fotoAluno,
P.idPolo,
P.nomePolo
from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1 and A.idAluno = '$idAluno' ";
$res = $con-> query($result_consultaAluno);
$linha = $res->fetch_assoc();

?>

         
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Visualizar Documentos</div>
            </div>
                 
                <form action="envio_cadastro_encontro.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">
               
                <div class="form-group">          


<div class="form-group col-md-4">
<label for="">CPF Aluno</label>
<embed src="<?php echo 'digitalizados/'. $linha['cpfalunodigi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">RG Aluno</label>
<embed src="<?php echo 'digitalizados/'. $linha['rgalunodigi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">CPF Responsável</label>
<embed src="<?php echo 'digitalizados/'. $linha['cpfrespdigi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">RG Responsável</label>
<embed src="<?php echo 'digitalizados/'. $linha['rgrespdigi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>
<div class="form-group col-md-4">
<label for="">CPF Responsável 2</label>
<embed src="<?php echo 'digitalizados/'. $linha['cpfresp2digi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">RG Responsável 2</label>
<embed src="<?php echo 'digitalizados/'. $linha['rgresp2digi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">Comprovante Residência</label>
<embed src="<?php echo 'digitalizados/'. $linha['comprovanteresidigi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">Atestado Escolar</label>
<embed src="<?php echo 'digitalizados/'. $linha['atestadoescolardigi'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">Foto Aluno</label>
<embed src="<?php echo 'digitalizados/'. $linha['fotoAluno'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>

<div class="form-group col-md-4">
<label for="">Outro</label>
<embed src="<?php echo 'digitalizados/'. $linha['outro'] .  '' ?>"  width="580" height="400" type='application/pdf' >
</div>
              </div>
            
           
    
              <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='consultar_alunos.php'" value="Cancelar">
               
              </div>
            </div>
</form>




              
                       </div>

              </div>
</div> 

<script src="js/mascaras.js"></script>
    




<?php
include_once("footer.php");

?>