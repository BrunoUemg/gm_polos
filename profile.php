<?php
include_once "dao/conexao.php";
include_once "header.php";
$profile = mysqli_query($con,"SELECT M.nomeMonitor, M.dtNascimento, M.cpf, M.idPolo  FROM usuario U, monitor M , polo P WHERE idUsuario = $_SESSION[idUsuario] and U.idMonitor=M.idMonitor and M.idPolo = P.idPolo");
$result_profile = mysqli_fetch_array($profile);
?>
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Meu Perfil</div>
            </div>
            <form class="form-horizontal style-form" action="alterar_funcionario.php" method="post">
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                  <input type="text" class="form-control" name="nomeMonitor" required="required" value="<?php echo $result_profile['nomeMonitor'];?>">
              </div>

              <input type="text" hidden readonly class="form-control" name="idUsuario" required="required" value="<?php echo $result_profile['idUsuario'];?>">


              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">CPF</label>
                  <input type="text" class="form-control" name="cpf" required="required" value="<?php echo $result_profile['cpf'];?>" onkeyup="mascara('###.###.###-##',this,event,true)">
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Data de Nascimento</label>
                  <input type="date" class="form-control" name="dtNascimento" required="required" value="<?php echo $result_profile['dtNascimento'];?>">
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Polo</label>
                  <select class="form-control" name="cargos" readonly>
                    <option value="">Selecione o Cargo</option>
                    <?php
                    $resultado_cargos = mysqli_query($con, "SELECT * FROM polo");
                    while ($row_cargos = mysqli_fetch_assoc($resultado_cargos)) { ?>
                      <option value="<?php echo utf8_encode($row_cargos['idPolo']); ?>"<?php if($result_profile['idPolo']==$row_cargos['idPolo'])echo 'selected';?>><?php echo $row_cargos['nomePolo']; ?></option>
                    <?php } ?> } ?>
                  </select>
                </div>
              <div class="card-action">
                <button type="submit" class="btn btn-danger" onClick="window.location.href='index.php'">Cancelar</button>

                <button type="submit" class="btn btn-theme">Salvar</button>
              </div>
            </form>
            <!-- End Content -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
window.onload = function(){
	document.getElementById("cep").focus();
	document.getElementById("cep").blur();
}
</script>

<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="js/states.js"></script>
<script src="js/mascaras.js"></script>

<?php
include_once "footer.php";
?>