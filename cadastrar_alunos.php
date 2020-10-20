
<?php 
include_once "dao/conexao.php";
include_once "header.php";

$result_Polo ="SELECT * FROM polo where status = 1";
$resultado_Polo= mysqli_query($con, $result_Polo);

$result_Escola ="SELECT * FROM escola ";
$resultado_Escola= mysqli_query($con, $result_Escola);

$result_profissao ="SELECT * FROM profissao ";
$resultado_profissao = mysqli_query($con, $result_profissao);



$result_documentos ="SELECT * FROM documentos  ORDER BY nomeDocumento ";
$resultado_documentos= mysqli_query($con, $result_documentos);

$result_documentos2 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos2= mysqli_query($con, $result_documentos2);

$result_documentos3 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos3= mysqli_query($con, $result_documentos3);

$result_documentos4 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos4= mysqli_query($con, $result_documentos4);

$result_documentos5 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos5= mysqli_query($con, $result_documentos5);

$result_documentos6 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos6= mysqli_query($con, $result_documentos6);

$result_documentos7 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos7= mysqli_query($con, $result_documentos7);

$result_documentos8 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos8= mysqli_query($con, $result_documentos8);

$result_documentos9 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos9= mysqli_query($con, $result_documentos9);

$result_documentos10 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos10= mysqli_query($con, $result_documentos10);

$result_documentos11 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos11= mysqli_query($con, $result_documentos11);

$result_documentos12 ="SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos12= mysqli_query($con, $result_documentos12);

$query = mysqli_query($con, "SELECT Max(cpfAluno_composicao)  AS codigo FROM composicao_familiar WHERE status = 0 ");
$result = mysqli_fetch_array($query);

$cpfAluno_composicao = $result['codigo'];

$result_consultaComposicao = "SELECT C.idComposicao_familiar,
C.idAluno,
C.nomeIntegrante,
C.renda,
C.parentesco,
C.profissao,
C.escolaridade,
C.idade,
C.estadoCivil,
C.cpfAluno_composicao,
C.status

from composicao_familiar C
where  C.status = 0  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);

$res = $con-> query($result_consultaComposicao);
$linha = $res->fetch_assoc();

?>



