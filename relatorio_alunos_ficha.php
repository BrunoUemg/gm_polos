<?php
include_once "header.php";

include_once "dao/conexao.php";


 $percapita = $_POST["percapita"];
 $semDocumento = $_POST["semDocumento"];
 $gestante = $_POST["gestante"];
 $relatorioAlunos = $_POST["relatorioAlunos"];
 $rendaTotal = $_POST["rendaTotal"];
 $dependenteQuimico = $_POST["dependenteQuimico"];
 $idioma = $_POST["idioma"];
$informatica = $_POST["informatica"];
 $rendaBruta = $_POST["rendaBruta"];
 $quartosBanheiros = $_POST["quartosBanheiros"];


$result_consultaAluno = "SELECT A.idAluno,
A.nomeAluno,
A.dtNascimento,
A.nomePai,
A.profissaoPai,
A.nomeMae,
A.profissaoMae,
A.sexo,
A.enderecoResidencial,
A.bairro,
A.numeroEndereco,
A.telefoneContato,
A.escola,
A.anoEscola,
A.turmaEscola,
A.turnoEscola,
A.status,
A.dataDesligamento,
A.nacionalidadeAluno,
A.nacionalidadeResponsavel,
A.rgAluno,
A.cpfAluno,
A.rgResponsavel,
A.cpfResponsavel,
A.dtMatricula,
A.tipoSanguineo,
A.fatorRh,
A.altura,
A.peso,
A.equipamentosAuxilio,
A.permicao,
A.emergenciasMedicas,
A.avisarEmergencia,
A.telefoneEmergencia,
A.medContinuos,
A.alergia,
A.planoMedico,
A.numCarteira,
A.nadar,
A.sonambulo,
A.cardiaco,
A.restricoesAlimentos,
A.impedimentoFisico,
A.distubioComportamento,
A.disturbioAlimentar,
A.disturbioAnsiedade,
A.deficiencia,
A.rgalunodigi,
A.cpfalunodigi,
A.cpfrespdigi,
A.cpfresp2digi,
A.rgrespdigi,
A.rgresp2digi,
A.comprovanteresidigi,
A.atestadoescolardigi,
A.outro,
A.fotoAluno,
A.desArquivo1,
P.idPolo,
P.nomePolo

from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1  ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);

$result_Escola ="SELECT * FROM escola ";
$resultado_Escola= mysqli_query($con, $result_Escola);

$result_Polo ="SELECT * FROM polo ";
$resultado_Polo= mysqli_query($con, $result_Polo);


// consultas da Ficha social
$result_consultaGastos = "SELECT F.idAluno, A.idAluno, A.nomeAluno, P.idPolo, P.nomePolo,F.status, F.valorResidencia,F.valorAgua,F.valorEnergia,F.gastosMedicamentosValor,F.valorEscola,F.valorIdioma,F.valorInformatica,F.valorAlimentacao, SUM(F.valorResidencia)+SUM(F.valorAgua)+ 
SUM(F.valorEnergia)+SUM(F.gastosMedicamentosValor)+SUM(F.valorEscola)+SUM(F.valorIdioma)+ SUM(F.valorInformatica)+ SUM(F.valorAlimentacao) AS gastosTotais 
from ficha_social F, aluno A, polo P where F.status = '$relatorioAlunos' and F.idAluno = A.idAluno and A.idPolo = P.idPolo GROUP BY F.idAluno ORDER BY gastosTotais ";
$resultado_consultaGastos = mysqli_query($con, $result_consultaGastos);

$result_consultaDocumento = "SELECT  A.nomeAluno, F.idAluno, A.idAluno, F.semDocumento, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.semDocumento = '$semDocumento'   and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaDocumento = mysqli_query($con, $result_consultaDocumento);

$result_consultaPercapita = "SELECT F.percapita, A.nomeAluno, F.idAluno, A.idAluno, F.semDocumento, F.status, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.status = '$percapita'   and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaPercapita = mysqli_query($con, $result_consultaPercapita);

$result_consultagestante = "SELECT F.percapita, A.nomeAluno, F.idAluno, A.idAluno, F.semDocumento, F.gestante,F.parentescoGestante, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.gestante = '$gestante'   and A.idAluno = F.idAluno and A.idPolo = P.idPolo ORDER BY percapita ";
$resultado_consultagestante = mysqli_query($con, $result_consultagestante);


$result_consultaLiquida = "SELECT F.percapita, A.nomeAluno, F.idAluno, A.idAluno, F.semDocumento, F.rendaTotal,F.status,F.parentescoGestante, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.status = '$rendaTotal'   and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaLiquida = mysqli_query($con, $result_consultaLiquida);


