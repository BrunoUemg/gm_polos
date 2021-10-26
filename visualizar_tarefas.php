<?php
include_once("header.php");


?>

<?php
$idAtividades = $_GET["idAtividades"];

$Result_atividades = "SELECT * FROM atividades where idAtividades = '$idAtividades' ";
$res = $con->query($Result_atividades);
$linha2 = $res->fetch_assoc();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>

a{
   text-decoration: none;
	   
}

</style>
        
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Minha atividade</div>
            </div>
                 
                <form action="envio_tarefa.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da atividade
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100"  readonly name="nomeAtividade" required="required" type="text" value="<?php echo $linha2["nomeAtividade"]; ?>">
              <input type="text" name="idPolo" hidden value="<?php echo $linha2['idPolo']; ?>">
              <input type="text" name="idUsuario" hidden value="<?php echo $_SESSION['idUsuario']; ?>">
              <input type="text" name="idAtividades" hidden value="<?php echo $idAtividades; ?>">
              </div>
            </div>

         
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Data da entrega
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" readonly name="dataEntrega" required="required" type="date" value="<?php echo $linha2["dataEntrega"] ?>" >
              </div>
            </div>
            <div class="item form-group">     
            <label  class="control-label col-md-6 col-sm-3 col-xs-12" for="">Descrição atividade</label>  
            <div class="col-md-10 col-sm-6 col-xs-12">
      <p class="form-control">
      <?php echo $linha2["descricao"]; ?>
      </p>
         </div>
         </div>

<?php 

$documento = substr($linha2['documentoApoio'],0,29);


if($linha2['documentoApoio'] ==  $documento.'.pdf'){ ?>
  <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Documento de apoio
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <a class='btn btn-default'  href='cadastrar_alunos.php'  data-toggle='modal' data-target='#Modalvisu'> Visualizar materia de apoio </a> 
             
              </div>
            </div>
        <?php     
    
    } ?>


<div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Entregar atividade
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100"  name="pdfAtividade" required="required" type="file"  >
              </div>
            </div>


            <div class="progress">
		<div class="progress-bar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
	</div>
<div class="modal fade" id="carregar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Por favor aguarde carregamento...</h5>
        
      </div>
      <div class="modal-body">
	  <div class="progress">
		<div class="progress-bar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
	</div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>


           
    
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='tarefas_atribuidas.php'" value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success"  value="Salvar">
              </div>
            </div>
</form>

<div class="modal fade" id="Modalvisu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Material apoio</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               
  
                              <embed  src="<?php  echo 'documento_apoio/'. $linha2['documentoApoio'] .  '' ?>"  width="445" height="400" type='application/pdf' >
			
                  
               
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                             
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>

      


                </div>
              </div>
</div> 

<script src="js/mascaras.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/script.js"></script>
    <script src="js/states.js"></script>
    
<script>
			$(document).on('submit', 'form', function (e) {
				e.preventDefault();
				//Receber os dados
				$form = $(this);				
				var formdata = new FormData($form[0]);
				
				//Criar a conexao com o servidor
				var request = new XMLHttpRequest();
				
				//Progresso do Upload
				$('#carregar').modal('show');
				request.upload.addEventListener('progress', function (e) {
					var percent = Math.round(e.loaded / e.total * 100);
					$form.find('.progress-bar').width(percent + '%').html(percent + '%');
				});
				
				//Upload completo limpar a barra de progresso
				request.addEventListener('load', function(e){
					$form.find('.progress-bar').addClass('progress-bar-success').html('upload completo...');
					//Atualizar a página após o upload completo
					window.location.href= 'tarefas_atribuidas.php';
				});
				
				//Arquivo responsável em fazer o upload da imagem
				request.open('post', 'envio_tarefa.php');
				request.send(formdata);
			});
		</script>



<?php
include_once("footer.php");

?>