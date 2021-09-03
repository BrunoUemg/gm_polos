<?php
include_once "header.php";

include_once "dao/conexao.php";

$idAluno = $_GET['idAluno'];
$result_consultaBoletim = "SELECT * FROM boletim where idAluno = '$idAluno'   ";
$resultado_consultaBoletim = mysqli_query($con, $result_consultaBoletim);

$result_Escola ="SELECT * FROM escola ";
$resultado_Escola= mysqli_query($con, $result_Escola);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Visualizar boletim dos alunos</h4>
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
                      <th>Data boletim</th>
                      <th>Visualizar</th>
                  
                   
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php while ($rows_consultaBoletim = mysqli_fetch_assoc($resultado_consultaBoletim)) {
                      ?>
                      <tr>
                        <td><?php 
                        $dataBanco = $rows_consultaBoletim['dataBoletim'];
                        $data = date('d/m/y', strtotime($dataBanco));
                        echo $data; ?></td>
                       
                     
                     <td> <a  class='btn btn-default' target="_blank" href="<?php  echo 'boletim/'.  $rows_consultaBoletim['srcBoletim'] . '' ; ?>">Visualizar</a></td>

                      

                          <!-- Modal-->

                


                      

                        
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