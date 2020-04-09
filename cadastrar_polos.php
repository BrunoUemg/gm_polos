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

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Data de Criação
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="dtCriacao" required="required" type="text" onkeyup="mascara('##/##/####',this,event,true)">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Endereço de Funcionamento
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="enderecoFuncionamento" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Local Funcionamento
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="localFuncionamento" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Hora Funcionamento
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="horaFuncionamento" required="required" type="time">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Dia de Funcionamento</label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <Select class="form-control col-md-7 col-xs-12"  name="diaFuncionamento" maxlength="50" required="required" type="text">
                  <option value="null">Selecione</option>
                <option value="Domingo">Domingo</option>
                  <option value="Segunda">Segunda</option>
                  <option value="Terça">Terça</option>
                  <option value="Quarta">Quarta</option>
                  <option value="Quinta">Quinta</option>
                  <option value="Sexta">Sexta</option>
                  <option value="Sabado">Sabado</option>
                
</select>
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