<?php
include_once "dao/conexao.php";
include_once("header.php");

$idAluno = $_GET['idAluno'];

$result_consultaSocial = "SELECT F.idFicha_social,
F.gestante,
F.semDocumento,
F.dependenteQuimico,
F.nomeDependenteQui,
F.gastosMedicamentos,
F.gastosMedicamentosValor,
F.doencaFamilia,
F.nomeDoencaFamilia,
F.residencia,
F.valorResidencia,
F.numQuartos,
F.numBanheiros,
F.agua,
F.valorAgua,
F.energia,
F.valorEnergia,
A.idAluno,
A.nomeAluno,
A.status
from aluno A, ficha_social F
where F.idAluno = A.idAluno and A.status = 1 and F.idAluno = '$idAluno' ";
$res = $con-> query($result_consultaSocial);
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
              <div class="card-title">Visualizar e alterar a Ficha Social e Infraestrutura do <?php echo $linha['nomeAluno']?></div>
            </div>
                 
                <form action="envio_imprimir_social.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">
               
                <div class="form-group">          
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
<input class="form-control" maxlength="100" name="idFicha_social" hidden required="required" type="text"  value="<?php echo $linha['idFicha_social']; ?>">
                <div class="form-group col-md-4">
              <label>Nome Completo </label>
              <input class="form-control" maxlength="100" name="nomeAluno" readonly  required="required" type="text"  value="<?php echo $linha['nomeAluno']; ?>">
              </div>
              <div class="form-group col-md-4">
              <label>Gestante na Familia ? </label>
              <input class="form-control" maxlength="100" name="gestante"  required="required" type="text" value="<?php echo $linha['gestante']; ?>">
              </div>
              <div class="form-group col-md-4">
              <label>Sem documento da Família ? </label>
              <input class="form-control" maxlength="100" name="semDocumento"  required="required" type="text" value="<?php echo $linha['semDocumento']; ?>"  onkeyup="mascara('###.###.###-##',this,event,true)">
              </div>
              </div>
<div class="row">
<div class="form-group col-md-4">
              <label>Dependente Químico na família ? </label>
              <input class="form-control" maxlength="15" name="dependenteQuimico"  required="required" type="text" value="<?php echo $linha['dependenteQuimico']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label>Nome Dependente Químico  </label>
              <input class="form-control" maxlength="100" name="nomeDependenteQui"  required="required" type="text" value="<?php echo $linha['nomeDependenteQui']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label>Gastos Medicamentos ? </label>
              <input class="form-control" maxlength="100" name="gastosMedicamentos"  required="required" type="text" value="<?php echo $linha['gastosMedicamentos']; ?>"  >
              </div>
</div>

<div class="row">
<div class="form-group col-md-4">
              <label>Valor Medicamento </label>
              <input class="form-control" maxlength="100" name="gastosMedicamentosValor"  required="required" type="text" value="<?php echo $linha['gastosMedicamentosValor']; ?>"  onKeyPress="return(moeda(this,'.',',',event))"  >
              </div>

              <div class="form-group col-md-4">
              <label>Doença crônica ou deficiência na família ? </label>
              <input class="form-control" maxlength="100" name="doencaFamilia"  required="required" type="text" value="<?php echo $linha['doencaFamilia']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label> Nome da doença na Família </label>
              <input class="form-control" maxlength="100" name="nomeDoencaFamilia"  required="required" type="text" value="<?php echo $linha['nomeDoencaFamilia']; ?>"  >
              </div>
</div>

<div class="row">
<div class="form-group col-md-4">
              <label>Tipo de residência da Família </label>
              <input class="form-control" maxlength="100" name="residencia"  required="required" type="text" value="<?php echo $linha['residencia']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label>Valor Residência </label>
              <input class="form-control" maxlength="100" name="valorResidencia"  required="required" type="text" value="<?php echo $linha['valorResidencia']; ?>" onKeyPress="return(moeda(this,'.',',',event))"   >
              </div>

              <div class="form-group col-md-4">
              <label> Número de Quartos </label>
              <input class="form-control" maxlength="100" name="numQuartos"  required="required" type="text" value="<?php echo $linha['numQuartos']; ?>"  >
              </div>
</div>

<div class="row">
<div class="form-group col-md-4">
              <label>Número de Banheiros </label>
              <input class="form-control" maxlength="100" name="numBanheiros"  required="required" type="text" value="<?php echo $linha['numBanheiros']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label> Tipo de Água </label>
              <input class="form-control" maxlength="100" name="agua"  required="required" type="text" value="<?php echo $linha['agua']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label> Valor Água </label>
              <input class="form-control" maxlength="100" name="valorAgua"  required="required" type="text" value="<?php echo $linha['valorAgua']; ?>" onKeyPress="return(moeda(this,'.',',',event))"   >
              </div>
</div>

<div class="row">
<div class="form-group col-md-4">
              <label>Energia </label>
              <input class="form-control" maxlength="100" name="energia"  required="required" type="text" value="<?php echo $linha['energia']; ?>"  >
              </div>

              <div class="form-group col-md-4">
              <label> Valor da energia </label>
              <input class="form-control" maxlength="100" name="valorEnergia"  required="required" type="text" value="<?php echo $linha['valorEnergia']; ?>" onKeyPress="return(moeda(this,'.',',',event))"   >
              </div>

             
</div>





              </div>
            
           
    
              <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='ficha_socioeconomica.php'" value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success" value="Imprimir">
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



<?php
include_once("footer.php");

?>