$result_consultaDependente = "SELECT F.percapita, A.nomeAluno, F.idAluno, A.idAluno, F.semDocumento, F.dependenteQuimico,F.nomeDependenteQui,F.status,F.parentescoGestante, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.dependenteQuimico = '$dependenteQuimico'   and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaDependente = mysqli_query($con, $result_consultaDependente);

$result_consultaIdioma = "SELECT  A.nomeAluno, F.idAluno, A.idAluno, F.valorIdioma, F.status, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.status = '$idioma' and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaIdioma = mysqli_query($con, $result_consultaIdioma);


$result_consultaRendaBruta = "SELECT C.renda,A.idAluno,C.idAluno,C.status,A.nomeAluno, SUM(renda) AS rendaSom from composicao_familiar C, aluno A 
where C.idAluno = A.idAluno and C.status = '$rendaBruta' GROUP BY C.idAluno  ";
$resultado_consultaRendaBruta = mysqli_query($con, $result_consultaRendaBruta);


$result_consultaInformatica = "SELECT  A.nomeAluno, F.idAluno, A.idAluno, F.valorInformatica, F.status, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.status = '$informatica' and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaInformatica = mysqli_query($con, $result_consultaInformatica);

$result_consultaQuartosBanheiros = "SELECT  A.nomeAluno, F.idAluno, A.idAluno, F.numQuartos, F.numBanheiros, F.status, P.nomePolo, P.idPolo, A.idPolo 
FROM ficha_social F, aluno A, polo P 
WHERE F.status = '$quartosBanheiros' and A.idAluno = F.idAluno and A.idPolo = P.idPolo  ";
$resultado_consultaQuartosBanheiros = mysqli_query($con, $result_consultaQuartosBanheiros);

//--------------------------------------------------Fim------------------
?>
<?php 
if(mysqli_num_rows($resultado_consultaPercapita) > 0){
  echo '
  
<div class="main-panel">

  <div class="content">
  
    <div class="page-inner">
    <div class="row">
    
    
            
            </div>
           
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social:</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>

  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Renda per capita</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaPercapita)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['percapita']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
       
      </div>
     
    </div>
  </div> ';}?>
  



<?php 
if(mysqli_num_rows($resultado_consultagestante) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>

<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>


<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>


  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Gestante na família</th>
                      <th>Parentesco Gestante</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultagestante)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['gestante']; ?></td>
                        <td><?php echo $rows_consultaAluno['parentescoGestante']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 



<?php 
if(mysqli_num_rows($resultado_consultaDocumento) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>


<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>
<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>


<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>


  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Sem documento na família</th>
                   
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaDocumento)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['semDocumento']; ?></td>
                        
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 

<?php 
if(mysqli_num_rows($resultado_consultaGastos) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
     
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>


<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>
<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>


<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>


</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>



  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Gastos Totais</th>
                   
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaGastos)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td>R$ <?php echo $rows_consultaAluno['gastosTotais']; ?></td>
                        
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 


<?php 
if(mysqli_num_rows($resultado_consultaLiquida) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>
<div id="div6">

<label for="">Idioma</label>
<select name="idioma" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Relção de Curso de Idioma</option>

</select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>

  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Renda Líquida</th>
                   
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaLiquida)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td>R$ <?php echo $rows_consultaAluno['rendaTotal']; ?></td>
                        
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 





<?php 
if(mysqli_num_rows($resultado_consultaDependente) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>
<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>


<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>


  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Dependente Quimico</th>
                      <th>Nome do Dependente Quimico</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaDependente)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['dependenteQuimico']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomeDependenteQui']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 



<?php 
if(mysqli_num_rows($resultado_consultaIdioma) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social:</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>


<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>

  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Valor Idioma</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaIdioma)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['valorIdioma']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 



<?php 
if(mysqli_num_rows($resultado_consultaRendaBruta) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
        
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>

<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>


<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>


<div id="div7">

<label for="">Renda Bruta</label>
  <select name="rendaBruta" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Pesquisar</option>
  
  </select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>


  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>

 
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Renda Bruta</th>
                  
                   
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaRendaBruta)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['rendaSom']; ?></td>
                        

                        
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 


<?php 
if(mysqli_num_rows($resultado_consultaInformatica) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
          
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social:</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>
<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>

  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Valor curso Informática</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaInformatica)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['valorInformatica']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 



<?php 
if(mysqli_num_rows($resultado_consultaQuartosBanheiros) > 0){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
 
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
 
  
</div>

<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>


<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação de curso de Idioma</option>
  
  </select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           </div>
          
            </div>
            </form>
  </td>


  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="polo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['nomePolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
<select class="form-control"  name="escola" required="required"  >

  <option>Selecione a Escola</option>
  ';?>
<?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>

<option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>

<?php } echo '

