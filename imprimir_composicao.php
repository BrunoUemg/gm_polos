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
A.numeroEndereco,
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
A.telefoneEmergencia,
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
A.desArquivo1,
A.desArquivo2,
A.desArquivo3,
A.desArquivo4,
A.desArquivo5,
A.desArquivo6,
A.desArquivo7,
A.desArquivo8,
A.desArquivo9,
A.desArquivo10,
P.idPolo,
P.nomePolo

from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1 and A.idAluno = '$idAluno'  ";
$res = $con-> query($result_consultaAluno);
$linha = $res->fetch_assoc();

$result_consultaComposicao = "SELECT C.idComposicao_familiar,
C.idAluno,
C.nomeIntegrante,
C.renda,
C.parentesco,
C.profissao,
C.escolaridade,
C.idade

from composicao_familiar C
where C.idAluno = '$idAluno'  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Composição familiar do Aluno <?php echo $linha['nomeAluno']?></h4>
      </div>
      <div class="row">

<div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <div id="pdf"> 
                <table id="basic-datatables" class="display table table-striped table-hover">
                
                  <thead>
                    <tr>
                      <th>Nome Integrante</th>
                      <th>Renda</th>
                      <th>Parentesco</th>
                      <th>Idade</th>
                      <th>Profissão</th>
                      <th>Escolaridade</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php while ($rows_consultaComposicao = mysqli_fetch_assoc($resultado_consultaComposicao)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaComposicao['nomeIntegrante']; ?></td>
                       
                        <td><?php echo $rows_consultaComposicao['renda']; ?></td>
                        <td><?php echo $rows_consultaComposicao['parentesco']; ?></td>
                        <td><?php echo $rows_consultaComposicao['idade']; ?></td>
                        <td><?php echo $rows_consultaComposicao['profissao']; ?></td>
                        <td><?php echo $rows_consultaComposicao['escolaridade']; ?></td>
                        
                    </div>
                      
                       
                     
                        
       </tr>
       <?php } ?>
     
                  </tbody>
                </table>
               
              </div>
            </div>
          </div>
        </div>
        <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='ficha_socioeconomica.php'" value="Cancelar">
        <button class="btn btn-success" type="button" data-dismiss="modal" onclick="CriaPDF()"> Gerar pdf</button>
                    </div>
                    </div>
                    </div>
                    
<script src="js/mascaras.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script src="js/dataTables.bootstrap4.min.js"></script>
     
       
     

<?php
include_once("footer.php");

?>
<script>
    function CriaPDF() {
        var minhaTabela = document.getElementById('pdf').innerHTML;
        var style = "<style>";
        style = style + "table {width: 100%;font: 20px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";
        // CRIA UM OBJETO WINDOW
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write('<title>Composição familiar de <?php echo $linha['nomeAluno']?></title>');   // <title> CABEÇALHO DO PDF.
        win.document.write(style);                                     // INCLUI UM ESTILO NA TAB HEAD
        win.document.write('</head>');
        win.document.write('<div>');
        win.document.write(minhaTabela);                          // O CONTEUDO DA TABELA DENTRO DA TAG BODY
        win.document.write('</div></html>');
        win.document.close(); 	                                         // FECHA A JANELA
        win.print();                                                            // IMPRIME O CONTEUDO
    }
</script>