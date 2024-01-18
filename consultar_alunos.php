<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaAluno = "SELECT A.idAluno,
A.nomeAluno,
A.dtNascimento,
P.idPolo,
P.nomePolo,
A.cpfAluno

from aluno A, polo P, processamento_cadastro V
where A.idPolo = P.idPolo and A.status = 1 and V.idAluno = A.idAluno  ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);

$result_Escola = "SELECT * FROM escola ";
$resultado_Escola = mysqli_query($con, $result_Escola);


if(isset($_POST['enviar'])){
  $idAluno = $_POST['idAluno'];
  $senha = $_POST['senha'];

  $con->query("UPDATE usuario set senha = '$senha' where idAluno = '$idAluno'");
  echo "<script>alert('Resetado com sucesso!');window.location='consultar_alunos.php'</script>";
}

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Alunos</h4>
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
                      <th>Data de Nascimento</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAluno)) {
                    ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>

                        <td><?php echo $rows_consultaAluno['dtNascimento']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                          <?php echo "<a class='btn btn-default' title='Vizualizar Tudo' href='visualizar_alunos.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='Desativar' href='consultar_alunos.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#ModalMaisInfo" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fas fa-minus-square"></i><?php echo "</a>"; ?>
                          
                          <?php echo "<a class='btn btn-default' title='Imprimir ficha completa' href='imprimir_alunos.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-file-pdf"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='Imprimir histórico' href='imprimir_historico.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-file-archive"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='resetar senha' href='consultar_alunos.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#resetar" . $rows_consultaAluno['idAluno'] . "'>" ?>Resetar <?php echo "</a>"; ?>


                          <!-- Modal-->

                          
                        <div class="modal fade" id="resetar<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">
                                  <input type="text" readonly hidden name="senha" class="form-control" value="<?php echo $rows_consultaAluno['cpfAluno']; ?>">



                                  <div class="alert alert-warning" role="alert">
                                    A senha resetada será o cpf:<?php echo $rows_consultaAluno['cpfAluno'] ?>
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


                        <div class="modal fade" id="ModalMaisInfo<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desligar Aluno</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="desligar_aluno.php" method="POST">
                                  <label>Status</label>
                                  <Select class="form-control col-md-7 col-xs-12" name="status" maxlength="50" required="required" type="text">

                                    <option value='1' <?php if ($rows_consultaAluno['status'] == '1') echo 'selected'; ?>>Ativado</option>
                                    <option value='0'>Desligar</option>
                                  </select>
                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">

                               





                                  <label>Data de desligamento</label>
                                  <input type="date" class="form-control" required name="dataDesligamento">



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