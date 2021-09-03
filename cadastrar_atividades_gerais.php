<?php
include_once("header.php");


?>

         
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Cadastro de atividades gerais</div>
            </div>
                 
                <form action="envio_cadastro_atividade_gerais.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da atividade
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeAtividade" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Data da atividade
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="dataAtividade" required="required" type="date"  >
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Data da entrega
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="dataEntrega" required="required" type="date" >
              </div>
            </div>
            <div class="item form-group">     
            <label  class="control-label col-md-6 col-sm-3 col-xs-12" for="">Descrição atividade</label>  
            <div class="col-md-10 col-sm-6 col-xs-12">
<textarea name="descricao" id="" class="form-control col-md-7 col-xs-12" cols="30" rows="10"></textarea>
         </div>
         </div>


  <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Documento de apoio
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="documentoApoio"  type="file" >
              </div>
            </div>
        
  <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Valor da atividade em pontos
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="valorPontos"  type="number" >
              </div>
            </div>
        



            
           
    
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='MenuPrincipal.php'" value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success"  value="Salvar">
              </div>
            </div>
</form>




                </div>
              </div>
</div> 

<script src="js/mascaras.js"></script>
    




<?php
include_once("footer.php");

?>