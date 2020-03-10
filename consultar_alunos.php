<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaAluno = "SELECT A.idAluno,
A.nomeAluno,
A.dtNascimento,
A.nomePai,
A.profissaoPai,
A.nomeMae,
A.profissaoMae,
A.sexo,
A.enderecoResidencial,
A.bairro,
A.telefoneContato,
A.escola,
A.anoEscola,
A.turmaEscola,
A.turnoEscola,
P.idPolo,
P.nomePolo
from aluno A, polo P
where A.idPolo = P.idPolo";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);
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
                          <?php echo "<a class='btn btn-default' href='consultar_alunos.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                        


                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Monitor</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_aluno.php" method="POST">

                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">

                                    <label>Nome</label>
                                    <input type="text" class="form-control" required name="nomeAluno" value="<?php echo $rows_consultaAluno['nomeAluno']; ?>">

                                  

                                  

                                    <label>Data de Nascimento</label>
                                    <input type="date" class="form-control" required name="dtNascimento" value="<?php echo $rows_consultaAluno['dtNascimento']; ?>">

                                   

                                   
                                 

                                  

                                    <label>Endereço Residencial</label>
                                    <input type="text" class="form-control" required id="bairro" name="enderecoResidencial" required="required" value="<?php echo $rows_consultaAluno['enderecoResidencial']; ?>">

                                    <label>Telefone</label>
                                    <input type="text" class="form-control" required name="telefoneContato" value="<?php echo $rows_consultaAluno['telefoneContato']; ?>" onkeyup="mascara('(##)####-####',this,event,true)">

                                   
                                    <label>Nome Pai</label>
                                    <input type="text" class="form-control" required name="nomePai" value="<?php echo $rows_consultaAluno['nomePai']; ?>">

                                    <label>Profissão do Pai</label>
                                    <input type="text" class="form-control" required name="profissaoPai" value="<?php echo $rows_consultaAluno['profissaoPai']; ?>">

                                    <label>Nome Mãe</label>
                                    <input type="text" class="form-control" required name="nomeMae" value="<?php echo $rows_consultaAluno['nomeMae']; ?>">

                                    <label>Profissão da Mãe</label>
                                    <input type="text" class="form-control" required name="profissaoMae" value="<?php echo $rows_consultaAluno['profissaoMae']; ?>">
                                    <label>Endereço Residencial</label>
                                    <input type="text" class="form-control" required name="enderecoResidencial" value="<?php echo $rows_consultaAluno['enderecoResidencial']; ?>">

                                    <label>Bairro</label>
                                    <input type="text" class="form-control" required name="bairro" value="<?php echo $rows_consultaAluno['bairro']; ?>">

                                    <label>Sexo</label>
                                    <input type="text" class="form-control" required name="sexo" value="<?php echo $rows_consultaAluno['sexo']; ?>">
                                    <label>Escola</label>
                                    <input type="text" class="form-control" required name="escola" value="<?php echo $rows_consultaAluno['escola']; ?>">

                                    <label>Ano de Escola</label>
                                    <input type="text" class="form-control" required name="anoEscola" value="<?php echo $rows_consultaAluno['anoEscola']; ?>">

                                    <label>Turma Escola</label>
                                    <input type="text" class="form-control" required name="turmaEscola" value="<?php echo $rows_consultaAluno['turmaEscola']; ?>">

                                    <label>Turno Escola</label>
                                    <input type="text" class="form-control" required name="turnoEscola" value="<?php echo $rows_consultaAluno['turnoEscola']; ?>">

                                    <label>Polo</label>
                                    <select class="form-control" required name="idPolo">
                                      <option value="">Selecione o Polo</option>
                                      <?php
                                        $resultado_Polos = mysqli_query($con, "SELECT * FROM polo");
                                        while ($row_Polos = mysqli_fetch_assoc($resultado_Polos)) { ?>
                                        <option value="<?php echo $row_Polos['idPolo']; ?>" <?php if ($rows_consultaAluno['idPolo'] == $row_Polos['idPolo']) echo 'selected'; ?>><?php echo $row_Polos['nomePolo']; ?></option>
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