<?php 

include_once ("header.php");

?> 
 <?php
  if ($_SESSION['idMonitor'] == 0 && $_SESSION['idAluno'] == 0)

echo ' <div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            
              <!-- Start Content -->
              <center><div class="card-title">Cadastros Básicos</div></center>
              <div class="card-title">Cadastro de escola</div>
            </div>
                 
                <form action="envio_cadastro_escola.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da Escola 
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeEscola" required="required" type="text">
              </div>
            </div>

    



            
           
    
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href="MenuPrincipal.php" " value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success"  value="Salvar">
                <a href="atualizar_escola.php"> <input type="button" name="cancelar" class="btn btn-primary"   value="Atualizar"></a>
              </div>
            </div>
</form>

    
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
     
              <div class="card-title">Cadastro de Documentos</div>
            </div>
                 
                <form action="envio_cadastro_documento.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do documento
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeDocumento" required="required" type="text">
              </div>
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Obrigatorio
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" maxlength="100" name="obrigatorio" required="required" >
                <option value="">Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
                </select>
              </div>
            </div>

    



            
           
    
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href="MenuPrincipal.php" " value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success"  value="Salvar">
                <a href="atualizar_documentos.php"> <input type="button" name="cancelar" class="btn btn-primary"   value="Atualizar"></a>
              </div>
            </div>
</form>

<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
     
              <div class="card-title">Cadastro de Documentos</div>
            </div>
                 
                <form action="envio_cadastro_profissao.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do documento
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeProfissao" required="required" type="text">
              </div>
            </div>

    



            
           
    
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href="MenuPrincipal.php" " value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success"  value="Salvar">
                <a href="atualizar_documentos.php"> <input type="button" name="cancelar" class="btn btn-primary"   value="Atualizar"></a>
              </div>
            </div>
</form>









                </div>
              </div> 
              
</div> 
</div> '; ?>
<script src="js/mascaras.js"></script>
   


<?php 

include_once ("footer.php");
?>