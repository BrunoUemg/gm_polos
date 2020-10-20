<?php
include_once "header.php";

include_once "dao/conexao.php";


 $bairro = $_POST["bairro"];
 $polo = $_POST["polo"];
 $escola = $_POST["escola"];
$aniversario = $_POST["aniversario"];
$responsavel = $_POST["responsavel"];
 $medica = $_POST["medica"];

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


$result_consultaBairro = "SELECT A.nomeAluno, A.idAluno, A.bairro,A.status, P.nomePolo, P.idPolo, A.idPolo 
FROM  aluno A, polo P 
WHERE  A.bairro = '$bairro'  and A.idPolo = P.idPolo  ";
$resultado_consultaBairro = mysqli_query($con, $result_consultaBairro);


$result_consultaPolo = "SELECT A.nomeAluno, A.idAluno, A.bairro,A.status, P.nomePolo, P.idPolo, A.idPolo 
FROM  aluno A, polo P 
WHERE  P.nomePolo = '$polo'  and A.idPolo = P.idPolo  ";
$resultado_consultaPolo = mysqli_query($con, $result_consultaPolo);


$result_consultaEscola = "SELECT A.nomeAluno, A.idAluno,A.dtNascimento, A.escola,A.turmaEscola, A.turnoEscola, A.anoEscola,A.status, P.nomePolo, P.idPolo, A.idPolo 
FROM  aluno A, polo P 
WHERE  A.escola = '$escola'  and A.idPolo = P.idPolo  ";
$resultado_consultaEscola = mysqli_query($con, $result_consultaEscola);

$result_consultaResponsavel = "SELECT A.nomeAluno, A.idAluno,A.cpfResponsavel, A.rgResponsavel, A.anoEscola,A.status, P.nomePolo, P.idPolo, A.idPolo 
FROM  aluno A, polo P 
WHERE  A.status = '$responsavel'  and A.idPolo = P.idPolo  ";
$resultado_consultaResponsavel = mysqli_query($con, $result_consultaResponsavel);

$result_consultaAniversario = "  SELECT * FROM aluno WHERE MONTH(dtNascimento) = '$aniversario'  ";
$resultado_consultaAniversario = mysqli_query($con, $result_consultaAniversario);

$result_consultaMedica = "SELECT A.nomeAluno, A.idAluno,A.tipoSanguineo, A.fatorRh,A.medContinuos,A.nomeMedicamento, A.emergenciasMedicas, A.avisarEmergencia,A.telefoneEmergencia,A.telefoneContato,A.status, P.nomePolo, P.idPolo, A.idPolo 
FROM  aluno A, polo P 
WHERE  A.status = '$medica'  and A.idPolo = P.idPolo  ";
$resultado_consultaMedica = mysqli_query($con, $result_consultaMedica);

//--------------------------------------------------Fim------------------

?>
<?php 
if(mysqli_num_rows($resultado_consultaBairro ) > 0){
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
            <option value="div6">Ficha emergência do aluno</option>
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
                      <th>Bairro do Aluno</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaBairro)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['bairro']; ?></td>
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
if(mysqli_num_rows($resultado_consultaPolo ) > 0){
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
    <option value="div6">Ficha emergência do aluno</option>
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
                      
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaPolo)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        
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
if(mysqli_num_rows($resultado_consultaEscola ) > 0){
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
            <option value="div6">Ficha emergência do aluno</option>
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
                      
                      <th>Escola</th>
                      <th>Ano Escola</th>
                      <th>Turma Escola</th>
                      <th>Turno Escola</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaEscola)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        
                        <td><?php echo $rows_consultaAluno['escola']; ?></td>
                        <td><?php echo $rows_consultaAluno['anoEscola']; ?></td>
                        <td><?php echo $rows_consultaAluno['turmaEscola']; ?></td>
                        <td><?php echo $rows_consultaAluno['turnoEscola']; ?></td>

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
if(mysqli_num_rows($resultado_consultaAniversario ) > 0){
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
    <option value="div6">Ficha emergência do aluno</option>
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
                      <th>Bairro do Aluno</th>
                    
                    
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAniversario)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['dtNascimento']; ?></td>
                       

                      
                    

                         


                      

                        
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
if(mysqli_num_rows($resultado_consultaResponsavel ) > 0){
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
            <option value="div6">Ficha emergência do aluno</option>
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
                      <th>CPF responsável</th>
                      <th>RG responsável</th>
                      <th></th>
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaResponsavel)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                       
                        <td><?php echo $rows_consultaAluno['cpfResponsavel']; ?></td>
                        <td><?php echo $rows_consultaAluno['rgResponsavel']; ?></td>

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
if(mysqli_num_rows($resultado_consultaMedica ) > 0){
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
    <option value="div6">Ficha emergência do aluno</option>
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
                      <th>Tipo Sanguineo</th>
                      <th>Fator RH</th>
                      <th>Medicação Continua</th>
                      <th>Nome Medicamento</th>
                      <th>Emergência Médica</th>
                      <th>Avisar emergência</th>
                      <th>Telefone para emergência</th>
                      
                    </tr>
                  </thead>
                
                  <tbody>
'; ?>
                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaMedica)) {
                      ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>
                        <td><?php echo $rows_consultaAluno['tipoSanguineo']; ?></td>
                        <td><?php echo $rows_consultaAluno['fatorRh']; ?></td>
                        <td><?php echo $rows_consultaAluno['medContinuos']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomeMedicamento']; ?></td>
                        <td><?php echo $rows_consultaAluno['emergenciasMedicas']; ?></td>
                        <td><?php echo $rows_consultaAluno['avisarEmergencia']; ?></td>
                        <td><?php echo $rows_consultaAluno['telefoneEmergencia']; ?></td>
                       
                       

                      
                    

                         


                      

                        
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
if(mysqli_num_rows($resultado_consultaBairro ) < 1 && mysqli_num_rows($resultado_consultaPolo) < 1 && mysqli_num_rows($resultado_consultaEscola) < 1 && mysqli_num_rows($resultado_consultaAniversario) < 1
&& mysqli_num_rows($resultado_consultaResponsavel) < 1 && mysqli_num_rows($resultado_consultaMedica) < 1){
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
  
  <label for="">Idioma</label>
  <select name="idioma" class="form-control" >
  <option value="">Selecione</option>
  <option value="1">Posssui</option>
  
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


  