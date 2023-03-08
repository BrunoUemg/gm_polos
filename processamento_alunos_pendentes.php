
<?php 
include_once "dao/conexao.php";
include_once "header.php";



$idAluno = $_GET['idAluno'];




$query = mysqli_query($con, "SELECT Max(cpfIntegrante_composicao)  AS codigo FROM composicao_familiar WHERE status = 0 ");
$result = mysqli_fetch_array($query);

$cpfIntegrante_composicao = $result['codigo'];

$result_consultaComposicao = "SELECT C.idComposicao_familiar,
C.idAluno,
C.nomeIntegrante,
C.renda,
C.parentesco,
C.profissao,
C.escolaridade,
C.idade,
C.estadoCivil,
C.cpfIntegrante_composicao,
C.status

from composicao_familiar C
where  C.status = 1 and idAluno = '$idAluno'  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);

$res = $con-> query($result_consultaComposicao);
$linha = $res->fetch_assoc();



?>



<!DOCTYPE html>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.steps.css">

    <form id="cad_projeto" method="post" action="envio_finalizacao_aluno.php" enctype="multipart/form-data">
        <div>



		<h3>Socioeconomica</h3>
            <section>
		 <a class='btn btn-default'  href='processamento_alunos_pendentes.php'  data-toggle='modal' data-target='#Modalvisu'> Inserir Integrantes </a> 
		
         
	


<div class="row">
			<div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
			<center><div class="card-title">Composição familiar </div></center>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables"  class="display table table-striped table-hover">
                  <thead>
				  <tr>
                      <th>Nome Integrante</th>
                    <th>Parentesco</th>
					<th>Idade</th>
					<th>CPF Integrante</th>
					<th></th>
                    </tr>
                  </thead>
				  <tbody>
				  <?php
                    while($listaComposicao = mysqli_fetch_assoc($resultado_consultaComposicao)){
								   ?>
							 <tr>
							   <td><?php echo $listaComposicao['nomeIntegrante']; ?></td>
							  
							   <td><?php echo $listaComposicao['parentesco']; ?></td>
							   <td><?php echo $listaComposicao['idade']; ?></td>
							   <td><?php echo $listaComposicao['cpfIntegrante_composicao']; ?></td>
						<td>
						<?php  echo "<a  class='btn btn-default' title='Excluir' href='remover.php?idComposicao_familiar=" .$listaComposicao['idComposicao_familiar']."&idAluno=".$listaComposicao['idAluno']."' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\">"?> <i class='fas fa-trash-alt'></i><?php echo "</a>";  ?>
					
						
						</td>
						</tr>
<?php }  ?>
				  
				  </tbody>

				  </table>
				  </div>
				  </div>
				  </div>
				  </div>

</div>
<center><div class="card-title">Ficha Social </div></center>
<div class="row">

<input type="text" name="idAluno" hidden value="<?php echo $idAluno; ?>" id="">


<div class="form-group col-md-4">
<label>Integrante familiar sem Documento ? </label><br>
<select name="semDocumento" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>

<div class="form-group col-md-4">
<label>Gestante na Família ? </label><br>
<select name="gestante" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
			  <label for="">Parentesco gestante</label>
			  <select class="form-control" name="parentescoGestante" id="">
				  <option value="">Selecione</option>
			
				  <option value="Mãe">Mãe</option>
				  <option value="Filho(a)">Filho(a)</option>
				 
				  <option value="Irmã">Irmã</option>
				 
				 
				  <option value="Tia">Tia</option>
				
				  <option value="Prima">Prima</option>
				 
				  </select>

              
</div>

<div class="form-group col-md-4">
<label>Dependente Químico na familia ? </label><br>
<select name="dependenteQuimico" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
              
              
              <label for="">Nome do dependente Químico</label>
              <input class="form-control " maxlength="100"  name="nomeDependenteQui"   type="text"  placeholder="Cite"  >
              
</div>

</div>
<div class="row">
<div class="form-group col-md-4">
<label>Gastos Medicamentos ? </label><br>
<select name="gastosMedicamentos" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim" >Sim</option>
<option value="Não" >Não</option>
</select>
            
              
              
			  <label for="">Valor Medicamento</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control col-md-7 col-xs-12" maxlength="100"  name="gastosMedicamentosValor"  type="number"  placeholder="Valor"  >
</div>
</div>

