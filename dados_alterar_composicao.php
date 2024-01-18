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
C.idade,
C.estadoCivil,
C.cpfAluno_composicao

from composicao_familiar C
where C.idAluno = '$idAluno' and status = 1  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);


?>

         

         

              
              

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
<div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
<center><div class="card-title">Composição familiar de <?php echo $linha['nomeAluno']?></div></center>

            <div class="card-body">
              <div class="table-responsive">
              <div id="pdf"> 
                <table id="basic-datatables" class="display table table-striped table-hover">
                
                  <thead>
                    <tr>
                      <th>Nome Integrante</th>
                      <th>Renda</th>
                      <th>Parentesco</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php while ($rows_consultaComposicao = mysqli_fetch_assoc($resultado_consultaComposicao)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaComposicao['nomeIntegrante']; ?></td>
                       
                        <td><?php echo $rows_consultaComposicao['renda']; ?></td>
                        <td><?php echo $rows_consultaComposicao['parentesco']; ?></td>
                    </div>
                        <td>
                        <?php echo "<a class='btn btn-default' title='Alterar' href='consultar_alunos.php?id=" . $rows_consultaComposicao['idComposicao_familiar'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaComposicao['idComposicao_familiar'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                        <?php  echo "<a  class='btn btn-default' title='Excluir' href='remover_dados_integrante.php?idComposicao_familiar=" .$rows_consultaComposicao['idComposicao_familiar']. "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">"?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>
                       
                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaComposicao['idComposicao_familiar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Aluno</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_composicao.php" method="POST">
                                     <label for="">CPF aluno</label>
                                    <input type="text"  name="cpfAluno_composicao" class="form-control" value="<?php echo $rows_consultaComposicao['cpfAluno_composicao']; ?>" onkeyup="mascara('###.###.###-##',this,event,true)">
                                    <input type="text" readonly hidden name="idComposicao_familiar" class="form-control" value="<?php echo $rows_consultaComposicao['idComposicao_familiar']; ?>">
                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaComposicao['idAluno']; ?>">

                                    <label>Nome Integrante</label>
                                    <input type="text" class="form-control" required name="nomeIntegrante" value="<?php echo $rows_consultaComposicao['nomeIntegrante']; ?>">

                                  
                                    <label>Renda</label>
                                    <input type="text" class="form-control" required name="renda" value="<?php echo $rows_consultaComposicao['renda']; ?>" onKeyPress="return(moeda(this,'.',',',event))">

                                    <label for="">Parentesco</label>
			  <select class="form-control" name="parentesco" id="">
				  <option value="">Selecione</option>
				  <option value="Pai"<?php if($rows_consultaComposicao['parentesco'] == 'Pai') echo 'selected'; ?>>Pai</option>
				   <option value="Padrasto"<?php if($rows_consultaComposicao['parentesco'] == 'Padrasto') echo 'selected'; ?>>Padrasto</option>
				    <option value="Madrasta"<?php if($rows_consultaComposicao['parentesco'] == 'Madrasta') echo 'selected'; ?>>Madrasta</option>
				  <option value="Mãe"<?php if($rows_consultaComposicao['parentesco'] == 'Mãe') echo 'selected'; ?>>Mãe</option>
				  <option value="Filho"<?php if($rows_consultaComposicao['parentesco'] == 'Filho') echo 'selected'; ?>>Filho</option>
				  <option value="Irmão"<?php if($rows_consultaComposicao['parentesco'] == 'Irmão') echo 'selected'; ?>>Irmão</option>
				  <option value="Irmã"<?php if($rows_consultaComposicao['parentesco'] == 'Irmã') echo 'selected'; ?>>Irmã</option>
				  <option value="Avó"<?php if($rows_consultaComposicao['parentesco'] == 'Avó') echo 'selected'; ?>>Avó</option>
				  <option value="Avô"<?php if($rows_consultaComposicao['parentesco'] == 'Avô') echo 'selected'; ?>>Avô</option>
				  <option value="Tio"<?php if($rows_consultaComposicao['parentesco'] == 'Tio') echo 'selected'; ?>>Tio</option>
				  <option value="Tia"<?php if($rows_consultaComposicao['parentesco'] == 'Tia') echo 'selected'; ?>>Tia</option>
				  <option value="Primo"<?php if($rows_consultaComposicao['parentesco'] == 'Primo') echo 'selected'; ?>>Primo</option>
				  <option value="Prima"<?php if($rows_consultaComposicao['parentesco'] == 'Prima') echo 'selected'; ?>>Prima</option>
				  <option value="Bisavó"<?php if($rows_consultaComposicao['parentesco'] == 'Bisavó') echo 'selected'; ?>>Bisavó</option>
				  <option value="Bisavô"<?php if($rows_consultaComposicao['parentesco'] == 'Bisavô') echo 'selected'; ?>>Bisavô</option>
				  </select>
                                    <label>Escolaridade</label>
                                  <select class="form-control" name="escolaridade" id="">
                                  
                                  <option value='Ensino Fundamental Incompleto' <?php if ($rows_consultaComposicao['escolaridade'] == 'Ensino Fundamental Incompleto') echo 'selected'; ?>>Ensino Fundamental Incompleto</option>
                                  <option value='Ensino Fundamental Completo' <?php if ($rows_consultaComposicao['escolaridade'] == 'Ensino Fundamental Completo') echo 'selected'; ?>>Ensino Fundamental Completo</option>
                                  <option value='Ensino Médio Incompleto' <?php if ($rows_consultaComposicao['escolaridade'] == 'Ensino Médio Incompleto') echo 'selected'; ?>>Ensino Médio Incompleto</option>
                                  <option value='Ensino Médio Completo' <?php if ($rows_consultaComposicao['escolaridade'] == 'Ensino Médio Completo') echo 'selected'; ?>>Ensino Médio Completo</option>
                                  <option value='Ensino Superior Incompleto' <?php if ($rows_consultaComposicao['escolaridade'] == 'Ensino Superior Incompleto') echo 'selected'; ?>>Ensino Superior Incompleto</option>
                                  <option value='Ensino Superior Completo' <?php if ($rows_consultaComposicao['escolaridade'] == 'Ensino Superior Completo') echo 'selected'; ?>>Ensino Superior Completo</option>
                                   
                                   
                                    
                                    </select>

                                    <label>Profissão</label>
                                    <select class="form-control" required name="profissao">
                                      <option value="">Selecione a Profissão</option>
                                      <?php
                                        $resultado_profissao1 = mysqli_query($con, "SELECT * FROM profissao");
                                        while ($row_profissao1 = mysqli_fetch_assoc($resultado_profissao1)) { ?>
                                        <option value="<?php echo $row_profissao1['nomeProfissao']; ?>" <?php if ($rows_consultaComposicao['profissao'] == $row_profissao1['nomeProfissao']) echo 'selected'; ?>><?php echo $row_profissao1['nomeProfissao']; ?></option>
                                      <?php } ?> 
                                    </select>

                                    
                                    <label>Idade</label>
                                    <input type="text" class="form-control" required name="idade" value="<?php echo $rows_consultaComposicao['idade']; ?>">

                                    <label>Estado Civil</label>
                                    <input type="text" class="form-control" required name="estadoCivil" value="<?php echo $rows_consultaComposicao['estadoCivil']; ?>">
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        
       </tr>
       <?php } ?>
      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         
    </div>
    
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

<script language="javascript">   
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
</script>
<script>
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
        "language": {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      });
    });
  </script>

