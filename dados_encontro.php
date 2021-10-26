<?php
include_once "header.php";

$idEncontros = $_GET['idEncontro'];


include_once "dao/conexao.php";
if($_SESSION['idMonitor'] != 0){
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
where M.idMonitor = '$_SESSION[idMonitor]'   and A.idPolo = E.idPolo and M.idPolo = A.idPolo and  E.idPolo = M.idPolo and A.status = 1   ");
$resultFinal = mysqli_fetch_array($result_Chamada);


$result_chamadaAluno = "SELECT * FROM chamada where idEncontro = '$idEncontro'";
$res = $con->query($result_chamadaAluno);
$linha4 = $res->fetch_assoc();

$res = $con-> query($result_consultaChamada);
$linha = $res->fetch_assoc();

}else{

    $resultado_consultaChamada = mysqli_query($con,"SELECT A.nomeAluno,A.dtNascimento, A.idAluno, E.idEncontro, P.idPolo FROM aluno A INNER JOIN polo P ON P.idPolo = A.idPolo INNER JOIN encontro E ON E.idPolo = P.idPolo where E.idEncontro = $idEncontros");
  
}



$date_hoje = date("d/m/y");


?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Dados encontro</h4>
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
                      <th>status</th>
                     <th>Editar Presença</th>
                     
                    
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
                     
                      <td><?php echo $rows_consultaChamada['idAluno']; ?> <input type="hidden" name="idAluno" value="<?php echo $rows_consultaChamada['idAluno']; ?>"></td> 
                        <td><?php echo $rows_consultaChamada['nomeAluno']; ?> <input type="hidden" name="idMonitor" value="<?php echo $rows_consultaChamada['idMonitor']; ?>">  </td>
                        <td><?php echo $rows_consultaChamada['dtNascimento']; ?> </td>
                       
                     <td>
                     <?php
                     $result_consultaStatus = "SELECT L.idAluno,
                     L.presenca,
                     L.idLista_chamada   
     from lista_chamda L
     where L.idAluno = $rows_consultaChamada[idAluno] and L.idEncontro = $rows_consultaChamada[idEncontro]   ";
$resultado_consultaStatus = mysqli_query($con, $result_consultaStatus);
$res = $con->query($result_consultaStatus);
$linha2 = $res->fetch_assoc();

if($linha2['presenca'] == 0){

  echo 'Presente no dia';
}else{
  echo  'Faltou no dia';
}

 
                     ?>
                     </td>

                     <td>
                   
        

                
                        
            
                    <?php  echo "<a class='btn btn-success' title='Editar Presença' href='consultar_alunos.php?id=" . $rows_consultaChamada['idAluno'] . "' data-toggle='modal' data-target='#editarPresenca" . $rows_consultaChamada['idAluno'] . "'>" ?> <i  class="fas fa-edit"></i><?php echo "</a>"; ?>
                    
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
                                  <input type="text" readonly hidden name="nomeEncontro" class="form-control" value="<?php echo $rows_consultaChamada['nomeEncontro']; ?>">
                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaChamada['idAluno']; ?>">
                                   <label for="">Presença</label>
                                    <Select class="form-control col-md-7 col-xs-12"  name="presenca" maxlength="50" required="required" type="text">
                 
                 <option value='0'>Presente</option>
                   <option value='1'>Falta</option>
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
                                 
                                 
                                  <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php if(!empty($_SESSION['idMonitor'])){ echo $rows_consultaChamada['idMonitor']; } else{ echo '27'; } ?>">
                                  <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $rows_consultaChamada['idEncontro']; ?>">
                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaChamada['idAluno']; ?>">
                                   
                                   <?php  $result = "SELECT L.dataChamada, E.nomeEncontro FROM lista_chamda L, encontro E 
                                   where L.idEncontro = $rows_consultaChamada[idEncontro] and L.idEncontro = E.idEncontro and L.idAluno = $rows_consultaChamada[idAluno]"; 
                               $res2 = $con->query($result);
                                $linha3 = $res2->fetch_assoc();
                                   ?>
                                 <input type="text" name="dataChamada" hidden value="<?php echo $linha3['dataChamada'];?>">
                                 <input type="text" name="nomeEncontro" hidden value="<?php echo $linha3['nomeEncontro'];?>">
                                   <label for="">Retirar ou dar presença</label>
                                   
                                   
                                    <Select class="form-control col-md-7 col-xs-12"  name="presenca" maxlength="50" required="required" type="text">
                 


                 <option value='0'>Dar presença</option>
                   <option value='1'>Retirar</option>
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

                          <div class="modal fade" id="ModalSancao<?php echo $rows_consultaChamada['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                   <label for="">Dar Sanção Disciplinar</label>
                                    <Select class="form-control col-md-7 col-xs-12"  name="presenca" maxlength="50" required="required" type="text">
                 
                 <option value='Advertência'>Advertência</option>
                 <option value='Advertência'>Suspenção</option>
                   <option value='Expulsão'>Falta</option>
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
              
<?php
       if(isset($_POST["button"]))  {
    $idAluno = $_POST["idAluno"];
    $idMonitor = $_POST["idMonitor"];
    $presenca = $_POST["presenca"];
    $date = $date = date("d/m/y");

    $sql1 = "INSERT INTO lista_chamda (dataChamada, idAluno, presenca, idMonitor) VALUES ('$date', '$idAluno',	 '$presenca', '$idMonitor', '$idPolo' )";
    if ($con->query($sql1) === TRUE){
      
    } 
    if($presenca == ''){
      echo "<script>alert('Cadastro realizado com sucesso!');window.location='chamada_alunos.php'</script>";
    }

       }else
       {
      
      
      }
         

?>

               <center>  <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href='consultar_encontros.php'"  value="Voltar">
               <a  class='btn btn-success' title='Foto'  data-toggle='modal' data-target='#foto'>Ver foto</a> 
                </center>
                <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Dados do dia</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="envio_chamada.php" method="POST" enctype="multipart/form-data">

                                  <?php 
                                  $result_chamadaAluno = "SELECT * FROM chamada where idEncontro = '$idEncontros'";
                                  $res = $con->query($result_chamadaAluno);
                                  $linha4 = $res->fetch_assoc();
                                  ?>
                                 
                                  <input type="text" readonly hidden name="idMonitor" class="form-control" value="<?php echo $resultFinal['idMonitor']; ?>">
                                  <input type="text" readonly hidden name="idPolo" class="form-control" value="<?php echo $resultFinal['idPolo']; ?>">
                                  <input type="text" readonly hidden name="idEncontro" class="form-control" value="<?php echo $linha['idEncontro']; ?>">
                                 
                               <label for="">Foto do dia</label>
                               <embed src="<?php  echo 'files_encontros/'. $linha4['foto'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                               <label for="">Descrição</label>
                              <textarea name="descricao" id=""  cols="20" rows="5"class="form-control"><?php echo $linha4['descricao']; ?></textarea> 
                                  

                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                  
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