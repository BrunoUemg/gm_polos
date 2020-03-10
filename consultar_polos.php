<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaPolos = "SELECT * from polo";
$resultado_consultaPolos = mysqli_query($con, $result_consultaPolos);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Polos</h4>
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
                      <th>Nome Polo</th>
                   
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
                          <?php echo "<a class='btn btn-default' href='consultar_polos.php?id=" . $rows_consultaPolos['idPolo'] . "' data-toggle='modal' data-target='#ModalMaisInfo" . $rows_consultaPolos['idPolo'] . "'>" ?><i class="fas fa-plus-square"></i><?php echo "</a>"; ?>


                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaPolos['idPolo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Funcionário</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_polos.php" method="POST">

                                    <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $rows_consultaPolos['idPolo']; ?>">

                                    <label>Nome</label>
                                    <input type="text" class="form-control" required name="nomePolo" value="<?php echo $rows_consultaPolos['nomePolo']; ?>">

                                  

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


                        <div class="modal fade" id="ModalMaisInfo<?php echo $rows_consultaFuncionario['idFuncionario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mais Informações</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>

                                  <label>Nome</label>
                                  <input type="text" disabled class="form-control" name="nomeFuncionario" value="<?php echo $rows_consultaFuncionario['nomeFuncionario']; ?>">

                                  <label>RG</label>
                                  <input type="text" disabled class="form-control" name="rg" value="<?php echo $rows_consultaFuncionario['rg']; ?>">

                                  <label>CPF</label>
                                  <input type="text" disabled class="form-control" name="cpf" value="<?php echo $rows_consultaFuncionario['cpf']; ?>">

                                  <label>Data de Nascimento</label>
                                  <input type="text" disabled class="form-control" name="dtNascimento" value="<?php echo $rows_consultaFuncionario['dtNascimento']; ?>">

                                  <label>Data de Admissão</label>
                                  <input type="text" disabled class="form-control" name="dtAdmissao" value="<?php echo $rows_consultaFuncionario['dtAdmissao']; ?>">

                                  <label>Data de Desligamento</label>
                                  <input type="text" disabled class="form-control" name="dtDesligamento" value="<?php echo $rows_consultaFuncionario['dtDesligamento']; ?>">

                                  <label>Rua</label>
                                  <input type="text" disabled class="form-control" name="rua" value="<?php echo $rows_consultaFuncionario['rua']; ?>">

                                  <label>Número</label>
                                  <input type="text" disabled class="form-control" name="numero" value="<?php echo $rows_consultaFuncionario['numero']; ?>">

                                  <label>Bairro</label>
                                  <input type="text" disabled class="form-control" name="bairro" value="<?php echo $rows_consultaFuncionario['bairro']; ?>">

                                  <label>Cidade</label>
                                  <input type="text" disabled class="form-control" name="cidade" value="<?php echo $rows_consultaFuncionario['cidade']; ?>">

                                  <label>Estado</label>
                                  <input type="text" disabled class="form-control" name="estado" value="<?php echo $rows_consultaFuncionario['estado']; ?>">

                                  <label>CEP</label>
                                  <input type="text" disabled class="form-control" name="cep" value="<?php echo $rows_consultaFuncionario['cep']; ?>">

                                  <label>Telefone</label>
                                  <input type="text" disabled class="form-control" name="telefone" value="<?php echo $rows_consultaFuncionario['telefone']; ?>">

                                  <label>Celular</label>
                                  <input type="text" disabled class="form-control" name="celular" value="<?php echo $rows_consultaFuncionario['celular']; ?>">

                                  <label>Email</label>
                                  <input type="text" disabled class="form-control" name="email" value="<?php echo $rows_consultaFuncionario['email']; ?>">

                                  <label>Cargo</label>
                                  <input type="text" disabled class="form-control" name="estado" value="<?php echo $rows_consultaFuncionario['descricao']; ?>">




                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
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