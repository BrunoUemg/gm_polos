<?php
include_once "dao/conexao.php";
include_once("header.php");
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
              <div class="card-title">Cadastro de Encontros</div>
            </div>
                 
                <form action="envio_cadastro_encontro.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">
                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Polo para encontro</label>
                  <select class="form-control" name="idPolo">
                    <option value="">Selecione o Polo</option>
                    <?php
                   
                    while ($row_Polo = mysqli_fetch_assoc($resultado_Polo)) { ?>
                      <option value="<?php echo $row_Polo['idPolo']; ?>"><?php echo $row_Polo['nomePolo']; ?></option>
                    <?php } ?> } ?>
                  </select>
                </div>

                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Data do Encontro</label>
                  <input type="date" class="form-control" name="dt" required="required">
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nome para encontro</label>
                  <input type="text" class="form-control" name="nomeEncontro" required="required">
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Descrição do encontro</label>
                 <textarea input type="text" class="form-control" name="descricao" > </textarea> 
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Horário Início</label>
                  <input type="time" class="form-control" name="horaInicio" required="required">
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Horário Final</label>
                  <input type="time" class="form-control" name="horaFinal" required="required">
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