<?php
include_once("header.php");


?>

<?php
include_once "dao/conexao.php";
$idTarefa = $_GET["idTarefa"];

if(isset($_POST['nota'])){
$idTarefa2 = $_POST['idTarefa'];
$Result = "SELECT idAtividade FROM tarefa where idTarefa = '$idTarefa2'";

$res = $con->query($Result);
$linha = $res->fetch_assoc();
$idAtividade = $_POST['idAtividade'];
$nota =  $_POST['nota'];
$confirmacao = $_POST['confirmacao'];
$sql = "UPDATE tarefa set nota = '$nota', confirmacao = '$confirmacao', idUsuario = '$_SESSION[idUsuario]' where idTarefa = '$idTarefa2'";
if($con->query($sql) === TRUE){
  if($_SESSION['idMonitor'] != 0){
    echo "<script>alert('Atividade confirmada!');window.location='corrigir_tarefa.php?idAtividades=$idAtividade'</script>";
  }else{

    $idPolo = $_POST['idPolo'];
    echo "<script>alert('Atividade confirmada!');window.location='corrigir_tarefa_gerais.php?idAtividades=$idAtividade&idPolo=$idPolo'</script>";
  }
  }

if($_POST['possuiNota'] == 'Não'){

$sql = "UPDATE tarefa set nota = -1, confirmacao = '$confirmacao', idUsuario = '$_SESSION[idUsuario]' where idTarefa = '$idTarefa2'";
if($con->query($sql) === TRUE){
  if($_SESSION['idMonitor'] != 0){
    echo "<script>alert('Atividade confirmada!');window.location='corrigir_tarefa.php?idAtividades=$idAtividade'</script>";
  }else{
    $idPolo = $_POST['idPolo'];
    echo "<script>alert('Atividade confirmada!');window.location='corrigir_tarefa_gerais.php?idAtividades=$idAtividade&idPolo=$idPolo'</script>";
  }
  }
}

}



$Result_atividades = "SELECT T.pdfAtividade,T.idAtividade,T.dataEntrega,A.nomeAtividade,L.nomeAluno,T.idAluno, L.idPolo 
FROM tarefa T, atividades A, aluno L where idTarefa = '$idTarefa' and T.idAtividade = A.idAtividades and 
T.idAluno = L.idAluno  ";
$res = $con->query($Result_atividades);
$linha2 = $res->fetch_assoc();
?>
        
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Atividade de <?php echo $linha2['nomeAluno'] ?></div>
            </div>
                 
                <form action="visualizar_tarefa_aluno.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da atividade
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100"  readonly name="nomeAtividade" required="required" type="text" value="<?php echo $linha2["nomeAtividade"]; ?>">
            <input type="text" name="idAtividade" id="" hidden value="<?php echo $linha2['idAtividade']; ?>">
              <input type="text" name="idTarefa" hidden value="<?php echo $idTarefa; ?>">
              </div>
            </div>

         
            <div class="item form-group">
              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Data da entrega
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" maxlength="100" readonly name="dataEntrega" required="required" type="date" value="<?php echo $linha2["dataEntrega"] ?>" >
              </div>
            </div>
            <a class="btn btn-primary" href="<?php  echo 'tarefas_concluidas/'. $linha2['pdfAtividade'] .  '' ?>" target="_blank" rel="noopener noreferrer">Visualizar tarefa</a>
            




<div class="form-group col-md-4">
<label>Atividade possui nota ?</label>
<select name="possuiNota" id="select" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>

</select>


<div id="paiSa">
<div id="Sim">
<label for="">Nota do aluno</label>
<input type="number" name="nota" class="form-control" onkeyup="mascara('##',this,event,true)" >

</div>
</div>
</div>
<div class="item form-group">
<label for="">Eu confirmo a entrega da atividade</label>
<input type="checkBox" name="confirmacao" id="" required value="Concluído">
</div>
<br>
<br>

           <?php if($_SESSION['idMonitor'] == 0){ ?>
            <input type="text" name="idPolo" hidden id="" value="<?php echo $linha2['idPolo'] ?>"> <?php } ?>
    
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='tarefas_atribuidas.php'" value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success"  value="Salvar">
              </div>
            </div>
</form>


                              </div>
                            </div>
                          </div>
                        </div>

      


                </div>
              


<script src="js/mascaras.js"></script>
    

<style>
#paiSa div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#paiSa').children('div').hide();
		$('#paiSa').children(selectValor).show();
	});
});

</Script>


<?php
include_once("footer.php");

?>