<!DOCTYPE html>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.steps.css">

    <form id="cad_projeto" method="post" action="envio_cadastro_aluno.php" enctype="multipart/form-data">
        <div>



		<h3>Socioeconomica</h3>
            <section>
		 <a class='btn btn-default'  href='cadastrar_alunos.php'  data-toggle='modal' data-target='#Modalvisu'> Inserir Integrantes </a> 
		 <?php echo "<a class='btn btn-default' title='Alterar' href='cadastrar_composicao.php?cpfAluno_composicao=" . $linha['cpfAluno_composicao'] .  "'>" ?>Visualizar e modificar</a>
         



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
					<th>CPF Aluno</th>
                    </tr>
                  </thead>
				  <tbody>
				  <?php while ($rows_consultaComposicao = mysqli_fetch_assoc($resultado_consultaComposicao)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaComposicao['nomeIntegrante']; ?></td>
                       
                        <td><?php echo $rows_consultaComposicao['parentesco']; ?></td>
                        <td><?php echo $rows_consultaComposicao['idade']; ?></td>
						<td><?php echo $rows_consultaComposicao['cpfAluno_composicao']; ?></td>
						
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






            <h3>Informações Pessoais</h3>
            <section>

         <center>   <h3>Informações Pessoais</h3> </center>

            <div class="row">

              <div class="form-group col-md-8">
              <label>Nome Completo </label>
              <input class="form-control" maxlength="100" name="nomeAluno"  required="required" type="text">
              </div>
            

              <div class="form-group col-md-4">
              <label>Data de Nascimento</label>
                <input class="form-control"  name="dtNascimento" required="required" type="text" onkeyup="mascara('##/##/####',this,event,true)">
            </div>
          </div>


              <div class="row">

                     <div class="form-group col-md-4">
              <label>Sexo</label>
                <Select class="form-control"  name="sexo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
</select>
</div>
            
            <div class="form-group col-md-4">
              <label>RG Aluno (não obrigatório)</label>
                <input class="form-control"  name="rgAluno" maxlength="40"  type="text">
              </div>
            
            <div class="form-group col-md-4">
              <label>CPF Aluno</label>
                <input class="form-control"  name="cpfAluno" maxlength="15"  required="required" type="text" onkeyup="mascara('###.###.###-##',this,event,true)" value="<?php echo $linha['cpfAluno_composicao']; ?>">
              </div>
            </div>

            <div class="row">

<div class="form-group col-md-6">
<label>Nome Pai </label>
<input class="form-control" maxlength="50" name="nomePai"  type="text">
</div>


<div class="form-group col-md-6">
<label>Nome Mãe</label>
  <input class="form-control"  maxlength="50" name="nomeMae" type="text" required="required" >
</div>
</div>

<div class="row">

<div class="form-group col-md-4">
<label>RG Responsavel</label>
  <input class="form-control"  maxlength="40" name="rgResponsavel" required="required" type="text">
</div>



<div class="form-group col-md-4">
<label>CPF Responsavel</label>
  <input class="form-control"  maxlength="100" name="cpfResponsavel" required="required" type="text" onkeyup="mascara('###.###.###-##',this,event,true)">
</div>
<div class="form-group col-md-4">
<label>Profissão Pai</label>
<select class="form-control"  name="profissaoPai" required="required"  >

<option>Selecione a Profissão</option>
<?php while($rows_profissao = mysqli_fetch_assoc($resultado_profissao)){ ?>

<option value="<?php echo $rows_profissao['nomeProfissao'];?>"><?php echo ($rows_profissao['nomeProfissao']);?></option>

<?php } ?>  

</select>
</div>
</div>

<div class="row">


<div class="form-group col-md-4">
<label>Profissão Mãe</label>
<select class="form-control"  name="profissaoMae" required="required"  >

<option>Selecione a Profissão</option>
<?php
$result_profissao ="SELECT * FROM profissao ";
$resultado_profissao = mysqli_query($con, $result_profissao);

while($rows_profissao = mysqli_fetch_assoc($resultado_profissao)){ ?>

<option value="<?php echo $rows_profissao['nomeProfissao'];?>"><?php echo ($rows_profissao['nomeProfissao']);?></option>

<?php } ?>  

</select>
</div>
<div class="form-group col-md-4">
<label>Nacionalidade Responsável</label>
 <select  class="form-control" name="nacionalidadeResponsavel"  id="nacionalidadeResponsavel">
	<option value="Brasileira" selected="selected">Brasileira</option>
	<option value="Afeganistão">Afeganistão</option>
	<option value="África do Sul">África do Sul</option>
	<option value="Albânia">Albânia</option>
	<option value="Alemanha">Alemanha</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antilhas Holandesas">Antilhas Holandesas</option>
	<option value="Antárctida">Antárctida</option>
	<option value="Antígua e Barbuda">Antígua e Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Argélia">Argélia</option>
	<option value="Armênia">Armênia</option>
	<option value="Aruba">Aruba</option>
	<option value="Arábia Saudita">Arábia Saudita</option>
	<option value="Austrália">Austrália</option>
	<option value="Áustria">Áustria</option>
	<option value="Azerbaijão">Azerbaijão</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrein">Bahrein</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belize">Belize</option>
	<option value="Benim">Benim</option>
	<option value="Bermudas">Bermudas</option>
	<option value="Bielorrússia">Bielorrússia</option>
	<option value="Bolívia">Bolívia</option>
	<option value="Botswana">Botswana</option>
	<option value="Brunei">Brunei</option>
	<option value="Bulgária">Bulgária</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="Butão">Butão</option>
	<option value="Bélgica">Bélgica</option>
	<option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
	<option value="Cabo Verde">Cabo Verde</option>
	<option value="Camarões">Camarões</option>
	<option value="Camboja">Camboja</option>
	<option value="Canadá">Canadá</option>
	<option value="Catar">Catar</option>
	<option value="Cazaquistão">Cazaquistão</option>
	<option value="Chade">Chade</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Chipre">Chipre</option>
	<option value="Colômbia">Colômbia</option>
	<option value="Comores">Comores</option>
	<option value="Coreia do Norte">Coreia do Norte</option>
	<option value="Coreia do Sul">Coreia do Sul</option>
	<option value="Costa do Marfim">Costa do Marfim</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Croácia">Croácia</option>
	<option value="Cuba">Cuba</option>
	<option value="Dinamarca">Dinamarca</option>
	<option value="Djibouti">Djibouti</option>
	<option value="Dominica">Dominica</option>
	<option value="Egito">Egito</option>
	<option value="El Salvador">El Salvador</option>
	<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
	<option value="Equador">Equador</option>
	<option value="Eritreia">Eritreia</option>
	<option value="Escócia">Escócia</option>
	<option value="Eslováquia">Eslováquia</option>
	<option value="Eslovênia">Eslovênia</option>
	<option value="Espanha">Espanha</option>
	<option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
	<option value="Estados Unidos">Estados Unidos</option>
	<option value="Estônia">Estônia</option>
	<option value="Etiópia">Etiópia</option>
	<option value="Fiji">Fiji</option>
	<option value="Filipinas">Filipinas</option>
	<option value="Finlândia">Finlândia</option>
	<option value="França">França</option>
	<option value="Gabão">Gabão</option>
	<option value="Gana">Gana</option>
	<option value="Geórgia">Geórgia</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Granada">Granada</option>
	<option value="Gronelândia">Gronelândia</option>
	<option value="Grécia">Grécia</option>
	<option value="Guadalupe">Guadalupe</option>
	<option value="Guam">Guam</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernesei">Guernesei</option>
	<option value="Guiana">Guiana</option>
	<option value="Guiana Francesa">Guiana Francesa</option>
	<option value="Guiné">Guiné</option>
	<option value="Guiné Equatorial">Guiné Equatorial</option>
	<option value="Guiné-Bissau">Guiné-Bissau</option>
	<option value="Gâmbia">Gâmbia</option>
	<option value="Haiti">Haiti</option>
	<option value="Honduras">Honduras</option>
	<option value="Hong Kong">Hong Kong</option>
	<option value="Hungria">Hungria</option>
	<option value="Ilha Bouvet">Ilha Bouvet</option>
	<option value="Ilha de Man">Ilha de Man</option>
	<option value="Ilha do Natal">Ilha do Natal</option>
	<option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
	<option value="Ilha Norfolk">Ilha Norfolk</option>
	<option value="Ilhas Cayman">Ilhas Cayman</option>
	<option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
	<option value="Ilhas Cook">Ilhas Cook</option>
	<option value="Ilhas Feroé">Ilhas Feroé</option>
	<option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
	<option value="Ilhas Malvinas">Ilhas Malvinas</option>
	<option value="Ilhas Marshall">Ilhas Marshall</option>
	<option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
	<option value="Ilhas Salomão">Ilhas Salomão</option>
	<option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
	<option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
	<option value="Ilhas Åland">Ilhas Åland</option>
	<option value="Indonésia">Indonésia</option>
	<option value="Inglaterra">Inglaterra</option>
	<option value="Índia">Índia</option>
	<option value="Iraque">Iraque</option>
	<option value="Irlanda do Norte">Irlanda do Norte</option>
	<option value="Irlanda">Irlanda</option>
	<option value="Irã">Irã</option>
	<option value="Islândia">Islândia</option>
	<option value="Israel">Israel</option>
	<option value="Itália">Itália</option>
	<option value="Iêmen">Iêmen</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Japão">Japão</option>
	<option value="Jersey">Jersey</option>
	<option value="Jordânia">Jordânia</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Laos">Laos</option>
	<option value="Lesoto">Lesoto</option>
	<option value="Letônia">Letônia</option>
	<option value="Libéria">Libéria</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Lituânia">Lituânia</option>
	<option value="Luxemburgo">Luxemburgo</option>
	<option value="Líbano">Líbano</option>
	<option value="Líbia">Líbia</option>
	<option value="Macau">Macau</option>
	<option value="Macedônia">Macedônia</option>
	<option value="Madagáscar">Madagáscar</option>
	<option value="Malawi">Malawi</option>
	<option value="Maldivas">Maldivas</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Malásia">Malásia</option>
	<option value="Marianas Setentrionais">Marianas Setentrionais</option>
	<option value="Marrocos">Marrocos</option>
	<option value="Martinica">Martinica</option>
	<option value="Mauritânia">Mauritânia</option>
	<option value="Maurícia">Maurícia</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Moldávia">Moldávia</option>
	<option value="Mongólia">Mongólia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Moçambique">Moçambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="México">México</option>
	<option value="Mônaco">Mônaco</option>
	<option value="Namíbia">Namíbia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Nicarágua">Nicarágua</option>
	<option value="Nigéria">Nigéria</option>
	<option value="Niue">Niue</option>
	<option value="Noruega">Noruega</option>
	<option value="Nova Caledônia">Nova Caledônia</option>
	<option value="Nova Zelândia">Nova Zelândia</option>
	<option value="Níger">Níger</option>
	<option value="Omã">Omã</option>
	<option value="Palau">Palau</option>
	<option value="Palestina">Palestina</option>
	<option value="Panamá">Panamá</option>
	<option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
	<option value="Paquistão">Paquistão</option>
	<option value="Paraguai">Paraguai</option>
	<option value="País de Gales">País de Gales</option>
	<option value="Países Baixos">Países Baixos</option>
	<option value="Peru">Peru</option>
	<option value="Pitcairn">Pitcairn</option>
	<option value="Polinésia Francesa">Polinésia Francesa</option>
	<option value="Polônia">Polônia</option>
	<option value="Porto Rico">Porto Rico</option>
	<option value="Portugal">Portugal</option>
	<option value="Quirguistão">Quirguistão</option>
	<option value="Quênia">Quênia</option>
	<option value="Reino Unido">Reino Unido</option>
	<option value="República Centro-Africana">República Centro-Africana</option>
	<option value="República Checa">República Checa</option>
	<option value="República Democrática do Congo">República Democrática do Congo</option>
	<option value="República do Congo">República do Congo</option>
	<option value="República Dominicana">República Dominicana</option>
	<option value="Reunião">Reunião</option>
	<option value="Romênia">Romênia</option>
	<option value="Ruanda">Ruanda</option>
	<option value="Rússia">Rússia</option>
	<option value="Saara Ocidental">Saara Ocidental</option>
	<option value="Saint Martin">Saint Martin</option>
	<option value="Saint-Barthélemy">Saint-Barthélemy</option>
	<option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
	<option value="Samoa Americana">Samoa Americana</option>
	<option value="Samoa">Samoa</option>
	<option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
	<option value="Santa Lúcia">Santa Lúcia</option>
	<option value="Senegal">Senegal</option>
	<option value="Serra Leoa">Serra Leoa</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Singapura">Singapura</option>
	<option value="Somália">Somália</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="Suazilândia">Suazilândia</option>
	<option value="Sudão">Sudão</option>
	<option value="Suriname">Suriname</option>
	<option value="Suécia">Suécia</option>
	<option value="Suíça">Suíça</option>
	<option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
	<option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
	<option value="São Marino">São Marino</option>
	<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
	<option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
	<option value="Sérvia">Sérvia</option>
	<option value="Síria">Síria</option>
	<option value="Tadjiquistão">Tadjiquistão</option>
	<option value="Tailândia">Tailândia</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tanzânia">Tanzânia</option>
	<option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
	<option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
	<option value="Timor-Leste">Timor-Leste</option>
	<option value="Togo">Togo</option>
	<option value="Tonga">Tonga</option>
	<option value="Toquelau">Toquelau</option>
	<option value="Trinidad e Tobago">Trinidad e Tobago</option>
	<option value="Tunísia">Tunísia</option>
	<option value="Turcas e Caicos">Turcas e Caicos</option>
	<option value="Turquemenistão">Turquemenistão</option>
	<option value="Turquia">Turquia</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Ucrânia">Ucrânia</option>
	<option value="Uganda">Uganda</option>
	<option value="Uruguai">Uruguai</option>
	<option value="Uzbequistão">Uzbequistão</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Vaticano">Vaticano</option>
	<option value="Venezuela">Venezuela</option>
	<option value="Vietname">Vietname</option>
	<option value="Wallis e Futuna">Wallis e Futuna</option>
	<option value="Zimbabwe">Zimbabwe</option>
	<option value="Zâmbia">Zâmbia</option>
</select>
</div>

<div class="form-group col-md-4">
<label>Nacionalidade Aluno</label>
 <select  class="form-control" name="nacionalidadeAluno"  id="nacionalidadeAluno">
	<option value="Brasileira" selected="selected">Brasileira</option>
	<option value="Afeganistão">Afeganistão</option>
	<option value="África do Sul">África do Sul</option>
	<option value="Albânia">Albânia</option>
	<option value="Alemanha">Alemanha</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antilhas Holandesas">Antilhas Holandesas</option>
	<option value="Antárctida">Antárctida</option>
	<option value="Antígua e Barbuda">Antígua e Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Argélia">Argélia</option>
	<option value="Armênia">Armênia</option>
	<option value="Aruba">Aruba</option>
	<option value="Arábia Saudita">Arábia Saudita</option>
	<option value="Austrália">Austrália</option>
	<option value="Áustria">Áustria</option>
	<option value="Azerbaijão">Azerbaijão</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrein">Bahrein</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belize">Belize</option>
	<option value="Benim">Benim</option>
	<option value="Bermudas">Bermudas</option>
	<option value="Bielorrússia">Bielorrússia</option>
	<option value="Bolívia">Bolívia</option>
	<option value="Botswana">Botswana</option>
	<option value="Brunei">Brunei</option>
	<option value="Bulgária">Bulgária</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="Butão">Butão</option>
	<option value="Bélgica">Bélgica</option>
	<option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
	<option value="Cabo Verde">Cabo Verde</option>
	<option value="Camarões">Camarões</option>
	<option value="Camboja">Camboja</option>
	<option value="Canadá">Canadá</option>
	<option value="Catar">Catar</option>
	<option value="Cazaquistão">Cazaquistão</option>
	<option value="Chade">Chade</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Chipre">Chipre</option>
	<option value="Colômbia">Colômbia</option>
	<option value="Comores">Comores</option>
	<option value="Coreia do Norte">Coreia do Norte</option>
	<option value="Coreia do Sul">Coreia do Sul</option>
	<option value="Costa do Marfim">Costa do Marfim</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Croácia">Croácia</option>
	<option value="Cuba">Cuba</option>
	<option value="Dinamarca">Dinamarca</option>
	<option value="Djibouti">Djibouti</option>
	<option value="Dominica">Dominica</option>
	<option value="Egito">Egito</option>
	<option value="El Salvador">El Salvador</option>
	<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
	<option value="Equador">Equador</option>
	<option value="Eritreia">Eritreia</option>
	<option value="Escócia">Escócia</option>
	<option value="Eslováquia">Eslováquia</option>
	<option value="Eslovênia">Eslovênia</option>
	<option value="Espanha">Espanha</option>
	<option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
	<option value="Estados Unidos">Estados Unidos</option>
	<option value="Estônia">Estônia</option>
	<option value="Etiópia">Etiópia</option>
	<option value="Fiji">Fiji</option>
	<option value="Filipinas">Filipinas</option>
	<option value="Finlândia">Finlândia</option>
	<option value="França">França</option>
	<option value="Gabão">Gabão</option>
	<option value="Gana">Gana</option>
	<option value="Geórgia">Geórgia</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Granada">Granada</option>
	<option value="Gronelândia">Gronelândia</option>
	<option value="Grécia">Grécia</option>
	<option value="Guadalupe">Guadalupe</option>
	<option value="Guam">Guam</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernesei">Guernesei</option>
	<option value="Guiana">Guiana</option>
	<option value="Guiana Francesa">Guiana Francesa</option>
	<option value="Guiné">Guiné</option>
	<option value="Guiné Equatorial">Guiné Equatorial</option>
	<option value="Guiné-Bissau">Guiné-Bissau</option>
	<option value="Gâmbia">Gâmbia</option>
	<option value="Haiti">Haiti</option>
	<option value="Honduras">Honduras</option>
	<option value="Hong Kong">Hong Kong</option>
	<option value="Hungria">Hungria</option>
	<option value="Ilha Bouvet">Ilha Bouvet</option>
	<option value="Ilha de Man">Ilha de Man</option>
	<option value="Ilha do Natal">Ilha do Natal</option>
	<option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
	<option value="Ilha Norfolk">Ilha Norfolk</option>
	<option value="Ilhas Cayman">Ilhas Cayman</option>
	<option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
	<option value="Ilhas Cook">Ilhas Cook</option>
	<option value="Ilhas Feroé">Ilhas Feroé</option>
	<option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
	<option value="Ilhas Malvinas">Ilhas Malvinas</option>
	<option value="Ilhas Marshall">Ilhas Marshall</option>
	<option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
	<option value="Ilhas Salomão">Ilhas Salomão</option>
	<option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
	<option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
	<option value="Ilhas Åland">Ilhas Åland</option>
	<option value="Indonésia">Indonésia</option>
	<option value="Inglaterra">Inglaterra</option>
	<option value="Índia">Índia</option>
	<option value="Iraque">Iraque</option>
	<option value="Irlanda do Norte">Irlanda do Norte</option>
	<option value="Irlanda">Irlanda</option>
	<option value="Irã">Irã</option>
	<option value="Islândia">Islândia</option>
	<option value="Israel">Israel</option>
	<option value="Itália">Itália</option>
	<option value="Iêmen">Iêmen</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Japão">Japão</option>
	<option value="Jersey">Jersey</option>
	<option value="Jordânia">Jordânia</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Laos">Laos</option>
	<option value="Lesoto">Lesoto</option>
	<option value="Letônia">Letônia</option>
	<option value="Libéria">Libéria</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Lituânia">Lituânia</option>
	<option value="Luxemburgo">Luxemburgo</option>
	<option value="Líbano">Líbano</option>
	<option value="Líbia">Líbia</option>
	<option value="Macau">Macau</option>
	<option value="Macedônia">Macedônia</option>
	<option value="Madagáscar">Madagáscar</option>
	<option value="Malawi">Malawi</option>
	<option value="Maldivas">Maldivas</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Malásia">Malásia</option>
	<option value="Marianas Setentrionais">Marianas Setentrionais</option>
	<option value="Marrocos">Marrocos</option>
	<option value="Martinica">Martinica</option>
	<option value="Mauritânia">Mauritânia</option>
	<option value="Maurícia">Maurícia</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Moldávia">Moldávia</option>
	<option value="Mongólia">Mongólia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Moçambique">Moçambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="México">México</option>
	<option value="Mônaco">Mônaco</option>
	<option value="Namíbia">Namíbia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Nicarágua">Nicarágua</option>
	<option value="Nigéria">Nigéria</option>
	<option value="Niue">Niue</option>
	<option value="Noruega">Noruega</option>
	<option value="Nova Caledônia">Nova Caledônia</option>
	<option value="Nova Zelândia">Nova Zelândia</option>
	<option value="Níger">Níger</option>
	<option value="Omã">Omã</option>
	<option value="Palau">Palau</option>
	<option value="Palestina">Palestina</option>
	<option value="Panamá">Panamá</option>
	<option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
	<option value="Paquistão">Paquistão</option>
	<option value="Paraguai">Paraguai</option>
	<option value="País de Gales">País de Gales</option>
	<option value="Países Baixos">Países Baixos</option>
	<option value="Peru">Peru</option>
	<option value="Pitcairn">Pitcairn</option>
	<option value="Polinésia Francesa">Polinésia Francesa</option>
	<option value="Polônia">Polônia</option>
	<option value="Porto Rico">Porto Rico</option>
	<option value="Portugal">Portugal</option>
	<option value="Quirguistão">Quirguistão</option>
	<option value="Quênia">Quênia</option>
	<option value="Reino Unido">Reino Unido</option>
	<option value="República Centro-Africana">República Centro-Africana</option>
	<option value="República Checa">República Checa</option>
	<option value="República Democrática do Congo">República Democrática do Congo</option>
	<option value="República do Congo">República do Congo</option>
	<option value="República Dominicana">República Dominicana</option>
	<option value="Reunião">Reunião</option>
	<option value="Romênia">Romênia</option>
	<option value="Ruanda">Ruanda</option>
	<option value="Rússia">Rússia</option>
	<option value="Saara Ocidental">Saara Ocidental</option>
	<option value="Saint Martin">Saint Martin</option>
	<option value="Saint-Barthélemy">Saint-Barthélemy</option>
	<option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
	<option value="Samoa Americana">Samoa Americana</option>
	<option value="Samoa">Samoa</option>
	<option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
	<option value="Santa Lúcia">Santa Lúcia</option>
	<option value="Senegal">Senegal</option>
	<option value="Serra Leoa">Serra Leoa</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Singapura">Singapura</option>
	<option value="Somália">Somália</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="Suazilândia">Suazilândia</option>
	<option value="Sudão">Sudão</option>
	<option value="Suriname">Suriname</option>
	<option value="Suécia">Suécia</option>
	<option value="Suíça">Suíça</option>
	<option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
	<option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
	<option value="São Marino">São Marino</option>
	<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
	<option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
	<option value="Sérvia">Sérvia</option>
	<option value="Síria">Síria</option>
	<option value="Tadjiquistão">Tadjiquistão</option>
	<option value="Tailândia">Tailândia</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tanzânia">Tanzânia</option>
	<option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
	<option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
	<option value="Timor-Leste">Timor-Leste</option>
	<option value="Togo">Togo</option>
	<option value="Tonga">Tonga</option>
	<option value="Toquelau">Toquelau</option>
	<option value="Trinidad e Tobago">Trinidad e Tobago</option>
	<option value="Tunísia">Tunísia</option>
	<option value="Turcas e Caicos">Turcas e Caicos</option>
	<option value="Turquemenistão">Turquemenistão</option>
	<option value="Turquia">Turquia</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Ucrânia">Ucrânia</option>
	<option value="Uganda">Uganda</option>
	<option value="Uruguai">Uruguai</option>
	<option value="Uzbequistão">Uzbequistão</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Vaticano">Vaticano</option>
	<option value="Venezuela">Venezuela</option>
	<option value="Vietname">Vietname</option>
	<option value="Wallis e Futuna">Wallis e Futuna</option>
	<option value="Zimbabwe">Zimbabwe</option>
	<option value="Zâmbia">Zâmbia</option>
</select>
</div>
</div>

<center>   <h3>Endereço</h3> </center>

<div class="row">
<div class="form-group col-md-6">
	<label>CEP</label>
	  <input type="text" class="form-control" id="cep" name="cep" required="required" onkeyup="mascara('##.###-###',this,event,true)">
  </div>

<div class="form-group col-md-6">
<label>Endereço Residencial</label>
<input class="form-control"  maxlength="100" name="enderecoResidencial" id="rua"required="required" type="text">
</div>

<div class="form-group col-md-4">
<label>Bairro</label>
<input class="form-control"  maxlength="60" name="bairro" id="bairro" required="required" type="text">
</div>

<div class="form-group col-md-4">
<label>Número</label>
<input class="form-control"  maxlength="10" name="numeroEndereco"  required="required" type="text">
</div>


<div class="form-group col-md-4">
<label>Telefone</label>
<input class="form-control"  maxlength="100" name="telefoneContato" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
</div>


</div>


<center>   <h3>Dados para matrícula</h3> </center>        

<div class="row">

<div class="form-group col-md-4">
<label>Data da Matrícula</label>
<input class="form-control"   name="dtMatricula" required="required" type="text" onkeyup="mascara('##/##/####',this,event,true)" >
</div>

<div class="form-group col-md-4">
<label for="">Nome escola</label>
	<select class="form-control"  name="escola" required="required"  >

	<option>Selecione a Escola</option>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } ?>  

