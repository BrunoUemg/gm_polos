<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaEncontro = "SELECT E.idEncontro,
E.nomeEncontro,
E.descricao,
E.dt,
E.horaInicio,
E.horaFinal,
E.idPolo,
M.idPolo,
M.idMonitor
from monitor M, encontro E
where M.idMonitor = '$_SESSION[idMonitor]' and M.idPolo = E.idPolo ";
$resultado_consultaEncontro = mysqli_query($con, $result_consultaEncontro);

$result_consultaEncontroAdm = "SELECT E.idEncontro,
E.nomeEncontro,
E.descricao,
E.dt,
E.horaInicio,
E.horaFinal,
E.idPolo,
M.idMonitor,
M.idPolo,
M.nomeMonitor
from monitor M, encontro E " ;
$resultado_consultaEncontroAdm = mysqli_query($con, $result_consultaEncontroAdm);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Encontros</h4>
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
                      <th>Nome Encontro</th>
                      <th>Descrição</th>
                      <th>Data do encontro</th>
                     
                      <th></th>
                    </tr>
                  </thead>
                
                  
                  
                    <?php 
                      if ($_SESSION['idMonitor']!=0) {
                    while ($rows_consultaEncontro = mysqli_fetch_assoc($resultado_consultaEncontro)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaEncontro['nomeEncontro']; ?></td>
                        <td><?php echo $rows_consultaEncontro['descricao']; ?></td>
                        <td><?php echo $rows_consultaEncontro['dt']; ?></td>
                      

                        <td>
                          <?php echo "<a class='btn btn-default'title='Alterar encontro' href='consultar_encontros.php?id=" . $rows_consultaEncontro['idEncontro'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaEncontro['idEncontro'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                          <?php  echo "<a class='btn btn-default' title='Chamada' href='chamada_alunos.php?idEncontro=".$rows_consultaEncontro['idEncontro'] .  "'>" ?><i class="fas fa-plus-square"></i><?php echo "</a>"; ?>


                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaEncontro['idEncontro']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Encontro</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_encontros.php" method="POST">

                                    <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $rows_consultaEncontro['idEncontro']; ?>">

                                    <label>Nome Encontro</label>
                                    <input type="text" readonly class="form-control" required name="nomeEncontro" value="<?php echo $rows_consultaEncontro['nomeEncontro']; ?>">

                                  

                                    <label>Descrição</label>
                                    <input type="text" class="form-control" required name="descricao" value="<?php echo $rows_consultaEncontro['descricao']; ?>">

                                    <label>Data do Encontro</label>
                                    <input type="date" class="form-control" required name="dt" value="<?php echo $rows_consultaEncontro['dt']; ?>">
                                 

                                    <label>Horário de Início</label>
                                    <input type="time" class="form-control" required name="horaInicio"  value="<?php echo $rows_consultaEncontro['horaInicio']; ?>">

                                  
                                    <label>Horário Final</label>
                                    <input type="time" class="form-control" required name="horaFinal" value="<?php echo $rows_consultaEncontro['horaFinal']; ?>">

                                    <label>Polo</label>
                                    <select class="form-control" required name="idPolo" readonly>
                                      <option value="">Selecione o Polo</option>
                                      <?php
                                        $resultado_Polos = mysqli_query($con, "SELECT * FROM polo");
                                        while ($row_Polos = mysqli_fetch_assoc($resultado_Polos)) { ?>
                                        <option value="<?php echo $row_Polos['idPolo']; ?>" <?php if ($rows_consultaEncontro['idPolo'] == $row_Polos['idPolo']) echo 'selected'; ?>><?php echo $row_Polos['nomePolo']; ?></option>
                                      <?php } ?> } ?>
                                    </select>

                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" name="enviar" class="btn btn-success" value="Salvar"  onClick="window.location.href='chamada_alunos.php'">
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </td>


                      

                        
                      </tr>

                    <?php }} else {

while ($rows_consultaEncontroAdm = mysqli_fetch_assoc($resultado_consultaEncontroAdm)) {
  ?>
  <tr>
    <td><?php echo $rows_consultaEncontroAdm['nomeEncontro']; ?></td>
    <td><?php echo $rows_consultaEncontroAdm['descricao']; ?></td>
    <td><?php echo $rows_consultaEncontroAdm['dt']; ?></td>
  

    <td>
      <?php echo "<a class='btn btn-default'title='Alterar encontro' href='consultar_encontros.php?id=" . $rows_consultaEncontroAdm['idEncontro'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaEncontroAdm['idEncontro'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
     


      <!-- Modal-->

      <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaEncontroAdm['idEncontro']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar Encontro</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="alterar_encontros.php" method="POST">

                <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $rows_consultaEncontroAdm['idEncontro']; ?>">

                <label>Nome Encontro</label>
                <input type="text"  class="form-control" required name="nomeEncontro" value="<?php echo $rows_consultaEncontroAdm['nomeEncontro']; ?>">

              

                <label>Descrição</label>
                <input type="text" class="form-control" required name="descricao" value="<?php echo $rows_consultaEncontroAdm['descricao']; ?>">

                <label>Data do Encontro</label>
                <input type="date" class="form-control" required name="dt" value="<?php echo $rows_consultaEncontroAdm['dt']; ?>">
             

                <label>Horário de Início</label>
                <input type="time" class="form-control" required name="horaInicio"  value="<?php echo $rows_consultaEncontroAdm['horaInicio']; ?>">

              
                <label>Horário Final</label>
                <input type="time" class="form-control" required name="horaFinal" value="<?php echo $rows_consultaEncontroAdm['horaFinal']; ?>">

                <label>Polo</label>
                <select class="form-control" required name="idPolo" >
                  <option value="">Selecione o Polo</option>
                  <?php
                    $resultado_Polos = mysqli_query($con, "SELECT * FROM polo");
                    while ($row_Polos = mysqli_fetch_assoc($resultado_Polos)) { ?>
                    <option value="<?php echo $row_Polos['idPolo']; ?>" <?php if ($rows_consultaEncontroAdm['idPolo'] == $row_Polos['idPolo']) echo 'selected'; ?>><?php echo $row_Polos['nomePolo']; ?></option>
                  <?php } ?> } ?>
                </select>

            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
              <input type="submit" name="enviar" class="btn btn-success" value="Salvar"  onClick="window.location.href='chamada_alunos.php'">
              </form>

            </div>
          </div>
        </div>
      </div>
    </td>


  

    
  </tr>
                  <?php  } }?>
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