<?php
include_once "header.php";

include_once "dao/conexao.php";

$resultPolo = "SELECT * FROM monitor where idMonitor = $_SESSION[idMonitor]";
$res = $con->query($resultPolo);
$linha = $res->fetch_assoc();


$result_consultaAluno = "SELECT A.idAtividades,A.nomeAtividade,A.descricao,A.dataAtividade,A.tipoAtividade,A.dataEntrega,A.documentoApoio,P.nomePolo 
FROM atividades A, polo P WHERE   A.idPolo = $linha[idPolo] and A.idPolo = P.idPolo   ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);

$result_Escola ="SELECT * FROM escola ";
$resultado_Escola= mysqli_query($con, $result_Escola);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar atividades</h4>
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
                      <th>Nome da atividade</th>
                      <th>Data de Entrega</th>
                     <th>Tipo da atividade</th>
                      <th>Entregas/editar</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAluno)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAtividade']; ?></td>
                       
                        <td><?php 
                        $dataBanco = $rows_consultaAluno['dataEntrega'];
                        $dataEntrega = date("d/m/Y", strtotime($dataBanco));
                        echo $dataEntrega; ?></td>
                     <td><?php echo $rows_consultaAluno['tipoAtividade'] ?></td>

                        <td>
                        <?php echo "<a class='btn btn-default' title='Tarefas concluídas' href='corrigir_tarefa.php?idAtividades=" . $rows_consultaAluno['idAtividades'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; ?>
                        <?php echo "<a class='btn btn-default' title='Alterar' href='consultar_atividade_gerais.php?id=" . $rows_consultaAluno['idAtividades'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaAluno['idAtividades'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                     

                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaAluno['idAtividades']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Aluno</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_atividade.php" method="POST" enctype="multipart/form-data">

                                    <input type="text" readonly hidden name="idAtividades" class="form-control" value="<?php echo $rows_consultaAluno['idAtividades']; ?>">
                                  
                                    <label>Nome Atividade</label>
                                    <input type="text" class="form-control" required name="nomeAtividade" value="<?php echo $rows_consultaAluno['nomeAtividade']; ?>">
                                   
                                    <label>Data Entrega</label>
                                    <input type="date" class="form-control" required name="dataEntrega" value="<?php echo $rows_consultaAluno['dataEntrega']; ?>">
                                    <label for="">Descrição</label>
                                 <textarea name="descricao" id="" cols="20" rows="10" class="form-control" value="<?php echo $rows_consultaAluno['descricao']; ?>"></textarea>
                                 <br>
                                 <label for="">Alterar documento apoio</label>
                                 <input type="file" name="documentoApoio" class="form-control" id="">
                     
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