<div class="form-group col-md-4">
<label>Deficiênte ou doença Crônica ? </label><br>
<select name="doencaFamilia" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
              
              
			  <label for="">Nome enfermo</label>
              <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeDoencaFamilia"   type="text"  placeholder="Cite">
</div>

<div class="form-group col-md-4">
<label>Possui energia elétrcia ?</label><br>
  
<select name="energia" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim" >Sim</option>
<option value="Não" >Não</option>
</select>
              
              
			  <label for="">Valor Energia</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"   name="valorEnergia"   type="text"  placeholder="Valor" onKeyPress="return(moeda(this,'.',',',event))" >
</div>

</div>



</div>





<div class="row">
<div class="form-group col-md-4">
<label>Tipo residência ? </label><br>
<select name="residencia" id="" class="form-control">
<option value="">Selecione</option>
<option value="Residência própria">Residência própria</option>
<option value="Alugada" >Alugada</option>
<option value="Cedida" >Cedida</option>
<option value="A favor">A favor</option>
<option value="Financiada">Financiada</option>
</select>
			  <label for="">Valor gasto com residência</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"  name="valorResidencia"   type="text" placeholder="Valor" onKeyPress="return(moeda(this,'.',',',event))"  >
</div>

</div>

<div class="form-group col-md-4">
<label>Tipo de Água ?</label><br>
<select name="agua" id="" class="form-control">
<option value="">Selecione</option>
<option value="Água encanada"  >Água encanda</option>
<option value="Sisterna" >Sisterna</option>
<option value="Poço"  >Poço</option>
</select>
              
              
			  <label for="">Valor Água</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"   name="valorAgua"   type="text"  placeholder="Valor" onKeyPress="return(moeda(this,'.',',',event))" >
</div>
</div>
<div class="form-group col-md-4">
<label>Escola Publica ou Privada ?</label><br>
  
<select name="tipoEscola" id="" class="form-control">
<option value="">Selecione</option>
<option value="Pública"  >Pública</option>
<option value="Privada" >Privada</option>
</select>
              
              
			  <label for="">Gastos com Escola</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control " maxlength="100" name="valorEscola"   type="number"  placeholder="Gastos"    >
</div>
</div>
</div>

<div class="row">

            

			  <div class="form-group col-md-4">
			  <label for="">Valor gasto com idioma</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control   " maxlength="5"  name="valorIdioma"  required="required" type="number"   >
              </div>
			  </div>

			  
              <div class="form-group col-md-4">
			  
			  <label for="">Valor gasto com curso de informática</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control  " maxlength="5"  name="valorInformatica"  required="required" type="number" >
              </div>
			  </div>

			  <div class="form-group col-md-4">
			  <label for="">Gastos com Alimentação</label>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
    
  </div>
              <input class="form-control  " maxlength="5"  name="valorAlimentacao"  required="required" type="number"  >
              </div>
			  </div>

			  <div class="form-group col-md-4">
			  <label for="">Número Quartos</label>
              <input class="form-control  " maxlength="100"  name="numQuartos"  required="required" type="number"   >
              </div>

			  
              <div class="form-group col-md-4">
			  <label for="">Número Banheiros</label>
              <input class="form-control  " maxlength="100"  name="numBanheiros"  required="required" type="number"  >
              </div>

			  <div class="form-group col-md-4">
<label title="cadastro único" >Cadastrado no CAD único ?  </label><br>
<select name="cadUnico" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>

<div class="form-group col-md-4">
<label>Possui bolsa família ? </label><br>
<select name="bolsaFamilia" id="" class="form-control">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>
			  
			  </div>
          


        </section>






      

          

        <h3>Ficha Médica</h3>
            <section>

            <h3>Ficha Médica</h3>

          <div class="row">
            <div class="form-group col-md-4">
              <label>Tipo sanguíneo</label>
                <Select class="form-control"  name="tipoSanguineo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
</div>
<div class="form-group col-md-4">
              <label>Fator RH</label>
                <Select class="form-control"  name="fatorRh" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Positivo">Positivo</option>
                  <option value="Negativo">Negativo</option>
                  
</select>
</div>


<div class="form-group col-md-4">
<label>Altura</label>
  <input class="form-control"  maxlength="100" name="altura" required="required" type="text" onkeyup="mascara('#,## m',this,event,true)">
</div>

<div class="form-group col-md-4">
<label>Peso</label>
  <input class="form-control"  maxlength="100" name="peso" required="required" type="text" >
</div>




