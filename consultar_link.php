<?php
include_once "header.php";

include_once "dao/conexao.php";

$result_validade = " SELECT V.dataFinal,V.dataInicial,V.horaFinal,V.horaInicial,V.linkCadastro,V.quantidadeMax, V.quantidadeCadastro FROM validade_cadastro V
where V.quantidadeMax > V.quantidadeCadastro";
$resultado_Validade = mysqli_query($con, $result_validade);

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$data_hoje = date("Y-m-d");
$hora_hoje = date("H:i:s");

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Links</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <?php
              if (!empty($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              } ?>
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Data Inicial</th>
                      <th>Hora Inicial</th>
                      <th>Data Final</th>
                      <th>Hora Final</th>
                      <th>Link</th>
                      <th>Quantidade Máxima</th>
                      <th>Quantidade Atual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($rows_link = mysqli_fetch_assoc($resultado_Validade)) { 
                      $dataCompara = strtotime($data_hoje . $hora_hoje);
                      $dataVence = strtotime($rows_link['dataFinal'] . $rows_link['horaFinal']);

                      if($dataCompara <=  $dataVence){
                      
                      ?>
                      <tr>
                       
                        <td><?php echo date("d/m/Y", strtotime($rows_link['dataInicial'])) ?></td>
                        <td><?php echo $rows_link['horaInicial'] ?></td>
                        <td><?php echo date("d/m/Y", strtotime($rows_link['dataFinal'])) ?></td>
                        <td><?php echo $rows_link['horaFinal'] ?></td>
                        <td>
                          <a href="https://<?php echo $rows_link['linkCadastro'] ?>">
                            https://<?php echo $rows_link['linkCadastro'] ?>
                          </a>
                        </td>
                        <td><?php echo $rows_link['quantidadeMax'] ?></td>
                        <td><?php echo $rows_link['quantidadeCadastro'] ?></td>
                      </tr>

                    <?php } } ?>
                  </tbody>
                </table>
              </div>
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
<script src="js/moeda.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<!--   Core JS Files   -->

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>


<!-- Moment.js: -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
<!-- Ultimate date sorting plug-in-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/pt-br.js"></script>

<script src="js/core/popper.min.js"></script>
<script src="js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="jquery/jquery-ui-1.9.2.custom.min.js"></script>
<script src="jquery/jquery.ui.touch-punch.min.js"></script>

<script>
  $(document).ready(function() {
    moment.locale('pt-br');
    $.fn.dataTable.moment('DD/MM/YYYY');
    $('#basic-datatables').DataTable({
      "order": [
        [0, "asc"],
        [1, "asc"],
        [2, "asc"],
        [3, "asc"]
      ],
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