<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaAluno = "SELECT 
M.idPolo,
M.idMonitor,
A.idAluno,
A.nomeAluno,
A.idPolo,
A.status,
A.dtNascimento
from monitor M, aluno A, processamento_cadastro P
where M.idMonitor = '$_SESSION[idMonitor]' and M.idPolo = A.idPolo  and A.status = 1 and P.status = 1 and P.idAluno = A.idAluno  ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);


$result_consultaAlunoAdm = "SELECT
A.idAluno,
A.nomeAluno,
A.idPolo,
A.status,
A.dtNascimento
from  aluno A, processamento_cadastro P
where A.status = 1 and P.status = 1 and P.idAluno = A.idAluno  ";
$resultado_consultaAlunoAdm = mysqli_query($con, $result_consultaAlunoAdm);

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Visualizar boletim dos alunos</h4>
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
                   
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <?php 
                    if($_SESSION['idMonitor'] != 0){
                    while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAluno)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['dtNascimento']; ?></td>
                     

                        <td>
                        <?php echo "<a class='btn btn-default' title='Vizualizar boletim' href='visualizar_boletim.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; ?>
                   
                        </td>


                        
                      </tr>
                    <?php } } else{
                          while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAlunoAdm)) {
                            ?>
                             <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['dtNascimento']; ?></td>
                     

                        <td>
                        <?php echo "<a class='btn btn-default' title='Vizualizar boletim' href='visualizar_boletim.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; ?>
                   
                        </td>


                      </tr>
                        
                    <?php } }  ?>
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