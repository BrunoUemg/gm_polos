<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaMonitor = "SELECT M.idMonitor,
M.nomeMonitor,
M.cpf,
M.dtNascimento,
M.rua,
M.numero,
M.bairro,
M.cidade,
M.estado,
M.email,
M.cep,
M.telefone,
M.celular,
P.idPolo,
P.nomePolo
from monitor M, polo P
where M.idPolo = P.idPolo";
$resultado_consultaMonitor = mysqli_query($con, $result_consultaMonitor);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Monitor</h4>
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
                      <th>Data de Nascimento</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php while ($rows_consultaMonitor = mysqli_fetch_assoc($resultado_consultaMonitor)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaMonitor['nomeMonitor']; ?></td>
                        <td><?php echo $rows_consultaMonitor['cpf']; ?></td>
                        <td><?php echo $rows_consultaMonitor['dtNascimento']; ?></td>
                        <td><?php echo $rows_consultaMonitor['nomePolo']; ?></td>

                        <td>
                          <?php echo "<a class='btn btn-default' href='consultar_monitores.php?id=" . $rows_consultaMonitor['idMonitor'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaMonitor['idMonitor'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' href='excluir_monitores.php?idMonitor=" . $rows_consultaMonitor['idMonitor'] . "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">"?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>
                          <?php  echo "<a  class='btn btn-default' title='Excluir ' href='excluir_monitores.php?idMonitor=" .$rows_consultaMonitor['idMonitor']. "' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">"?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>

                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaMonitor['idMonitor']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Monitor</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_monitor.php" method="POST">

                                    <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php echo $rows_consultaMonitor['idMonitor']; ?>">

                                    <label>Nome</label>
                                    <input type="text" class="form-control" required name="nomeMonitor" value="<?php echo $rows_consultaMonitor['nomeMonitor']; ?>">

                                  

                                    <label>CPF</label>
                                    <input type="text" class="form-control" required name="cpf" value="<?php echo $rows_consultaMonitor['cpf']; ?>" onkeyup="mascara('###.###.###-##',this,event,true)">

                                    <label>Data de Nascimento</label>
                                    <input type="date" class="form-control" required name="dtNascimento" value="<?php echo $rows_consultaMonitor['dtNascimento']; ?>">

                                   

                                   
                                    <label>CEP</label>
                                    <input type="text" class="form-control" required id="cep" name="cep" value="<?php echo $rows_consultaMonitor['cep']; ?>" onkeyup="mascara('##.###-###',this,event,true)">

                                    <label>Estado</label>
                                    <select class="form-control" required id="estado" name="estado" onchange="buscaCidades(this.value)">
                                      <option value="">Selecione o Estado</option>
                                      <option value="AC" <?php if ($rows_consultaMonitor['estado'] == 'AC') echo 'selected'; ?>>Acre</option>
                                      <option value="AL" <?php if ($rows_consultaMonitor['estado'] == 'AL') echo 'selected'; ?>>Alagoas</option>
                                      <option value="AM" <?php if ($rows_consultaMonitor['estado'] == 'AM') echo 'selected'; ?>>Amazonas</option>
                                      <option value="AP" <?php if ($rows_consultaMonitor['estado'] == 'AP') echo 'selected'; ?>>Amapá</option>
                                      <option value="BA" <?php if ($rows_consultaMonitor['estado'] == 'BA') echo 'selected'; ?>>Bahia</option>
                                      <option value="CE" <?php if ($rows_consultaMonitor['estado'] == 'CE') echo 'selected'; ?>>Ceará</option>
                                      <option value="DF" <?php if ($rows_consultaMonitor['estado'] == 'DF') echo 'selected'; ?>>Distrito Federal</option>
                                      <option value="ES" <?php if ($rows_consultaMonitor['estado'] == 'ES') echo 'selected'; ?>>Espírito Santo</option>
                                      <option value="GO" <?php if ($rows_consultaMonitor['estado'] == 'GO') echo 'selected'; ?>>Goiás</option>
                                      <option value="MA" <?php if ($rows_consultaMonitor['estado'] == 'MA') echo 'selected'; ?>>Maranhão</option>
                                      <option value="MG" <?php if ($rows_consultaMonitor['estado'] == 'MG') echo 'selected'; ?>>Minas Gerais</option>
                                      <option value="MS" <?php if ($rows_consultaMonitor['estado'] == 'MS') echo 'selected'; ?>>Mato Grosso do Sul</option>
                                      <option value="MT" <?php if ($rows_consultaMonitor['estado'] == 'MT') echo 'selected'; ?>>Mato Grosso</option>
                                      <option value="PA" <?php if ($rows_consultaMonitor['estado'] == 'PA') echo 'selected'; ?>>Pará</option>
                                      <option value="PB" <?php if ($rows_consultaMonitor['estado'] == 'PB') echo 'selected'; ?>>Paraíba</option>
                                      <option value="PE" <?php if ($rows_consultaMonitor['estado'] == 'PE') echo 'selected'; ?>>Pernambuco</option>
                                      <option value="PI" <?php if ($rows_consultaMonitor['estado'] == 'PI') echo 'selected'; ?>>Piauí</option>
                                      <option value="PR" <?php if ($rows_consultaMonitor['estado'] == 'PR') echo 'selected'; ?>>Paraná</option>
                                      <option value="RJ" <?php if ($rows_consultaMonitor['estado'] == 'RJ') echo 'selected'; ?>>Rio de Janeiro</option>
                                      <option value="RN" <?php if ($rows_consultaMonitor['estado'] == 'RN') echo 'selected'; ?>>Rio Grande do Norte</option>
                                      <option value="RO" <?php if ($rows_consultaMonitor['estado'] == 'RO') echo 'selected'; ?>>Rondônia</option>
                                      <option value="RR" <?php if ($rows_consultaMonitor['estado'] == 'RR') echo 'selected'; ?>>Roraima</option>
                                      <option value="RS" <?php if ($rows_consultaMonitor['estado'] == 'RS') echo 'selected'; ?>>Rio Grande do Sul</option>
                                      <option value="SC" <?php if ($rows_consultaMonitor['estado'] == 'SC') echo 'selected'; ?>>Santa Catarina</option>
                                      <option value="SE" <?php if ($rows_consultaMonitor['estado'] == 'SE') echo 'selected'; ?>>Sergipe</option>
                                      <option value="SP" <?php if ($rows_consultaMonitor['estado'] == 'SP') echo 'selected'; ?>>São Paulo</option>
                                      <option value="TO" <?php if ($rows_consultaMonitor['estado'] == 'TO') echo 'selected'; ?>>Tocantins</option>
                                    </select>

                                    <label>Cidade</label>
                                    <input type="text" class="form-control" required name="cidade" id="cidade" value="<?php echo $rows_consultaMonitor['cidade']; ?>">

                                    <label>Rua</label>
                                    <input type="text" class="form-control" required name="rua" id="rua" value="<?php echo $rows_consultaMonitor['rua']; ?>">

                                    <label>Número</label>
                                    <input type="text" class="form-control" required name="numero" value="<?php echo $rows_consultaMonitor['numero']; ?>">

                                    <label>Bairro</label>
                                    <input type="text" class="form-control" required id="bairro" name="bairro" required="required" value="<?php echo $rows_consultaMonitor['bairro']; ?>">

                                    <label>Telefone</label>
                                    <input type="text" class="form-control" required name="telefone" value="<?php echo $rows_consultaMonitor['telefone']; ?>" onkeyup="mascara('(##)####-####',this,event,true)">

                                    <label>Celular</label>
                                    <input type="text" class="form-control" required name="celular" value="<?php echo $rows_consultaMonitor['celular']; ?>" onkeyup="mascara('(##)#####-####',this,event,true)">

                                    <label>Email</label>
                                    <input type="text" class="form-control" required name="email" value="<?php echo $rows_consultaMonitor['email']; ?>">

                                    <label>Polo</label>
                                    <select class="form-control" required name="idPolo">
                                      <option value="">Selecione o Polo</option>
                                      <?php
                                        $resultado_Polos = mysqli_query($con, "SELECT * FROM polo");
                                        while ($row_Polos = mysqli_fetch_assoc($resultado_Polos)) { ?>
                                        <option value="<?php echo $row_Polos['idPolo']; ?>" <?php if ($rows_consultaMonitor['idPolo'] == $row_Polos['idPolo']) echo 'selected'; ?>><?php echo $row_Polos['nomePolo']; ?></option>
                                      <?php } ?> } ?>
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