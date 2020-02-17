
<?php 
include_once "dao/conexao.php";
include_once "header.php";

$result_Polo ="SELECT * FROM polo";
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
              <div class="card-title">Cadastro de Alunos</div>
            </div>
                 
                <form action="envio_cadastro_aluno.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do Aluno
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeAluno" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome"> Data de Nascimento
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="dtNascimento" required="required" type="date">
              </div>
            </div>

            <div class="form-group col-md-4">
              <label>Sexo</label>
                <Select class="form-control"  name="sexo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
</select>
</div>

<div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do Pai
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomePai" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Profissão do Pai
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="profissaoPai" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da Mãe
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeMae" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Profissão da Mãe
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="profissaoMae" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Endereço Residencial
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="enderecoResidencial" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Bairro
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="bairro" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Telefone Contato
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="telefoneContato" required="required" type="text">
              </div>
            </div>


<div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Polo">Polo
              </label>
               <div class="col-md-8 col-sm-6 col-xs-12">
                <select class="form-control" id=selectTipoPerfil name="idPolo" required="required"  >
        
                <option>Selecione o Polo</option>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>

<option value="<?php echo $rows_Polo['idPolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>

<?php } ?>	

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


    




<?php
include_once("footer.php");

?>