</select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
<option value="">Selecione o mês do anivesariante</option>
<option value="01">Janeiro</option>
<option value="02">Fevereiro</option>
<option value="03">Março</option>
<option value="04">Abril</option>
<option value="05">Maio</option>
<option value="06">Junho</option>
<option value="07">Julho</option>
<option value="08">Agosto</option>
<option value="09">Setembro</option>
<option value="10">Outubro</option>
<option value="11">Novembro</option>
<option value="12">Dezembro</option>


</select>
  
  
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>


  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Número de quartos</th>
                      <th>Número de banheiros</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaQuartosBanheiros)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['numQuartos']; ?></td>
                        <td><?php echo $rows_consultaAluno['numBanheiros']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                    

                         


                      

                        
                      </tr>
                    <?php } echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 



<?php 


//tabela de nenhum dado encontrado
if(mysqli_num_rows($resultado_consultaDependente) < 1 && mysqli_num_rows($resultado_consultaDocumento) < 1 && mysqli_num_rows($resultado_consultaGastos) < 1 &&
mysqli_num_rows($resultado_consultagestante) < 1 && mysqli_num_rows($resultado_consultaLiquida) < 1 && mysqli_num_rows($resultado_consultaPercapita) < 1 && mysqli_num_rows($resultado_consultaIdioma) < 1 &&
mysqli_num_rows($resultado_consultaRendaBruta) < 1 && mysqli_num_rows($resultado_consultaInformatica) < 1 && mysqli_num_rows($resultado_consultaQuartosBanheiros) < 1){
  echo '
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
    <div class="row">
    

            
            </div>
      <div class="page-header">
     
        <h4 class="page-title">Consultar Alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           
          <br>  
          <br>
          <table class="display table table-striped table-hover" >
          <thead>
          <th>Filtro de Ficha Social</th>
          <th>Filtro de ficha do Aluno</th>
         
          </thead>
  <tr>
  <td>
  <form action="relatorio_alunos_ficha.php" method="post">
          <div class="form-group col-md-8">
          <label for="">Tipo de filtragem em ficha social:</label>
          <select class="form-control" name="relatorioAlunos" id="select4"> 
          <option value="">Selecione</option>
          <option value="div1">Integrante Sem documento</option>
          <option value="div2">Renda per capita</option>
          <option value="div3">Gestante</option>
          <option value="1">Gastos Totais</option>
          <option value="div4">Renda Líquida</option>
          <option value="div5">Dependente químico</option>
          <option value="div7">Renda bruta</option>
          <option value="div6">Idioma</option>
          <option value="div8">Informática</option>
          <option value="div9">Relação de banheiros e quartos</option>
          </select>
 

<div id="pai">
<div id="div1">

<label for="">Integrantes sem documento</label>
<select name="semDocumento" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem integrante sem documento</option>
<option value="Não">Alunos que não possuem integrante sem documento</option>
</select>
  

</div>

<div id="div2">

<label for="">Valor renda per capita</label>
<select name="percapita" class="form-control" id="">
<option value="2">Selecione</option>
<option value="1">Posssui</option>
</select>
 
  
</div>

<div id="div3">

<select name="gestante" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Alunos que possuem</option>
<option value="Não">Alunos que não possuem</option>
</select>
 
  
</div>
<div id="div4">


<select name="rendaTotal"  class="form-control" >
<option value="">Selecione</option>
<option value="1">Sim</option>

</select>

 
  
</div>

<div id="div5">

<label for="">Dependente químico</label>
<select name="dependenteQuimico" class="form-control" >
<option value="">Selecione</option>
<option value="Sim">Posssui</option>
<option value="Não">Não Possui</option>
</select>

 
  
</div>

<div id="div6">

<label for="">Idioma</label>
<select name="idioma" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Relção de Curso de Idioma</option>

</select>

 
  
</div>

<div id="div7">

<label for="">Renda Bruta</label>
<select name="rendaBruta" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div8">

<label for="">Informática</label>
<select name="informatica" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

<div id="div9">

<label for="">Relação de banheiros e quartos</label>
<select name="quartosBanheiros" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>

 
  
</div>

</div>






         
           <br>
           <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
           <input type="button" class="btn btn-danger" onClick="window.location.href="relatorio_alunos.php"  value="voltar">
           </div>
          
            </div>
            </form>
  </td>

  <td>

  <form action="relatorio_alunos_cadastrados.php" method="post">
            <div class="form-group col-md-8">
            <label for="">Tipo de filtragem</label>
            <select class="form-control" name="relatorioAlunos" id="select5"> 
    <option value="">Selecione</option>
    <option value="div1">Bairros</option>
    <option value="div2">Polo</option>
    <option value="div3">Escola</option>
    <option value="div4">Aniversariante do mês</option>
    <option value="div5">Dados responsável/eis</option>
    <option value="div6">Ficha médica do aluno</option>
    </select>
   
  
  <div id="pai2">
  <div id="div1">
  
  <label for="">Bairro</label>
  <input class="form-control"  maxlength="100" name="bairro"  type="text" placeholder="Text" >
   
    
  
  </div>
  
  <div id="div2">
  
  <label for="">Nome Polo</label>
  <select class="form-control"  name="idPolo" required="required"  >
  
    <option>Selecione o Polo</option>
    ';?>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>
  
  <option value="<?php echo $rows_Polo['idPolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>
  
  <?php } echo ' ?>  
  
  </select>
   
    
  </div>
  
  <div id="div3">
  
  <label for="">Nome Escola</label>
  <select class="form-control"  name="escola" required="required"  >
  
    <option>Selecione a Escola</option>
    ';?>
  <?php while($rows_Escola = mysqli_fetch_assoc($resultado_Escola)){ ?>
  
  <option value="<?php echo $rows_Escola['nomeEscola'];?>"><?php echo ($rows_Escola['nomeEscola']);?></option>
  
  <?php } echo '
  
  </select>
  
   
    
  </div>
  
  
  <div id="div4">
  
  
  <select name="aniversario"  class="form-control" >
  <option value="">Selecione o mês do anivesariante</option>
  <option value="01">Janeiro</option>
  <option value="02">Fevereiro</option>
  <option value="03">Março</option>
  <option value="04">Abril</option>
  <option value="05">Maio</option>
  <option value="06">Junho</option>
  <option value="07">Julho</option>
  <option value="08">Agosto</option>
  <option value="09">Setembro</option>
  <option value="10">Outubro</option>
  <option value="11">Novembro</option>
  <option value="12">Dezembro</option>
  
  
  </select>
  
   
    
  </div>
  
  
  <div id="div5">
  
  <label for="">Dados responsavel</label>
