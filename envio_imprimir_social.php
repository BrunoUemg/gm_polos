<?php 

include_once "dao/conexao.php";

$idFicha_social = ["idFicha_social"];
$idAluno = $_POST["idAluno"];
$gestante = $_POST["gestante"];
$semDocumento = $_POST["semDocumento"];
$dependenteQuimico = $_POST["dependenteQuimico"];
$nomeDependenteQui = $_POST["nomeDependenteQui"];
$gastosMedicamentos = $_POST["gastosMedicamentos"];
$gastosMedicamentosValor = $_POST["gastosMedicamentosValor"];
$doencaFamilia = $_POST["doencaFamilia"];
$nomeDoencaFamilia = $_POST["nomeDoencaFamilia"];
$residencia = $_POST["residencia"];
$valorResidencia = $_POST["valorResidencia"];
$numQuartos = $_POST["numQuartos"];
$numBanheiros = $_POST["numBanheiros"];
$agua = $_POST["agua"];
$valorAgua = $_POST["valorAgua"];
$energia = $_POST["energia"];
$valorEnergia = $_POST["valorEnergia"];

$sql = "UPDATE ficha_social SET  gestante = '$gestante', semDocumento = '$semDocumento',
 dependenteQuimico = '$dependenteQuimico', nomeDependenteQui = '$nomeDependenteQui', gastosMedicamentos = '$gastosMedicamentos',
 gastosMedicamentosValor = '$gastosMedicamentosValor', doencaFamilia = '$doencaFamilia', nomeDoencaFamilia = '$nomeDoencaFamilia',
 residencia = '$residencia', valorResidencia = '$valorResidencia', numQuartos = '$numQuartos', numBanheiros = '$numBanheiros',
 agua = '$agua', valorAgua = '$valorAgua', energia = '$energia', valorEnergia = '$valorEnergia' where idAluno = '$idAluno'  ";

if($con->query($sql) === TRUE){ 
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='ficha_socioeconomica.php'</script>";
}else {
    echo "Erro para inserir: " . $con->error; }


    $sql2 = "SELECT F.idFicha_social,
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
    A.nomeAluno
    from aluno A, ficha_social F
    where F.idAluno = A.idAluno  and F.idAluno = '$idAluno' ";
    $res = $con-> query($sql2);
    $linha = $res->fetch_assoc();

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $data = strftime('%d de %B de %Y',strtotime('today'));
    
    use Dompdf\Dompdf;
    
    // include autoloader
    require_once 'dompdf/autoload.inc.php';
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml(' <div align="right"> Página 1 de 1 </div>
    <h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3>
    Aluno: '.$linha['nomeAluno']. '<center><h2><u>Ficha Sociel e Infraestrutura do Aluno</u></h2></center> 
    
       
     
         
        <p><h3> &nbsp; &nbsp; 1. Dados da Ficha:</h3>
    
    
        <table style="width: 100%;">
        <tbody>
          <tr>
            <td style="width: 100.0000%;">  Nome completo: '. $linha['nomeAluno'] .'</td>
          </tr>
          <tr>
            <td style="width: 40.0000%;">Gestante na familia ?: '. $linha['gestante'] .' </td>
            <td style="width: 60.0000%;">Sem Documento: '. $linha['semDocumento'] .' </td>
          </tr>

          <tr>
          <td style="width: 40.0000%;">Dependente Químico na família ?: '. $linha['dependenteQuimico'] .' </td>
          <td style="width: 60.0000%;">Nome Dependente Químico: '. $linha['nomeDependenteQui'] .' </td>
        </tr>

        <tr>
        <td style="width: 40.0000%;">Gastos com medicamentos ?: '. $linha['gastosMedicamentos'] .' </td>
        <td style="width: 60.0000%;">Valor Medicamentos: '. $linha['gastosMedicamentosValor'] .' </td>
      </tr>

      <tr>
      <td style="width: 40.0000%;">Gestante na familia ?: '. $linha['doecaFamilia'] .' </td>
      <td style="width: 60.0000%;">Nome doença ou deficiência: '. $linha['nomeDoencaFamilia'] .' </td>
    </tr>

    <tr>
    <td style="width: 40.0000%;">Residência ?: '. $linha['residencia'] .' </td>
    <td style="width: 60.0000%;">Valor Residência: '. $linha['valorResidencia'] .' </td>
  </tr>

  <tr>
  <td style="width: 40.0000%;">Número de Quartos ?: '. $linha['numQuartos'] .' </td>
  <td style="width: 60.0000%;">Número de Banheiros: '. $linha['numBanheiros'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Tipo de Água ?: '. $linha['agua'] .' </td>
<td style="width: 60.0000%;">Valor da Água: '. $linha['valorAgua'] .' </td>
</tr>

<tr>
<td style="width: 40.0000%;">Possui Energia Elétrica ?: '. $linha['energia'] .' </td>
<td style="width: 60.0000%;">Valor energia: '. $linha['valorEnergia'] .' </td>
</tr>
    
   
    
    </tbody>
    </table>
      
        
    
        <img style="position:fixed; bottom:150px; left:-48px;" src="img/footer3.png">
    
    
    
    ');
    
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    ob_clean();
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF to Browser
    $dompdf->stream('Ficha social e infraestrutura de '.$linha['nomeAluno']. '.pdf',
    array ("Attachment" =>true //para realizar o download somente alterar para true
    )
    );
  
    $con->close();
    

?>

