
<?php



include_once "header.php";




include_once "dao/conexao.php";


$result_Presenca = "SELECT M.idPolo, M.idMonitor, L.idAluno, A.nomeAluno, A.idPolo, A.status, A.dtNascimento,
SUM(L.presenca) AS faltas 
from monitor M, aluno A, lista_chamda L
where L.idAluno = '$_SESSION[idAluno]' and M.idPolo = A.idPolo  and A.status = 1 and L.idAluno = A.idAluno 
GROUP BY L.idAluno  
  ";
$result_Final = mysqli_query($con, $result_Presenca);



?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Minhas presenças em encontros</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="table-responsive">
              
            <div class="card-body">
         <!--   <form action="" method="POST" name="button" enctype="multipart/form-data"  > -->
                <table id="basic-datatables" class="display table table-striped table-hover">
               
                  <thead>
                    <tr>
                    <th>Código Aluno</th>
                      <th>Nome Aluno</th>
                    
                   
                      <th>Faltas</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                   
                     
                  
                    </tr>
                  </tfoot>
                  
                  <tbody>
                  

                    <?php while ($rows_consultaPresenca = mysqli_fetch_assoc($result_Final)) {
                      ?>
                      <tr>
                     
                      <td><?php echo $rows_consultaPresenca['idAluno']; ?>  
                        <td><?php echo $rows_consultaPresenca['nomeAluno']; ?>  </td>
                       

                        <td><?php echo $rows_consultaPresenca['faltas']; ?>  </td>
                        
<td>
<?php echo "<a class='btn btn-default'title='Alterar encontro' href='minha_presenca.php?id=" . $rows_consultaPresenca['idAluno'] . "' data-toggle='modal' data-target='#ModalAlterar" . $rows_consultaPresenca['idAluno'] . "'>" ?>Sobre presença</i><?php echo "</a>"; ?>
<div class="modal fade" id="ModalAlterar<?php echo $rows_consultaPresenca['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sobre presença</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="alterar_encontros.php" method="POST">
              <?php
              $result_PresencaFalta = "SELECT E.idEncontro, E.nomeEncontro, L.presenca, L.dataChamada From encontro E, lista_chamda L
              WHERE L.idAluno = '$_SESSION[idAluno]' and L.presenca = 1 and E.idEncontro = L.idEncontro"; 
$result_FinalFalta = mysqli_query($con, $result_PresencaFalta); ?>
             <table>
             <thead>
             <th>Data da falta</th>
             <th>Encontro</th>
             </thead>
             <tbody>
             <?php while($rows_falta = mysqli_fetch_assoc($result_FinalFalta)) {?>
             <tr>
             <td><?php 
             $dataBanco =  $rows_falta['dataChamada'];
             $dataNova = date("d/m/Y", strtotime($dataBanco));
             echo $dataNova; ?></td>
             <td> <?php echo $rows_falta['nomeEncontro']; ?></td>
             </tr>

             <?php } ?>
             </tbody>
             </table>

            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
             
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

             

<!-- </form> -->



     
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
  
  <script src="js/dataTables.bootstrap4.min.js"></script>

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