<?php
include_once("header.php");


?>

<?php 
$resultUsuario = "SELECT * FROM usuario where idUsuario = $_SESSION[idUsuario]";
$res = $con->query($resultUsuario);
$linha = $res->fetch_assoc();
?>
         
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Cadastrar meu boletim</div>
            </div>
                 
                <form action="envio_cadastro_boletim.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left" enctype="multipart/form-data">

               
              <input type="text" name="idAluno" hidden value="<?php echo $linha['idAluno']; ?>">
              

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Data do boletim
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="dataBoletim" required="required" type="date"  >
              </div>
            </div>
           
          

  <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Imagem do boletim
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="srcBoletim"  type="file" >
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