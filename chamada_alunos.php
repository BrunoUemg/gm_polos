
<?php



include_once "header.php";

$idEncontros = $_GET['idEncontro'];


include_once "dao/conexao.php";
$result_consultaChamada = "SELECT E.idEncontro,
E.nomeEncontro,
E.descricao,
E.dt,
E.horaInicio,
E.horaFinal,
E.idPolo,
M.idPolo,
M.idMonitor,
A.idAluno,
A.nomeAluno,
A.idPolo,
A.status,
A.dtNascimento


from monitor M, encontro E, aluno A
where M.idMonitor = '$_SESSION[idMonitor]'  and A.idPolo = E.idPolo and M.idPolo = A.idPolo and  E.idPolo = M.idPolo and A.status = 1 and E.idEncontro = $idEncontros   ";
$resultado_consultaChamada = mysqli_query($con, $result_consultaChamada);

$result_Chamada = mysqli_query($con, "SELECT E.idEncontro,
E.nomeEncontro,
E.descricao,
E.dt,
E.horaInicio,
E.horaFinal,
E.idPolo,
M.idPolo,
M.idMonitor,
A.idAluno,
A.nomeAluno,
A.idPolo,
A.status,
A.dtNascimento


from monitor M, encontro E, aluno A
where M.idMonitor = '$_SESSION[idMonitor]'  and A.idPolo = E.idPolo and M.idPolo = A.idPolo and  E.idPolo = M.idPolo and A.status = 1   ");
$resultFinal = mysqli_fetch_array($result_Chamada);


$date_hoje = date("d/m/y");


?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Chamada</h4>
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
                      <th>Data de Nascimento</th>
                      
                     
                     
                      <th>Presença</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                   
                     
                  
                    </tr>
                  </tfoot>
                  
                  <tbody>
                  

                    <?php while ($rows_consultaChamada = mysqli_fetch_assoc($resultado_consultaChamada)) {
                      ?>
                      <tr>
                     
                      <td><?php echo $rows_consultaChamada['idAluno']; ?>  
                        <td><?php echo $rows_consultaChamada['nomeAluno']; ?>  </td>
                        <td><?php echo $rows_consultaChamada['dtNascimento']; ?>  </td>
                       
                        

                     <td>
                   
        

                    <!--  <label for="1">Sim</label>
                          <input type='radio' name='presenca' value="1" > </input>
                          <label for="0">Não</label>
                         <input type='radio' name="presenca" id="idAluno" value="0" > </input>
                          <input type='submit' name='button' value='Guardar' class="btn btn-success" > -->
                          <?php echo "<a class='btn btn-success' title='Presença' href='consultar_alunos.php?id=" . $rows_consultaChamada['idAluno'] . "' data-toggle='modal' data-target='#ModalMaisInfo" . $rows_consultaChamada['idAluno'] . "'>" ?>Guardar<?php echo "</a>"; ?>
            
                    <?php echo "<a class='btn btn-success' title='Editar Presença' href='consultar_alunos.php?id=" . $rows_consultaChamada['idAluno'] . "' data-toggle='modal' data-target='#editarPresenca" . $rows_consultaChamada['idAluno'] . "'>" ?><i class="fas fa-edit"></i><?php echo "</a>"; ?>
                   
                    <input type="text" readonly hidden name="idPolo" id="idPolo"class="form-control" value="<?php echo $rows_consultaChamada['idPolo']; ?>">
                                  <input type="text" readonly hidden name="idMonitor" id="idMonitor" class="form-control" value="<?php echo $rows_consultaChamada['idMonitor']; ?>">
                                  <input type="text" readonly hidden name="idEncontro" id="idEncontro" class="form-control" value="<?php echo $rows_consultaChamada['idEncontro']; ?>">
                                    <input type="text" readonly hidden name="idAluno" id="idAluno" class="form-control" value="<?php echo $rows_consultaChamada['idAluno']; ?>">

                 
                  
                  
                  
             
                          <!-- Modal-->

                          <div class="modal fade" id="ModalMaisInfo<?php echo $rows_consultaChamada['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Chamada</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="envio_chamada_alunos.php" method="POST">
                                  <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $rows_consultaChamada['idPolo']; ?>">
                                  <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php echo $rows_consultaChamada['idMonitor']; ?>">
                                  <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $rows_consultaChamada['idEncontro']; ?>">
                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaChamada['idAluno']; ?>">
                                   <label for="">Presença</label>
                                    <Select class="form-control col-md-7 col-xs-12"  name="presenca" maxlength="50" required="required" type="text">
                 
                 <option value='1'>Presente</option>
                   <option value='0'>Falta</option>
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


                          <div class="modal fade" id="editarPresenca<?php echo $rows_consultaChamada['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Chamada</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_chamada_alunos.php" method="POST">
                                 
                                  <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php echo $rows_consultaChamada['idMonitor']; ?>">
                                  <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php echo $rows_consultaChamada['idMonitor']; ?>">
                                  <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $rows_consultaChamada['idEncontro']; ?>">
                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaChamada['idAluno']; ?>">
                                   <label for="">Retirar ou dar presença</label>
                                    <Select class="form-control col-md-7 col-xs-12"  name="presenca" maxlength="50" required="required" type="text">
                 
                 <option value='1'>Dar presença</option>
                   <option value='0'>Retirar</option>
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

               <center> <a  class='btn btn-success' title='Finalizar'  data-toggle='modal' data-target='#finalizar'> Encerrar Chamada</a> </center>
                <div class="modal fade" id="finalizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Encerrar Chamada</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="envio_chamada.php" method="POST">
                                 
                                  <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php echo $resultFinal['idMonitor']; ?>">
                                  <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $resultFinal['idPolo']; ?>">
                                  <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $resultFinal['idEncontro']; ?>">
                                 
                               <label for="">Foto do dia</label>
                               <input type="file"  name="foto" class="form-control" >
                               <label for="">Descrição</label>
                              <textarea name="descricao" id=""  cols="20" rows="5"class="form-control"></textarea> 
                                  

                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>

<!-- </form> -->

<?php
        if(isset($_POST['enviar'])){
$idAluno = $_POST["idAluno"];

$presenca = $_POST["presenca"];
$data_hoje = date("d/m/y");
 

  $sql1 = "INSERT INTO lista_chamda (dataChamada, idAluno, idEncontro, presenca, idMonitor) VALUES ('$date_hoje', '$idAluno', 1, '$presenca', 1 )";

        }  
               ?>        

      <div class="modal fade" id="RequisicaoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Finalizar Chamada</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="envio_chamada_alunos.php" method="POST">

        <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $idEncontro; ?>">
        
        
        <label>Justificativa</label>
		<textarea class="form-control"  id="exampleFormControlTextarea1" rows="2" name="descricao"></textarea>


      <label>Foto</label>
	  <input type="file" class="form-control" name="foto">


      <label>Data chamada</label>
	  <input type="date" class="form-control" name="dtChamada" value="<?php echo $data ?>">

        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Salvar">
          </form>

        </div>
      </div>
    </div>
  </div>
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