<div class="form-group col-md-4">
              <label>Emergências Médicas</label>
                <Select class="form-control"  name="emergenciasMedicas" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Aguardar Acompanhamento dos Pais/Responsavel">Aguardar Acompanhamento dos Pais/Responsável</option>
                  <option value="Aceitar decisões médicas">Aceitar decisões médicas</option>
                  
</select>
</div>
      


<div class="form-group col-md-10">
              <label>Permitir administrar medicamentos por profissionais em sáude que atuam no Grupo</label>
                <Select class="form-control"  name="permicao" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
</select>
</div>



<div class="form-group col-md-4">
  <label>Avisar em Emergências</label>
    <Select class="form-control"  name="avisarEmergencia" maxlength="20" required="required" type="">
      <option >Selecione</option>
      <option value="Pais/Responsavel">Pais/Responsável</option>
      <option value="Outro">Outro</option>
    </select>
</div>

<div class="form-group col-md-4">
<label>Telefone Emergência</label>
  <input class="form-control"  maxlength="100" name="telefoneEmergencia" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)" >
</div>
  </div>
<h3>Medicamentos continuos ?</h3>
  <div class="row">
<div class="form-group col-md-2">
	
<label>sim</label>
  <input class="form-control"  maxlength="100" name="medContinuos" value="Sim" required="required" type="radio" onclick="undisableTxt()"  >
</div>
<div class="form-group col-md-2">
	
<label>Não</label>
  <input class="form-control"  maxlength="100" name="medContinuos" value="Não" required="required" type="radio" onclick="disableTxt()" >
</div>


<div class="form-group col-md-4">
<label for="">Nome Medicamento</label>
  <input class="form-control"  maxlength="100" id="myText" value="" name="nomeMedicamento"  disabled placeholder="Nome medicamento" type="text">
</div> 

<div class="form-group col-md-4">
<label>Equipamentos Auxílio</label>
<select class="form-control" name="equipamentosAuxilio" id="select2">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>
<div id="pai2">
<div id="Sim">

<label for=""> Óculos</label>
  <input   maxlength="100" hidden checked="checked" name="oculos" value="Não"  type="checkbox" >
  <input   maxlength="100" name="oculos" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Aparelho Dentário</label>
  <input   maxlength="100" hidden checked="checked" name="aparelhoDentario" value="Não"  type="checkbox" >
  <input   maxlength="100" name="aparelhoDentario" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Marcapasso</label>
  <input   maxlength="100" hidden checked="checked" name="marcapasso" value="Não"  type="checkbox" >
  <input   maxlength="100" name="marcapasso" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Sonda</label>
  <input   maxlength="100" hidden checked="checked" name="sonda" value="Não"  type="checkbox" >
  <input  maxlength="100" name="sonda" value="Sim" type="checkbox" >
  <label for=""></label>
  <label for=""> Aparelho Audição</label>
  <input   maxlength="100" hidden checked="checked" name="aparelhoAudicao" value="Não"  type="checkbox" >
  <input   maxlength="100" name="aparelhoAudicao" value="Sim" type="checkbox" >
  <label for=""></label>
  <label for=""> Lentes Contato</label>
  <input   maxlength="100" hidden checked="checked" name="lentesContato" value="Não"  type="checkbox" >
  <input   maxlength="100" name="lentesContato" value="Sim"  type="checkbox" >
  <label for=""></label>
  
 
  <input  class="form-control" maxlength="100" name="outroEquipamento"  type="text" placeholder="Outro " >
  
  </div>
</div>


<div class="form-group col-md-6">
<label>Plano médico</label>
  <input class="form-control"  maxlength="100" name="planoMedico" required="required" type="text">
</div>

<div class="form-group col-md-6">
<label>Número carteirinha</label>
  <input class="form-control"  maxlength="100" name="numCarteira"  type="text">
</div>

<div class="form-group col-md-4">
<label>Alergia</label>
<select class="form-control" name="alergia" id="select">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>
<div id="pai">
<div id="Sim">

<label for=""> Picada inseto</label>
<input   maxlength="100" hidden checked="checked" name="picadaInseto" value="Não"  type="checkbox" >
  <input   maxlength="100" name="picadaInseto" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Medicamento</label>
  <input   maxlength="100" hidden checked="checked" name="alergiaMedicamentos" value="Não"  type="checkbox" >
  <input   maxlength="100" name="alergiaMedicamentos" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Plantas</label>
  <input   maxlength="100" hidden checked="checked" name="plantas" value="Não"  type="checkbox" >
  <input   maxlength="100" name="plantas" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Alimentos</label>
  <input   maxlength="100" hidden checked="checked" name="alimentos" value="Não"  type="checkbox" >
  <input  maxlength="100" name="alimentos" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> outro</label>
  <input   maxlength="100" hidden checked="checked" name="outraAlergia" value="Não"  type="checkbox" >
  <input   maxlength="100" name="outraAlergia" value="Sim"  type="checkbox" >
 
 
  <label for=""></label>
  
 
  <input  class="form-control" maxlength="100" name="outraAlergiaDesc"  type="text" placeholder="Descrever " >
  
  </div>
