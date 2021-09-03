<?php
include_once "header.php";

include_once "dao/conexao.php";

if(isset($_POST['idAluno'])){
if(!empty($_FILES["fichaDigitalizada"]["name"])){
  $pasta_arquivo = "digitalizados/";
  
  $idAluno = $_POST['idAluno'];

  $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
  $extensao = pathinfo($_FILES['fichaDigitalizada']['name'], PATHINFO_EXTENSION);

  if(in_array($extensao, $formatos)){
    $pasta = "digitalizados/";
    $temporario = $_FILES['fichaDigitalizada']['tmp_name'];
    $arquivo = uniqid().".$extensao";

    if(move_uploaded_file($temporario, $pasta.$arquivo)){
      $sql = "UPDATE aluno SET fichaDigitalizada = '$arquivo' where idAluno = '$idAluno'";
      $con->query("UPDATE processamento_cadastro set etapa = 'Concluído', status = 1 where idAluno = '$idAluno'");
    }
  }
if($con->query($sql)=== true){ 
  
} else {
     echo "Erro para inserir: " . $con->error; }

}
}

$result_consultaAlunoAdm = "SELECT * FROM processamento_cadastro P INNER JOIN aluno A ON  A.idAluno = P.idAluno where A.status = 1 and P.status = 0 ";
$resultado_consultaAlunoAdm = mysqli_query($con, $result_consultaAlunoAdm);

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Cadastros pendentes</h4>
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
                      <th>Etapa</th>
                   
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
                        <td><?php echo $rows_consultaAluno['etapa']; ?></td>
                            

                        <td>

                        <?php 
                        if($rows_consultaAluno['etapa'] == 'Finalização' ){
                        echo "<a class='btn btn-default' title='Vizualizar boletim' href='processamento_alunos_pendentes.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?>Continuar<?php echo "</a>"; }
                        else{
                        
                        echo "<a class='btn btn-default' title='Alterar' href='cadastro_aluno_pendente.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#ModalInserir" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fas fa-upload"></i><?php echo "</a>"; } ?>
                        
                   
                        <div class="modal fade" id="ModalInserir<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Inserir Ficha</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="" method="POST" enctype="multipart/form-data">

                                    <input type="text" readonly hidden  name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">
                                  
                                  
                                 <label for="">Ficha</label>
                                 <input type="file" name="fichaDigitalizada" class="form-control" id="">
                     
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