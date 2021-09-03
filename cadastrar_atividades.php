<?php
include_once("header.php");


?>

<?php
if($_SESSION['idMonitor'] != 0){ 
$resultPolo = "SELECT * FROM monitor where idMonitor = $_SESSION[idMonitor]";
$res = $con->query($resultPolo);
$linha = $res->fetch_assoc();
}

$result_Polo ="SELECT * FROM polo where status = 1";
$resultado_Polo= mysqli_query($con, $result_Polo);
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
                 
                <form action="envio_cadastro_atividade.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da atividade
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeAtividade" required="required" type="text">
                <?php if($_SESSION['idMonitor'] != 0){ ?>
                <input type="text" name="idPolo" hidden value="<?php echo $linha['idPolo']; ?>"><?php } ?>
              </div>
            </div>
            <?php if($_SESSION['idMonitor'] == 0){ ?>
            <div class="item form-group">
                <label class="col-sm-2 col-sm-2 control-label">Polo para atividade</label>
                  <select class="form-control col-md-7 col-xs-12" name="idPolo">
                    <option value="">Selecione o Polo</option>
                    <?php
                   
                    while ($row_Polo = mysqli_fetch_assoc($resultado_Polo)) { ?>
                      <option value="<?php echo $row_Polo['idPolo']; ?>"><?php echo $row_Polo['nomePolo']; ?></option>
                    <?php } ?> 
                  </select>
                </div>
                <?php } ?>
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
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Valor Pontos
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