<select name="responsavel" class="form-control" >
<option value="2">Selecione</option>
<option value="1">Pesquisar</option>

</select>
  
   
    
  </div>
  
  <div id="div6">
  
  <label for="">Médica</label>
  <select name="medica" class="form-control" >
  <option value="2">Selecione</option>
  <option value="1">Relação emergência médica</option>
  
  </select>
  
  </div>
  
  
  </div>
  
  
  
  
  
  
           
             <br>
             <input type="submit" name="enviar" class="btn btn-success" value="Buscar">
             </div>
            
              </div>
              </form>
  
  </td>



  </tr>
         
            </table>
            
            <div class="card-body">
           
              <div class="table-responsive"  class="form-control" >
              
             
                <table id="basic" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                <th>Nenhum dado a ser exibido</th>
                    
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                  
                    
                      <tr>
                      
                      <td>.</td>
                    
                      <td>Nada encontrado</td>
                         
                      <td>.</td>

                      

                        
                      </tr>
                    <?php  echo '
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> ';}?> 

















  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="js/states.js"></script>
  <script src="js/mascaras.js"></script>

  <footer class="footer">
	<div class="container-fluid">
		<div class="copyright ml-auto">
			&copy; Copyrights 2020 by <strong>NUSPI</strong>
		</div>
	</div>
</footer>
</div>
<style>
#pai div{
	display:  none;
}


</style>

<Script>

$(document).ready(function(){

	$('#select4').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai').children('div').hide();
		$('#pai').children(selectValor).show();
  
	});
});

</Script>

<style>
#pai2 div{
	display:  none;
}


</style>

<Script>

$(document).ready(function(){

	$('#select5').on('change',function(){

		var selectValor = '#'+$(this).val();
		$('#pai2').children('div').hide();
		$('#pai2').children(selectValor).show();
  
	});
});

</Script>

<!--   Core JS Files   -->
<script src="js/core/jquery.3.2.1.min.js"></script>
<script src="js/core/popper.min.js"></script>
<script src="js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="jquery/jquery-ui-1.9.2.custom.min.js"></script>
<script src="jquery/jquery.ui.touch-punch.min.js"></script>
<script src="js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="jquery/jquery.dcjqaccordion.2.7.js"></script>
<script src="jquery/jquery.scrollTo.min.js"></script>
<script src="jquery/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jQuery Scrollbar -->
<script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

<script>
           $(document).ready(function() {
    $('#basic').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'pdf',{
            extend: 'print',
            text: 'Imprimir',
            key: {
                key: 'p',
                altkey: true
            }
        }],"language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
    } );
} );
  </script>
<!-- Atlantis JS -->
<script src="js/atlantis.min.js"></script>


</body>

</html>


  