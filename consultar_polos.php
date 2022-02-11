<?php
include_once "header.php";

include_once "dao/conexao.php";

$result_consultaPolosDesati = "SELECT * from polo where status = 0 ";
$resultado_consultaPolosDesati = mysqli_query($con, $result_consultaPolosDesati);

$result_consultaPolos = "SELECT * from polo where status = 1 ";
$resultado_consultaPolos = mysqli_query($con, $result_consultaPolos);
?>







<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar pelotão</h4>
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
                      <th>Nome pelotão</th>

                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php while ($rows_consultaPolos = mysqli_fetch_assoc($resultado_consultaPolos)) {
                    ?>
                      <tr>
                        <td><?php echo $rows_consultaPolos['nomePolo']; ?></td>


                        <td>
                          <?php echo "<a class='btn btn-default' href='consultar_polos.php?id=" . $rows_consultaPolos['idPolo'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaPolos['idPolo'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='Desativar' href='consultar_polos.php?id=" . $rows_consultaPolos['idPolo'] . "' data-toggle='modal' data-target='#ModalMaisInfo" . $rows_consultaPolos['idPolo'] . "'>" ?><i class="fas fa-plus-square"></i><?php echo "</a>"; ?>

                          <?php echo "<a  class='btn btn-default' title='Excluir Polo' href='excluir_polo.php?idPolo=" . $rows_consultaPolos['idPolo'] . "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">" ?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>

                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaPolos['idPolo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Polos</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_polos.php" method="POST">

                                    <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $rows_consultaPolos['idPolo']; ?>">
                                    <input type="text" readonly hidden name="status" class="form-control" value="<?php echo $rows_consultaPolos['status']; ?>">
                                    <input type="text" readonly hidden name="dtDesativacao" class="form-control" value="<?php echo $rows_consultaPolos['dtDesativacao']; ?>">

                                    <label>Nome</label>
                                    <input type="text" class="form-control" required name="nomePolo" value="<?php echo $rows_consultaPolos['nomePolo']; ?>">

                                    <label>Data de Criação</label>
                                    <input type="text" class="form-control" required name="dtCriacao" value="<?php echo $rows_consultaPolos['dtCriacao']; ?>">

                                    <label>Endereço de Funcionamento</label>
                                    <input type="text" class="form-control" required name="enderecoFuncionamento" value="<?php echo $rows_consultaPolos['enderecoFuncionamento']; ?>">

                                    <label>local Funcionameno</label>
                                    <input type="text" class="form-control" required name="localFuncionamento" value="<?php echo $rows_consultaPolos['localFuncionamento']; ?>">

                                    <label>Hora Funcionamento</label>
                                    <input type="text" class="form-control" required name="horaFuncionamento" value="<?php echo $rows_consultaPolos['horaFuncionamento']; ?>">
                                    <label>Dia Funcionamento</label>
                                    <select class="form-control" required id="estado" name="diaFuncionamento" onchange="buscaCidades(this.value)">
                                      <option value="">Selecione o dia</option>
                                      <option value="Domingo" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Domingo') echo 'selected'; ?>>Domingo</option>
                                      <option value="Segunda" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Segunda') echo 'selected'; ?>>Segunda</option>
                                      <option value="Terça" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Terça') echo 'selected'; ?>>Terça</option>
                                      <option value="Quarta" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Quarta') echo 'selected'; ?>>Quarta</option>
                                      <option value="Quinta" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Quinta') echo 'selected'; ?>>Quinta</option>
                                      <option value="Sexta" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Sexta') echo 'selected'; ?>>Sexta</option>
                                      <option value="Sabado" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Sabado') echo 'selected'; ?>>Sabado</option>
                                    </select>
                                    <label>Cidade</label>
                                    <select name="idCidade" class="form-control" required id="">
                                      <?php $select_cidade = mysqli_query($con, "SELECT * FROM cidade order by nomeCidade asc"); ?>
                                      <option value="">Selecione</option>
                                      <?php while ($rows_cidade = mysqli_fetch_assoc($select_cidade)) { ?>
                                        <option value="<?php echo $rows_cidade['idCidade'] ?>" <?php if ($rows_cidade['idCidade'] == $rows_consultaPolos['idCidade']) echo 'Selected' ?>><?php echo $rows_cidade['nomeCidade'] ?></option>
                                      <?php } ?>
                                    </select>
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


                        <div class="modal fade" id="ModalMaisInfo<?php echo $rows_consultaPolos['idPolo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desativar Polos</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_polos.php" method="POST">
                                  <label>Status</label>
                                  <Select class="form-control col-md-7 col-xs-12" name="status" maxlength="50" required="required" type="text">

                                    <option value='1' <?php if ($rows_consultaPolos['status'] == '1') echo 'selected'; ?>>Ativado</option>
                                    <option value='0'>Desativar</option>
                                  </select>
                                  <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $rows_consultaPolos['idPolo']; ?>">
                                  <input type="text" readonly hidden class="form-control" required name="nomePolo" value="<?php echo $rows_consultaPolos['nomePolo']; ?>">
                                  <input type="text" readonly hidden class="form-control" required name="dtCriacao" value="<?php echo $rows_consultaPolos['dtCriacao']; ?>">
                                  <input type="text" readonly hidden class="form-control" required name="enderecoFuncionamento" value="<?php echo $rows_consultaPolos['enderecoFuncionamento']; ?>">
                                  <input type="text" readonly hidden class="form-control" required name="localFuncionamento" value="<?php echo $rows_consultaPolos['localFuncionamento']; ?>">

                                  <input type="text" readonly hidden class="form-control" required name="horaFuncionamento" value="<?php echo $rows_consultaPolos['horaFuncionamento']; ?>">

                                  <select class="form-control" required id="estado" readonly hidden name="diaFuncionamento" onchange="buscaCidades(this.value)">
                                    <option value="">Selecione o dia</option>
                                    <option value="Domingo" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Domingo') echo 'selected'; ?>>Domingo</option>
                                    <option value="Segunda" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Segunda') echo 'selected'; ?>>Segunda</option>
                                    <option value="Terça" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Terça') echo 'selected'; ?>>Terça</option>
                                    <option value="Quarta" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Quarta') echo 'selected'; ?>>Quarta</option>
                                    <option value="Quinta" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Quinta') echo 'selected'; ?>>Quinta</option>
                                    <option value="Sexta" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Sexta') echo 'selected'; ?>>Sexta</option>
                                    <option value="Sabado" <?php if ($rows_consultaPolos['diaFuncionamento'] == 'Sabado') echo 'selected'; ?>>Sabado</option>
                                  </select>



                                  <label>Data de desativação</label>
                                  <input type="date" class="form-control" required name="dtDesativacao">



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>

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