</div>









<style>
#pai div{
	display:  none;
}
</style>

<style>
#pai2 div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai').children('div').hide();
		$('#pai').children(selectValor).show();
	});
});

</Script>

<Script>

$(document).ready(function(){

	$('#select2').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai2').children('div').hide();
		$('#pai2').children(selectValor).show();
	});
});

</Script>



                  </div>


				  <center>   <h3>Ficha Médica Finalização</h3> </center>
            <div class="row">
            <div class="form-group col-md-4">
              <label>Sabe nadar ?</label>
                <Select class="form-control"  name="nadar" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>

<div class="form-group col-md-4">
              <label>É sonâmbulo ?</label>
                <Select class="form-control"  name="sonambulo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>

<div class="form-group col-md-4">
              <label>Problemas cardíacos</label>
                <Select class="form-control"  name="cardiaco" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>


<div class="form-group col-md-4">
<label>Restrições a alimentos ?</label>


  <select class="form-control" name="restricoesAlimentos" id="select7">
  <option value="">Selecione</option>
  <option value="Sim">Sim</option>
  <option value="Não">Não</option>
  </select>
  <div id="pai7">
<div id="Sim">
<input class="form-control"  maxlength="100" name="restricoesAlimentosDesc"  type="text"  >
</div>
</div>
</div>

<div class="form-group col-md-4">
<label>Possui impedimento Físico ?</label>
<select class="form-control" name="impedimentoFisico" id="">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>

 
</div>
  </div>
  <center><h3>Distúbios psico e deficiências (colocar não se não possuir)</h3></center>
  <div class="row">
    
  <div class="form-group col-md-10">
<label>Apresenta Distúbio de comportamento ?</label>
  
  <select class="form-control" name="distubioComportamento" id="select4"> 
  <option value="">Selecione</option>
  <option value="Sim">Sim</option>
  <option value="Não">Não</option></select>
 


<div id="pai4">
<div id="Sim">

<input class="form-control"  maxlength="100" name="disturbioComportamentoDesc"  type="text" placeholder="ex: Conduta, hiperatividade por déficit de atenção etc. " >
 
  
  </div>
</div>
</div>

<div class="form-group col-md-10">
<label>Apresenta Distúbio de Alimentar ?</label>
<select class="form-control" name="disturbioAlimentar" id="select5">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
<div id="pai5">
<div id="Sim">

<input class="form-control"  maxlength="100" name="disturbioAlimentarDesc"  type="text" placeholder="ex: ex: Anorexia nervosa, bulimia nervosa, etc. " >
 
  
  </div>
</div>
  
</div>
      
<div class="form-group col-md-10">
<label>Apresenta Distúbio de Ansiedade Fóbica ?</label>
<select class="form-control" name="disturbioAnsiedade" id="select6">
<option value="">Selecione</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
<div id="pai6">
<div id="Sim">
  <input class="form-control"  maxlength="100" name="disturbioAnsiedadeDesc"  type="text" placeholder="ex: Distúrbio do pânico, agorafobia, etc " >
  
  </div>
  </div>
</div>

<div class="form-group col-md-10">
<label>Deficiências</label>
 
  <select class="form-control" name="deficiencia" id="select3">
  <option value="">Selecione</option>
  <option value="Sim">Sim</option>
  <option value="Não">Não</option>
  </select>

</div>

<div id="pai3">
<div id="Sim">

<label for=""> Física</label>
<input   maxlength="100" hidden checked="checked" name="fisica" value="Não"  type="checkbox" >
  <input   maxlength="100" name="fisica" value="Sim" type="checkbox" >
  <label for=""></label>
  <label for=""> Visual</label>
  <input   maxlength="100" hidden checked="checked" name="visual" value="Não"  type="checkbox" >
  <input   maxlength="100" name="visual" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Auditiva</label>
  <input   maxlength="100" hidden checked="checked" name="auditiva" value="Não"  type="checkbox" >
  <input   maxlength="100" name="auditiva" value="Sim"  type="checkbox" >
  <label for=""></label>
  <label for=""> Intelectual</label>
  <input   maxlength="100" hidden checked="checked" name="intectual" value="Não"  type="checkbox" >
  <input  maxlength="100" name="intectual" value="Sim"  type="checkbox" >
 
  
  </div>
