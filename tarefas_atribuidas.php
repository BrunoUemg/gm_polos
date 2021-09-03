<?php
include_once "header.php";

include_once "dao/conexao.php";

$resultPolo = "SELECT * FROM aluno where idAluno = $_SESSION[idAluno]";
$res = $con->query($resultPolo);
$linha = $res->fetch_assoc();

$result_consultaAluno = "SELECT A.nomeAtividade,A.tipoAtividade,A.idAtividades,A.dataEntrega FROM tarefa_atividade T, atividades A WHERE T.status = 0 and T.idAtividade = A.idAtividades and T.idPolo = $linha[idPolo] and T.idAluno = $_SESSION[idAluno] order by A.idAtividades DESC  ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);

$result_Escola ="SELECT * FROM escola ";
$resultado_Escola= mysqli_query($con, $result_Escola);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Tarefas Atribuídas</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatable" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome da atividade</th>
                      <th>Data de Entrega</th>
                      <th>Tipo</th>
                      <th></th>
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
                        <td><?php echo $rows_consultaAluno['tipoAtividade']; ?></td>

                        <td>
                        <?php echo "<a class='btn btn-default' title='Vizualizar Tarefa' href='visualizar_tarefas.php?idAtividades=" . $rows_consultaAluno['idAtividades'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; ?>
                      
                     

                          <!-- Modal-->

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