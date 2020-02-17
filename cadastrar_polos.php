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
              <div class="card-title">Cadastro de Polos</div>
            </div>
                 
                <form action="envio_cadastro_polo.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do Polo
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomePolo" required="required" type="text">
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


    




<?php
include_once("footer.php");

?>