</select>
	  </div>

<div class="form-group col-md-4">
  <label>Turno</label>
	<Select class="form-control"  name="turnoEscola" maxlength="20" required="required" type="">
	  <option >Selecione</option>
	<option value="Matutino">Matutino</option>
	  <option value="Vespertino">Vespertino</option>
	  <option value="Noturno">Noturno</option>
	  <option value="Integral">Integral</option>
</select>
</div>


<div class="form-group col-md-4">
  <label>Ano Escola</label>
	<Select class="form-control"  name="anoEscola" maxlength="20" required="required" type="">
	  <option >Selecione</option>
	  <option value="1 Ano Fundamental">1° Ano Fundamental</option>
	  <option value="2 Ano Fundamental">2° Ano Fundamental</option>
	  <option value="3 Ano Fundamental">3° Ano Fundamental</option>
	  <option value="4 Ano Fundamental">4° Ano Fundamental</option>
	  <option value="5 Ano Fundamental">5° Ano Fundamental</option>
	  <option value="6 Ano Fundamental">6° Ano Fundamental</option>
	  <option value="7 Ano Fundamental">7° Ano Fundamental</option>
	  <option value="8 Ano Fundamental">8° Ano Fundamental</option>
	  <option value="9 Ano Fundamental">9° Ano Fundamental</option>
	  <option value="1 Colegial do Ensino Médio">1° Colegial Ensino Médio</option>
	  <option value="2 Colegial do Ensino Médio">2° Colegial Ensino Médio</option>
	  <option value="3 Colegial do Ensino Médio">3° Colegial Ensino Médio</option>
