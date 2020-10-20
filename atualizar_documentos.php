<?php
include_once "header.php";

include_once "dao/conexao.php";

$result_consultaDocu = "SELECT * from documentos  ";
$resultado_consultaDocu = mysqli_query($con, $result_consultaDocu);


?>







<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar descrição Documento</h4>
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
                      <th>Descrição documento</th>
                   
                      <th></th>
                    </tr>
                  </thead>
                  
                  <tbody>

                    <?php while ($rows_consultaDocu = mysqli_fetch_assoc($resultado_consultaDocu)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaDocu['nomeDocumento']; ?></td>
                       

                        <td>
                          <?php echo "<a class='btn btn-default' href='atualizar_documentos.php?id=" . $rows_consultaDocu['idDocumentos'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaDocu['idDocumentos'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                         

                          <?php  echo "<a  class='btn btn-default' title='Excluir' href='excluir_des_documentos.php?idDocumentos=" .$rows_consultaDocu['idDocumentos']. "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">"?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>

                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaDocu['idDocumentos']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Documentos</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_desc_documentos.php" method="POST">

                                    <input type="text" readonly hidden name="idDocumentos" class="form-control" value="<?php echo $rows_consultaDocu['idDocumentos']; ?>">
                                    

                                    <label>Nome Documentos</label>
                                    <input type="text" class="form-control" required name="nomeDocumento" value="<?php echo $rows_consultaDocu['nomeDocumento']; ?>">

                                   
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
<label >Status</label>
                                <Select class="form-control col-md-7 col-xs-12"  name="status" maxlength="50" required="required" type="text">
                 
                <option value='1' <?php if ($rows_consultaPolos['status'] == '1') echo 'selected'; ?>>Ativado</option>
                  <option value='0'>Desativar</option>
                  </select>
                  <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $rows_consultaPolos['idPolo']; ?>">
                  <input type="text" readonly hidden class="form-control" required name="nomePolo" value="<?php echo $rows_consultaPolos['nomePolo']; ?>">
                  <input type="text"  readonly hidden class="form-control" required name="dtCriacao" value="<?php echo $rows_consultaPolos['dtCriacao']; ?>">
                  <input type="text" readonly hidden class="form-control" required name="enderecoFuncionamento" value="<?php echo $rows_consultaPolos['enderecoFuncionamento']; ?>">
                  <input type="text"  readonly hidden class="form-control" required name="localFuncionamento" value="<?php echo $rows_consultaPolos['localFuncionamento']; ?>">
                 
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
                                    <input type="date" class="form-control" required name="dtDesativacao" >



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