</div>

<style>
#pai3 div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select3').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai3').children('div').hide();
		$('#pai3').children(selectValor).show();
	});
});

</Script>

<style>
#pai4 div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select4').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai4').children('div').hide();
		$('#pai4').children(selectValor).show();
	});
});

</Script>

<style>
#pai5 div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select5').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai5').children('div').hide();
		$('#pai5').children(selectValor).show();
	});
});

</Script>

<style>
#pai6 div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select6').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai6').children('div').hide();
		$('#pai6').children(selectValor).show();
	});
});

</Script>


<style>
#pai7 div{
	display:  none;
}
</style>

<Script>

$(document).ready(function(){

	$('#select7').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai7').children('div').hide();
		$('#pai7').children(selectValor).show();
	});
});

</Script>




                  </div>

        </section>

      

        
      
        

        </div>
    </form>

	<div class="modal fade" id="Modalvisu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Composição Familiar</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               

							  <?php                 
$result_profissao ="SELECT * FROM profissao ";
$resultado_profissao = mysqli_query($con, $result_profissao); ?>


							    <form action="envio_cadastrar_composicao.php" method="POST" >
								<label for="">CPF do Integrante</label>
                  <input type="text"  name="cpfIntegrante_composicao" class="form-control" onkeyup="mascara('###.###.###-##',this,event,true)"  >
                  <input type="text"  name="idAluno" hidden class="form-control" value="<?php echo $idAluno; ?>" >
				  
<label for="">Nome integrante</label>
                  <input type="text"  name="nomeIntegrante" class="form-control" >

				  <label for="">Renda</label>
                  <input type="text"  name="renda" class="form-control" maxlength="5" >
                  
				  <label for="">Data nascimento</label>
                  <input type="date"  name="idade" class="form-control"   >
                  
				  <label for="">Parentesco</label>
              
			  <select class="form-control" name="parentesco" id="">
			  <option value="">Selecione</option>
			  <option value="Pai">Pai</option>
			  <option value="Mãe">Mãe</option>
			  <option value="Filho">Filho</option>
			  <option value="Irmão">Irmão</option>
			  <option value="Irmã">Irmã</option>
			  <option value="Avó">Avó</option>
			  <option value="Avô">Avô</option>
			  <option value="Tio">Tio</option>
			  <option value="Tia">Tia</option>
			  <option value="Primo">Primo</option>
			  <option value="Prima">Prima</option>
			  <option value="Bisavó">Bisavó</option>
			  <option value="Bisavô">Bisavô</option>
			  </select>
                  
				  <label>Escolaridade</label>
                                  <select class="form-control" name="escolaridade" id="">
                                  <option >Selecione</option>
                                   <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                                   <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option> 
                                   <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                                   <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                                   <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                                   <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                                    
                                    </select>
                

				  <label for="">Profissão</label>
				  <select class="form-control"  name="profissao" required="required"  >

<option>Selecione a Profissão</option>
<?php while($rows_profissao = mysqli_fetch_assoc($resultado_profissao)){ ?>

<option value="<?php echo $rows_profissao['nomeProfissao'];?>"><?php echo ($rows_profissao['nomeProfissao']);?></option>

<?php } ?>  

</select>
                  
				  <label for="">Estado Civil</label>
                 
				 <select class="form-control" name="estadoCivil" id="">
				 <option value="Nenhum">Selecione</option>
				 <option value="Casado(a)">Casado(a)</option>
				 <option value="Solteiro(a)">Solteiro(a)</option>
				 <option value="Viúvo(a)">Viúvo(a)</option>
				 <option value="Divorciado(a)">Divorciado(a)</option>
				 
				 </select>
                  
               
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>

						
						  

    <script src="js/mascaras.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/script.js"></script>
    <script src="js/states.js"></script>
	<script>function disableTxt() {
  document.getElementById("myText").disabled = true;
  document.getElementById("myText").value = "Não possui";
}

function undisableTxt() {
  document.getElementById("myText").disabled = false;
}</script>

<script language="javascript">   
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
</script>
    




<?php
include_once("footer.php");

?>