</select>
</div>
<div class="form-group col-md-4">
<label>Turma Escola</label>
<input class="form-control"  maxlength="100" name="turmaEscola" required="required" type="text" >
</div>


<div class="form-group col-md-4">
<label for="">Polo do Aluno</label>
	<select class="form-control"  name="idPolo" required="required"  >

	<option>Selecione o Polo</option>
<?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>

<option value="<?php echo $rows_Polo['idPolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>

<?php } ?>  

</select>
	  </div>

</div>



            </section>

          

        <h3>Ficha Médica</h3>
            <section>

            <center>   <h3>Ficha Médica</h3> </center>

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

      

        
        <h3>Documentos digitalizados</h3>
            <section>

            <center>   <h5>Documentos</h5> </center>

            <div class="row">
			<div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
				  <tr>
                      <th>Descrição</th>
                    <th>Documentos</th>
                    </tr>
                  </thead>
					  <tr>
		<td>	<div class="form-group">
  
                <select class="form-control"  name="desArquivo1"  >
        
                <option>Nenhum Documento</option>
  <?php while($rows_documento = mysqli_fetch_assoc($resultado_documentos)){ ?>

<option value="<?php echo $rows_documento['nomeDocumento'];?>"><?php echo ($rows_documento['nomeDocumento']);?></option>

<?php } ?>  

