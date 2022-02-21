<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaMonitor = "SELECT *
from usuario
where tipoAcesso = 'administrativo'";
$resultado_consultaMonitor = mysqli_query($con, $result_consultaMonitor);

if(isset($_POST['enviar'])){
  $idUsuario = $_POST['idUsuario'];
  $senha = $_POST['senha'];

  $con->query("UPDATE usuario set senha = '$senha' where idUsuario = '$idUsuario'");
  echo "<script>alert('Resetado com sucesso!');window.location='consultar_administrativo.php'</script>";
}

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar administrativo</h4>
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
                      <th>Nome</th>
                      <th>CPF</th>

                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php while ($rows_consultaMonitor = mysqli_fetch_assoc($resultado_consultaMonitor)) {
                    ?>
                      <tr>
                        <td><?php echo $rows_consultaMonitor['nomeUsuario']; ?></td>
                        <td><?php echo $rows_consultaMonitor['userAcesso']; ?></td>


                        <td>
                          <?php echo "<a class='btn btn-default' title='resetar' href='consultar_administrativo.php?id=" . $rows_consultaMonitor['idUsuario'] . "' data-toggle='modal' data-target='#resetar" . $rows_consultaMonitor['idUsuario'] . "'>" ?>Resetar senha<?php echo "</a>"; ?>

                          <!-- Modal-->

                          <div class="modal fade" id="resetar<?php echo $rows_consultaMonitor['idUsuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja resetar?</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="" method="POST">

                                    <input type="text" readonly hidden name="idUsuario" class="form-control" value="<?php echo $rows_consultaMonitor['idUsuario']; ?>">
                                    <input type="text" readonly hidden name="senha" class="form-control" value="<?php echo $rows_consultaMonitor['userAcesso']; ?>">



                                    <div class="alert alert-warning" role="alert">
                                      A senha resetada será o cpf:<?php echo $rows_consultaMonitor['userAcesso'] ?>
                                    </div>





                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Não</button>
                                  <input type="submit" name="enviar" class="btn btn-success" value="Sim">
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

  <?php
  include_once "footer.php"
  ?>
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