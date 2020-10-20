<?php
include_once "dao/conexao.php";
include_once("header.php");

$idAluno = $_GET['idAluno'];

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
P.idPolo,
P.nomePolo
from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1 and A.idAluno = '$idAluno' ";
$res = $con-> query($result_consultaAluno);
$linha = $res->fetch_assoc();

?>

         
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Ficha Social e infraestrutura de <?php echo $linha["nomeAluno"] ?></div>
            </div>
                 
                <form action="envio_cadastro_socioeconomica.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">
               

<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
               
              <div class="form-group ">
              <h3>Gestante na familía ?</h3>
              
              <label >Sim </label>
              <input  maxlength="100" name="gestante"  required="required" type="radio" value="Sim">
              
             <label for=""></label>
              <label>Não </label>
              <input  maxlength="100" name="gestante"  required="required" type="radio" value="Não"  >
              </div>
              

              <div class="form-group ">
              <h3>Integrante familiar sem Documento ?</h3>
              
              <label >Sim </label>
              <input  maxlength="100" name="semDocumento"  required="required" type="radio" value="Sim">
              
             <label for=""></label>
              <label>Não </label>
              <input  maxlength="100" name="semDocumento"  required="required" type="radio" value="Não"  >
              
              </div>
              <div class="form-group ">
              <h3>Dependente Químico na familia ?</h3>
              
              <label >Sim </label>
              <input  maxlength="100" name="dependenteQuimico"  required="required" type="radio" value="Sim" onclick="undisableTxt()">
              
             <label for=""></label>
              <label>Não </label>
              <input  maxlength="100"  name="dependenteQuimico"  required="required" type="radio" value="Não" onclick="disableTxt()" >
              
              </div>
              <div class="form-group ">
              <label for="">Nome do dependente Químico</label>
              <input class="form-control col-md-7 col-xs-12" maxlength="100"  name="nomeDependenteQui"  " type="text"  placeholder="Cite"  >
            </div>
              

<div class="form-group ">
              <h3>Gastos Medicamentos ?</h3>
              
              <label >Sim </label>
              <input  maxlength="100" name="gastosMedicamentos"  required="required" type="radio" value="Sim" onclick="undisableTxt2()">
              
             <label for=""></label>
              <label>Não </label>
              <input  maxlength="100" name="gastosMedicamentos"  required="required" type="radio" value="Não" onclick="disableTxt2()" >
              </div>
              
              <div class="form-group ">
              <label for="">Valor Medicamento</label>
              <input class="form-control col-md-7 col-xs-12" maxlength="100"  name="gastosMedicamentosValor"  type="text"  placeholder="Valor" onKeyPress="return(moeda(this,'.',',',event))"  >
            </div>

            <div class="form-group ">
              <h3>Deficiênte ou doença Crônica ?</h3>
              
              <label >Sim </label>
              <input  maxlength="100" name="doencaFamilia"  required="required" type="radio" value="Sim" onclick="undisableTxt3()">
              
             <label for=""></label>
              <label>Não </label>
              <input  maxlength="100" name="doencaFamilia"  required="required" type="radio" value="Não" onclick="disableTxt3()" >
              </div>
              
              <div class="form-group ">
              <label for="">Cite</label>
              <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeDoencaFamilia"   type="text" value="" placeholder="Cite"  >
            </div>

            <div class="form-group ">
              <h3>Tipo de Residência  ?</h3>
              
              <label >Residência própria </label>
              <input  maxlength="100" name="residencia"  required="required" type="radio" value="Residência própria" onclick="disableTxt4()">
              <label for=""></label>
             <label for=""></label>
              <label>Alugada </label>
              <input  maxlength="100" name="residencia"  required="required" type="radio" value="Alugada" onclick="undisableTxt4()" >
            
              <label for=""></label>
              <label for=""></label>
              <label>Cedida </label>
              <input  maxlength="100" name="residencia"  required="required" type="radio" value="Cedida " onclick="undisableTxt4()" >
              
              <label for=""></label>
              <label for=""></label>
              <label>A favor </label>
              <input  maxlength="100" name="residencia"  required="required" type="radio" value="A favor" onclick="undisableTxt4()" >
              </div>
              
              <div class="form-group ">
              <label for="">Valor Aluguel</label>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"  name="valorResidencia"   type="text" value="" placeholder="Valor" onKeyPress="return(moeda(this,'.',',',event))" >
            </div>

            <div class="form-group ">
              <label for="">Número Quartos</label>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"  name="numQuartos"  required="required" type="number" value=""  >
            </div>

            <div class="form-group ">
              <label for="">Número Banheiros</label>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"  name="numBanheiros"  required="required" type="number" value=""  >
            </div>

            <div class="form-group ">
              <h3>Água encanada ou sisterna ou poço ?</h3>
              
              <label >Água encanada </label>
              <input  maxlength="100" name="agua"  required="required" type="radio" value="Água encanada" >
              
             <label for=""></label>
              <label>Sisterna </label>
              <input  maxlength="100" name="agua"  required="required" type="radio" value="Sisterna"  >

              <label for=""></label>
              <label>Poço </label>
              <input  maxlength="100" name="agua"  required="required" type="radio" value="Poço"  >
              </div>
              
              <div class="form-group ">
              <label for="">Valor Água</label>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100"   name="valorAgua"   type="text" value="" placeholder="Valor" onKeyPress="return(moeda(this,'.',',',event))" >
            </div>

            <div class="form-group ">
              <h3>Possui energia elétrcia ?</h3>
              
              <label >Sim </label>
              <input  maxlength="100" name="energia"  required="required" type="radio" value="Sim" onclick="undisableTxt5()">
              
             <label for=""></label>
              <label>Não </label>
              <input  maxlength="100" name="energia"  required="required" type="radio" value="Não" onclick="disableTxt5()" >
              </div>
              
              <div class="form-group ">
              <label for="">Valor Energia</label>
              <input class="form-control col-md-7 col-xs-12l" maxlength="100" name="valorEnergia" id="dinheiro"  type="text" value="" placeholder="Valor"   onKeyPress="return(moeda(this,'.',',',event))"  >
            </div>
</div>
              
            
           
    
              <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='ficha_socioeconomica.php'" value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
              </div>
            </div>
</form>




              
                       </div>

              </div>
</div> 

<script src="js/mascaras.js"></script>
    
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

<script>function disableTxt() {
  document.getElementById("myText").disabled = true;
  
}

function undisableTxt() {
  document.getElementById("myText").disabled = false;
  document.getElementById("myText").value = "";
}</script>

<script>function disableTxt2() {
  document.getElementById("myText2").disabled = true;
  document.getElementById("myText2").value = "Não Possui";
}

function undisableTxt2() {
  document.getElementById("myText2").disabled = false;
  document.getElementById("myText2").value = "";
}</script>

<script>function disableTxt3() {
  document.getElementById("myText3").disabled = true;
  document.getElementById("myText3").value = "Não Possui";
}

function undisableTxt3() {
  document.getElementById("myText3").disabled = false;
  document.getElementById("myText3").value = "";
}</script>

<script>function disableTxt4() {
  document.getElementById("myText4").disabled = true;
  document.getElementById("myText4").value = "Residencia própria";
}

function undisableTxt4() {
  document.getElementById("myText4").disabled = false;
  document.getElementById("myText4").value = "";
}</script>

<script>function disableTxt5() {
  document.getElementById("myText5").disabled = true;
  document.getElementById("myText5").value = "Não possui";
}

function undisableTxt5() {
  document.getElementById("myText5").disabled = false;
  document.getElementById("myText5").value = "";
}</script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   




<?php
include_once("footer.php");

?>