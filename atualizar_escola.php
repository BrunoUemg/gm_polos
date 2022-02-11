<?php
include_once "header.php";

include_once "dao/conexao.php";

$result_consultaEscola = "SELECT * from escola  ";
$resultado_consultaEscola = mysqli_query($con, $result_consultaEscola);


?>







<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar descrição Escola</h4>
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
                      <th>Nome Escola</th>

                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php while ($rows_consultaEscola = mysqli_fetch_assoc($resultado_consultaEscola)) {
                    ?>
                      <tr>
                        <td><?php echo $rows_consultaEscola['nomeEscola']; ?></td>


                        <td>
                          <?php echo "<a class='btn btn-default' href='atualizar_escola.php?id=" . $rows_consultaEscola['idEscola'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaEscola['idEscola'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>


                          <?php echo "<a  class='btn btn-default' title='Excluir' href='excluir_escola.php?idEscola=" . $rows_consultaEscola['idEscola'] . "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">" ?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>

                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaEscola['idEscola']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Escola</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_escola.php" method="POST">

                                    <input type="text" readonly hidden name="idEscola" class="form-control" value="<?php echo $rows_consultaEscola['idEscola']; ?>">


                                    <label>Nome Escola</label>
                                    <input type="text" class="form-control" required name="nomeEscola" value="<?php echo $rows_consultaEscola['nomeEscola']; ?>">
                                    <label>Cidade</label>
                                    <select name="idCidade" class="form-control" required id="">
                                      <?php $select_cidade = mysqli_query($con, "SELECT * FROM cidade order by nomeCidade asc"); ?>
                                      <option value="">Selecione</option>
                                      <?php while ($rows_cidade = mysqli_fetch_assoc($select_cidade)) { ?>
                                        <option value="<?php echo $rows_cidade['idCidade'] ?>"<?php if($rows_cidade['idCidade'] == $rows_consultaEscola['idCidade']) echo 'Selected' ?>><?php echo $rows_cidade['nomeCidade'] ?></option>
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