</select>
                  </div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="rgalunodigi" >
			  </div></td> 
			  
  </tr>

  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo2"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento2 = mysqli_fetch_assoc($resultado_documentos2)){ ?>

<option value="<?php echo $rows_documento2['nomeDocumento'];?>"><?php echo ($rows_documento2['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="cpfalunodigi" >
			  </div></td> 
			  
  </tr>

  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo3"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento3 = mysqli_fetch_assoc($resultado_documentos3)){ ?>

<option value="<?php echo $rows_documento3['nomeDocumento'];?>"><?php echo ($rows_documento3['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="cpfrespdigi" >
			  </div></td> 
			  
  </tr>

  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo4"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento4 = mysqli_fetch_assoc($resultado_documentos4)){ ?>

<option value="<?php echo $rows_documento4['nomeDocumento'];?>"><?php echo ($rows_documento4['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="cpfresp2digi" >
			  </div></td> 
			  
  </tr>

  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo5"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento5 = mysqli_fetch_assoc($resultado_documentos5)){ ?>

<option value="<?php echo $rows_documento5['nomeDocumento'];?>"><?php echo ($rows_documento5['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="rgrespdigi" >
			  </div></td> 
			  
  </tr>

  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo6"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento6 = mysqli_fetch_assoc($resultado_documentos6)){ ?>

<option value="<?php echo $rows_documento6['nomeDocumento'];?>"><?php echo ($rows_documento6['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="rgresp2digi" >
			  </div></td> 
			  
  </tr>


  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo7"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento7 = mysqli_fetch_assoc($resultado_documentos7)){ ?>

<option value="<?php echo $rows_documento7['nomeDocumento'];?>"><?php echo ($rows_documento7['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="comprovanteresidigi" >
			  </div></td> 
			  
  </tr>


  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo8"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento8 = mysqli_fetch_assoc($resultado_documentos8)){ ?>

<option value="<?php echo $rows_documento8['nomeDocumento'];?>"><?php echo ($rows_documento8['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="atestadoescolardigi" >
			  </div></td> 
			  
  </tr>


  <tr>
		<td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo9"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento9 = mysqli_fetch_assoc($resultado_documentos9)){ ?>

<option value="<?php echo $rows_documento9['nomeDocumento'];?>"><?php echo ($rows_documento9['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="fotoAluno" >
			  </div></td> 
			  
  </tr>


  <td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo10"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento10 = mysqli_fetch_assoc($resultado_documentos10)){ ?>

<option value="<?php echo $rows_documento10['nomeDocumento'];?>"><?php echo ($rows_documento10['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="arquivo10" >
			  </div></td> 
			  
  </tr>


  <td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo11"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento11 = mysqli_fetch_assoc($resultado_documentos11)){ ?>

<option value="<?php echo $rows_documento11['nomeDocumento'];?>"><?php echo ($rows_documento11['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="arquivo11" >
			  </div></td> 
			  
  </tr>


  <td>	<div class="form-group">
  
  <select class="form-control"  name="desArquivo12"  >

  <option>Nenhum Documento</option>
<?php while($rows_documento12 = mysqli_fetch_assoc($resultado_documentos12)){ ?>

<option value="<?php echo $rows_documento12['nomeDocumento'];?>"><?php echo ($rows_documento12['nomeDocumento']);?></option>

<?php } ?>  

</select>
	</div></td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="arquivo12" >
			  </div></td> 
			  
  </tr>

  <tr>
  <td>
  ___________________________
  </td>

  <td>
  ________________________________________________
  </td>
  
  </tr>

  <tr>
		<td><h3>Inserir Foto Aluno: </h3>	</td>
         <td>  <div class="form-group ">
                
                  <input type="file" class="form-control"  name="outro" >
			  </div></td> 
			  
  </tr>
		
  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


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


							    <form action="envio_cadastrar_composicao.php" method="POST" enctype="multipart/form-data">
								<label for="">CPF do Aluno</label>
                  <input type="text"  name="cpfAluno_composicao" class="form-control" onkeyup="mascara('###.###.###-##',this,event,true)" value=" <?php echo $linha['cpfAluno_composicao']; ?>" >
				  
<label for="">Nome integrante</label>
                  <input type="text"  name="nomeIntegrante" class="form-control" >

				  <label for="">Renda</label>
                  <input type="text"  name="renda" class="form-control" maxlength="5" >
                  
				  <label for="">Idade</label>
                  <input type="number"  name="idade" class="form-control"   >
                  
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