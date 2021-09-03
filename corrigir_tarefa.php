<?php
include_once "header.php";

include_once "dao/conexao.php";

$idAtividades = $_GET['idAtividades'];

$resultPolo = "SELECT * FROM monitor where idMonitor = $_SESSION[idMonitor]";
$res = $con->query($resultPolo);
$linha = $res->fetch_assoc();


$result_consultaAluno = "SELECT T.pdfAtividade,T.idAluno,T.idTarefa,T.idAtividade,T.confirmacao,T.nota, A.nomeAluno,T.idTarefa FROM tarefa T, aluno A 
WHERE A.idAluno = T.idAluno and T.idAtividade = $idAtividades and A.idPolo = $linha[idPolo] ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);

$result_Escola ="SELECT * FROM escola ";
$resultado_Escola= mysqli_query($con, $result_Escola);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar entregas</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome do Aluno</th>
                   <th>Status correção</th>
                     
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAluno)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                     <td><?php echo $rows_consultaAluno['confirmacao'];?></td>
                     

                        <td>

                        <?php 
                        if($rows_consultaAluno['confirmacao'] != 'Concluído'){
                        echo "<a class='btn btn-default' title='Visualizar tarefa de ".$rows_consultaAluno['nomeAluno']."' href='visualizar_tarefa_aluno.php?idTarefa=" . $rows_consultaAluno['idTarefa'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; } ?>
                      
                        <?php 
                        if($rows_consultaAluno['nota'] >= 0){
                        echo "<a class='btn btn-default' title='Alterar' href='consultar_atividade_gerais.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaAluno['idAluno'] . "'>" ?>Editar nota<?php echo "</a>";  }?>
                     

                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Editar a nota de <?php echo $rows_consultaAluno['nomeAluno'] ?></h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="visualizar_tarefa_aluno.php" method="POST">

                               <label for="">Editar a nota</label>    
                                <input class="form-control" type="Number" name="nota" value="<?php echo $rows_consultaAluno['nota'] ?>">
                             <input type="text" hidden name="confirmacao" value="Concluído">
                             <input type="text" hidden name="idTarefa" value="<?php echo $rows_consultaAluno['idTarefa']; ?>">
                             <input type="text" hidden name="idAtividade" value="<?php echo $rows_consultaAluno['idAtividade']; ?>">
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
  

  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="js/states.js"></script>
  <script src="js/mascaras.js"></script>

  
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



  <?php
include_once("footer.php");

?>