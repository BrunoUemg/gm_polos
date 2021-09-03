<?php

include_once "dao/conexao.php";

$idAluno = $_POST["idAluno"];
$nomeAluno = $_POST["nomeAluno"];

$nomePai = $_POST["nomePai"];
$profissaoPai = $_POST["profissaoPai"];
$nomeMae = $_POST["nomeMae"];
$profissaoMae = $_POST["profissaoMae"];
$sexo = $_POST["sexo"];
$dtNascimento = $_POST["dtNascimento"];
$telefoneContato = $_POST["telefoneContato"];
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$turnoEscola = $_POST["turnoEscola"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$status = $_POST["status"];
$dataDesligamento = $_POST ["dataDesligamento"];
$idPolo = $_POST["idPolo"];
$nacionalidadeAluno = $_POST["nacionalidadeAluno"];
$nacionalidadeResponsavel = $_POST["nacionalidadeResponsavel"];
$rgAluno = $_POST["rgAluno"];
$cpfAluno = $_POST["cpfAluno"];
$rgResponsavel = $_POST["rgResponsavel"];
$cpfResponsavel = $_POST["cpfResponsavel"];
$dtMatricula = $_POST["dtMatricula"];
$tipoSanguineo = $_POST["tipoSanguineo"];
$fatorRh = $_POST["fatorRh"];
$altura = $_POST["altura"];
$peso = $_POST["peso"];
$equipamentosAuxilio = $_POST["equipamentosAuxilio"];
$permicao = $_POST["permicao"];
$emergenciasMedicas = $_POST["emergenciasMedicas"];
$avisarEmergencia = $_POST["avisarEmergencia"];
$medContinuos = $_POST["medContinuos"];
$alergia = $_POST["alergia"];
$planoMedico = $_POST["planoMedico"];
$numCarteira = $_POST["numCarteira"];
$nadar = $_POST["nadar"];
$sonambulo = $_POST["sonambulo"];
$cardiaco = $_POST["cardiaco"];
$restricoesAlimentos = $_POST["restricoesAlimentos"];
$impedimentoFisico = $_POST["impedimentoFisico"];
$distubioComportamento = $_POST["distubioComportamento"];
$disturbioAlimentar = $_POST["disturbioAlimentar"];
$disturbioAnsiedade = $_POST["disturbioAnsiedade"];
$deficiencia = $_POST["deficiencia"];
$telefoneEmergencia = $_POST["telefoneEmergencia"];
$numeroEndereco = $_POST["numeroEndereco"];
$oculos = $_POST["oculos"];
$aparelhoDentario = $_POST["aparelhoDentario"];
$marcapasso = $_POST["marcapasso"];
$sonda = $_POST["sonda"];
$aparelhoAudicao = $_POST["aparelhoAudicao"];
$lentesContato = $_POST["lentesContato"];
$outroEquipamento = $_POST["outroEquipamento"];
$picadaInseto = $_POST["picadaInseto"];
$alergiaMedicamentos = $_POST["alergiaMedicamentos"];
$alimentos = $_POST["alimentos"];
$outraAlergia = $_POST["outraAlergia"];
$outraAlergiaDesc = $_POST["outraAlergiaDesc"];
$disturbioComportamentoDesc = $_POST["disturbioComportamentoDesc"];
$disturbioAlimentarDesc = $_POST["disturbioAlimentarDesc"];
$disturbioAnsiedadeDesc = $_POST["disturbioAnsiedadeDesc"];
$fisica = $_POST["fisica"];
$visual = $_POST["visual"];
$auditiva = $_POST["auditiva"];
$intectual = $_POST["intectual"];
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
$tipoEscola = $_POST["tipoEscola"];
$valorEscola = $_POST["valorEscola"];
$valorIdioma = $_POST["valorIdioma"];
$valorInformatica = $_POST["valorInformatica"];
$valorAlimentacao = $_POST["valorAlimentacao"];
$parentescoGestante = $_POST["parentescoGestante"];
$restricoesAlimentosDesc = $_POST["restricoesAlimentosDesc"];
$cadUnico = $_POST["cadUnico"];
$bolsaFamilia = $_POST["bolsaFamilia"];



$sql1 = "UPDATE  aluno SET nomeAluno = '$nomeAluno', dtNascimento = '$dtNascimento', 
  enderecoResidencial = '$enderecoResidencial' , bairro = '$bairro', numeroEndereco = '$numeroEndereco',
nomePai = '$nomePai', profissaoPai = '$profissaoPai', nomeMae = '$nomeMae', profissaoMae = '$profissaoMae' , telefoneContato = '$telefoneContato',
 sexo = '$sexo', escola = '$escola', anoEscola = '$anoEscola', turmaEscola = '$turmaEscola', turnoEscola = '$turnoEscola',
  idPolo = '$idPolo', status = '$status', 
  dataDesligamento = '$dataDesligamento', nacionalidadeAluno = '$nacionalidadeAluno', nacionalidadeResponsavel = '$nacionalidadeResponsavel',
  rgAluno = '$rgAluno', cpfAluno = '$cpfAluno', rgResponsavel = '$rgResponsavel', cpfResponsavel = '$cpfResponsavel',
  dtMatricula = '$dtMatricula', tipoSanguineo = '$tipoSanguineo', fatorRh = '$fatorRh', altura = '$altura',
  peso = '$peso', equipamentosAuxilio = '$equipamentosAuxilio', permicao = '$permicao', emergenciasMedicas = '$emergenciasMedicas',
  avisarEmergencia = '$avisarEmergencia', medContinuos = '$medContinuos', alergia = '$alergia', planoMedico = '$planoMedico',
  numCarteira = '$numCarteira', nadar = '$nadar', sonambulo = '$sonambulo', cardiaco = '$cardiaco', restricoesAlimentos = '$restricoesAlimentos',
  impedimentoFisico = '$impedimentoFisico', distubioComportamento = '$distubioComportamento', disturbioAlimentar = '$disturbioAlimentar',
  disturbioAnsiedade = '$disturbioAnsiedade', deficiencia = '$deficiencia', telefoneEmergencia = '$telefoneEmergencia',
 oculos = '$oculos', aparelhoDentario = '$aparelhoDentario', marcapasso = '$marcapasso',
sonda = '$sonda', aparelhoAudicao = '$aparelhoAudicao', lentesContato = '$lentesContato', outroEquipamento = '$outroEquipamento',
picadaInseto = '$picadaInseto', alimentos = '$alimentos', alergiaMedicamentos = '$alergiaMedicamentos', outraAlergia = '$outraAlergia', outraAlergiaDesc = '$outraAlergiaDesc',
disturbioComportamentoDesc = '$distubioComportamento', disturbioAnsiedadeDesc = '$disturbioAnsiedadeDesc',
disturbioAlimentarDesc = '$disturbioAlimentarDesc', fisica = '$fisica', intectual = '$intectual', visual = '$visual',
auditiva = '$auditiva', restricoesAlimentosDesc = '$restricoesAlimentosDesc'  where idAluno ='$idAluno' "; 



if($con->query($sql1)=== true){
  $query2 = mysqli_query($con, "SELECT renda, SUM(renda) AS rendaSom from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno");
    
  $resultRendaSom = mysqli_fetch_array($query2);

  $rendaSom = $resultRendaSom['rendaSom'];

  $query3 = mysqli_query($con, "SELECT valorResidencia,valorAgua,valorEnergia,gastosMedicamentosValor,valorAlimentacao,valorEscola, valorIdioma, valorInformatica, SUM(valorResidencia)+SUM(valorAgua)+ SUM(valorEnergia)+SUM(gastosMedicamentosValor)+SUM(valorAlimentacao)+SUM(valorEscola)+SUM(valorIdioma)+SUM(valorInformatica) AS gastos from ficha_social where idAluno = '$idAluno' GROUP BY idAluno");
    
  $resultGastos = mysqli_fetch_array($query3);

  $gastos = $resultGastos['gastos'];

  $query4 = mysqli_query($con, "SELECT status,renda, SUM(renda)/SUM(status) AS rendaPercapita from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno");
  $resultPercapita = mysqli_fetch_array($query4);
  $percapita = $resultPercapita['rendaPercapita'];

  $rendaTotal = ($rendaSom - $gastos);
  

  $sql2 = "UPDATE ficha_social SET  gestante = '$gestante', semDocumento = '$semDocumento',
  dependenteQuimico = '$dependenteQuimico', nomeDependenteQui = '$nomeDependenteQui', gastosMedicamentos = '$gastosMedicamentos',
  gastosMedicamentosValor = '$gastosMedicamentosValor', doencaFamilia = '$doencaFamilia', nomeDoencaFamilia = '$nomeDoencaFamilia',
  residencia = '$residencia', valorResidencia = '$valorResidencia', numQuartos = '$numQuartos', numBanheiros = '$numBanheiros',
  agua = '$agua', valorAgua = '$valorAgua', energia = '$energia', valorEnergia = '$valorEnergia', rendaTotal = '$rendaTotal', tipoEscola = '$tipoEscola',
  valorEscola = '$valorEscola', valorIdioma = '$valorIdioma',  valorInformatica = '$valorInformatica', valorAlimentacao = '$valorAlimentacao', parentescoGestante = '$parentescoGestante', cadUnico = '$cadUnico', bolsaFamilia = '$bolsaFamilia', percapita = '$percapita' where idAluno = '$idAluno'  ";
}
if($con->query($sql2)=== true){
  $data = date ("Y-m-d");

  $sql7 = "INSERT INTO movimentacao (dataMovimentacao, descricao,idAluno) VALUES ('$data', 'Atualização ficha do aluno', '$idAluno' )";


}

if($con->query($sql7)===TRUE){

  $diretorio = "digitalizados/";

    if(!is_dir($diretorio)){ 
      echo "Pasta $diretorio nao existe";
    }else{
      $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
  
      for($controle1 = 0; $controle1 < count($arquivo['name']); $controle1++){
  
        $destino = $diretorio."/".$idAluno."-".$arquivo['name'][$controle1];
        if(move_uploaded_file($arquivo['tmp_name'][$controle1], $destino)){
        $doc = $idAluno."-".$arquivo['name'][$controle1];
         
        }
        if($doc != NULL || $doc != ""){
        $sql = "INSERT INTO repositorio_aluno (idAluno,srcDocumento,descricao)VALUES('$idAluno','$doc','$doc')";
        
        if($con->query($sql)===TRUE){
          echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
        }
        }else {
          echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
        }
         
     
    
    
       
    } 
  }


  echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";

}
else {
  echo "Erro para inserir: " . $con->error;
}





if(!empty($_FILES["rgalunodigi"]["name"])){
  $pasta_arquivo = "digitalizados/";
  

  $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
  $extensao = pathinfo($_FILES['rgalunodigi']['name'], PATHINFO_EXTENSION);

  if(in_array($extensao, $formatos)){
    $pasta = "digitalizados/";
    $temporario = $_FILES['rgalunodigi']['tmp_name'];
    $arquivo = uniqid().".$extensao";

    if(move_uploaded_file($temporario, $pasta.$arquivo)){
      $sql = "UPDATE aluno SET rgalunodigi = '$arquivo' where idAluno = '$idAluno'"; 
    }
  }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }
}
  if(!empty($_FILES["cpfalunodigi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['cpfalunodigi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['cpfalunodigi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET cpfalunodigi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["cpfrespdigi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['cpfrespdigi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['cpfrespdigi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET cpfrespdigi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["cpfresp2digi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['cpfresp2digi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['cpfresp2digi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET cpfresp2digi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["rgrespdigi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['rgrespdigi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['rgrespdigi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET rgrespdigi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["rgresp2digi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['rgresp2digi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['rgresp2digi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET rgresp2digi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["comprovanteresidigi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['comprovanteresidigi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['comprovanteresidigi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET comprovanteresidigi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["atestadoescolardigi"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['atestadoescolardigi']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['atestadoescolardigi']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET atestadoescolardigi = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }


  if(!empty($_FILES["fotoAluno"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['fotoAluno']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['fotoAluno']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET fotoAluno = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["outro"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['outro']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['outro']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET outro = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }

  if(!empty($_FILES["arquivo10"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['arquivo10']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['arquivo10']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET arquivo10 = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }


  if(!empty($_FILES["arquivo11"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['arquivo11']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['arquivo11']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET arquivo11 = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }


  if(!empty($_FILES["arquivo12"]["name"])){
    $pasta_arquivo = "digitalizados/";
    

    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['arquivo12']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatos)){
      $pasta = "digitalizados/";
      $temporario = $_FILES['arquivo12']['tmp_name'];
      $arquivo = uniqid().".$extensao";

      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE aluno SET arquivo12 = '$arquivo' where idAluno = '$idAluno'"; 
      }
    }
  if($con->query($sql)=== true){ 
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_alunos.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }

  }





  
 
  $con->close();
?>