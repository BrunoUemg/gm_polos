
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
where  C.status = 0  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);

$res = $con-> query($result_consultaComposicao);
$linha = $res->fetch_assoc();




?>



<!DOCTYPE html>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>

a{
   text-decoration: none;
	   
}
</style>
    <form id="cad_projeto" method="post" action="envio_cadastro_aluno.php" enctype="multipart/form-data">
        <div>



	




            <h3>Informações Pessoais</h3>
            <section>

         <center>   <h3>Informações Pessoais</h3> </center>

            <div class="row">

              <div class="form-group col-md-8">
              <label>Nome Completo </label>
              <input class="form-control" maxlength="100" name="nomeAluno"  required="required" type="text">
              <input class="form-control" maxlength="100" hidden name="cadastrar_aluno"  required="required" value="1" type="text">
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
                <input class="form-control"  name="cpfAluno" maxlength="15"  required="required" type="text" onkeyup="mascara('###.###.###-##',this,event,true)" value="<?php echo $linha['cpfIntegrante_composicao']; ?>">
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
<label for="">PROJOC do Aluno</label>
	<select class="form-control"  name="idPolo" required="required"  >

	<option>Selecione o PROJOC</option>
<?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>

<option value="<?php echo $rows_Polo['idPolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>

<?php } ?>  

</select>
	  </div>
	  <div class="form-group col-md-4">
<label>Graduação do GM</label>
<select name="graduacao" class="form-control" id="">
<option value="">Selecione</option>
<option value="Guarda-Mirim de 1° Classe - GM 1° Cl">Guarda-Mirim de 1° Classe - GM 1° Cl</option>
<option value="Guarda-Mirim de 2° Classe - GM 2° Cl">Guarda-Mirim de 2° Classe - GM 2° Cl</option>
<option value="Taifero - Taf GM">Taifero - Taf GM</option>
<option value="Monitor - Mon GM">Monitor - Mon GM</option>
<option value="Sub-Inspetor - Sub-Insp">Sub-Inspetor - Sub-Insp</option>
<option value="Guarda-Mirim-A-Oficial">Guarda-Mirim-A-Oficial</option>
<option value="Inspetor - Insp GM">Inspetor - Insp GM</option>
<option value="Inspetor-Capitão - Insp-Cap GM">Inspetor-Capitão - Insp-Cap GM</option>
<option value="Sub-Oficial">Sub-Oficial</option>
<option value="Oficial - OF GM">Oficial - OF GM</option>
</select>
</div>

<div class="form-group col-md-4">
<label for="">Data início graduação</label>
<input type="date" name="dataInicioGraduacao" class="form-control" id="">

</div>

</div>



            </section>

          

       
      

        
        <h3>Documentos digitalizados</h3>
		<section>

<center>   <h2>Documentos</h2> </center>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
</div>
<div class="card-body">
  <div class="table-responsive">
	<table id="basic-datatables2" class="display table table-striped table-hover">
	  <thead>
	  <tr>
		  <th>Descrição</th>
		<th>Inserir</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php while($rows_documentos = mysqli_fetch_assoc($resultado_documentos)){ 
		 if($rows_documentos['obrigatorio'] == 'Sim'){
		  ?>
		  
		  <tr>
		  <td><label for=""><?php echo $rows_documentos['nomeDocumento']; ?></label></td>
		  <td><input type="file" name="<?php echo $rows_documentos['variavelDocumento']; ?>" class="form-control" required="required" id="">
		  </td>
			</tr>
			<?php } else { ?>
			<tr><td><label for=""><?php echo $rows_documentos['nomeDocumento']; ?></label></td>
			<td><input type="file" name="<?php echo $rows_documentos['variavelDocumento']; ?>" class="form-control"  id=""></td>
			</tr>
<?php } }?>


</tbody>
	</table>
  </div>
</div>
</div>
</div>


</div>

<div class="row">



<div class="form-group col-md-8 ">
<label for="">Inserir foto</label>   
<input type="file" class="form-control"  name="outro" >
</div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="progress">
		<div class="progress-bar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
	</div>
<div class="modal fade" id="carregar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Por favor aguarde carregamento...</h5>
        
      </div>
      <div class="modal-body">
	  <div class="progress">
		<div class="progress-bar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
	</div>
      </div>
      <div class="modal-footer">
       
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


							    <form action="cadastrar_alunos.php" method="POST" >
								<label for="">CPF do Integrante</label>
                  <input type="text"  name="cpfIntegrante_composicao" class="form-control" onkeyup="mascara('###.###.###-##',this,event,true)"  >
				  
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

	<script>
			$(document).on('submit', 'form', function (e) {
				e.preventDefault();
				//Receber os dados
				$form = $(this);				
				var formdata = new FormData($form[0]);
				
				//Criar a conexao com o servidor
				var request = new XMLHttpRequest();
				
				//Progresso do Upload
				$('#carregar').modal('show');
				request.upload.addEventListener('progress', function (e) {
					var percent = Math.round(e.loaded / e.total * 100);
					$form.find('.progress-bar').width(percent + '%').html(percent + '%');
				});
				
				//Upload completo limpar a barra de progresso
				request.addEventListener('load', function(e){
					$form.find('.progress-bar').addClass('progress-bar-success').html('upload completo...');
					//Atualizar a página após o upload completo
					setTimeout("window.open(self.location, '_self');", 1000);
				});
				
				//Arquivo responsável em fazer o upload da imagem
				request.open('post', 'envio_cadastro_aluno.php');
				request.send(formdata);
			});
		</script>

	<style>
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif') 50% 40% no-repeat transparent;
		border-color: transparent;
	}
</style>
<div id="loader" class="loader"></div>
<script>
	window.onload = function(){
		$(".loader").fadeOut("slow");
	};
</script>




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