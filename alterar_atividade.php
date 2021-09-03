<?php 

include_once "dao/conexao.php";

$idAtividades = $_POST['idAtividades'];
$nomeAtividade = $_POST['nomeAtividade'];
$descricao = $_POST['descricao'];
$dataEntrega = $_POST['dataEntrega'];

$sql = "UPDATE atividades set nomeAtividade = '$nomeAtividade', descricao = '$descricao', dataEntrega = '$dataEntrega'
where idAtividades = '$idAtividades'";

if($con->query($sql) === true){
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='consultar_atividade.php'</script>";



}


if(!empty($_FILES["documentoApoio"]["name"])){
    $pasta_arquivo = "documento_apoio/";
    
  
    $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
    $extensao = pathinfo($_FILES['documentoApoio']['name'], PATHINFO_EXTENSION);
  
    if(in_array($extensao, $formatos)){
      $pasta = "documento_apoio/";
      $temporario = $_FILES['documentoApoio']['tmp_name'];
      $arquivo = uniqid().".$extensao";
  
      if(move_uploaded_file($temporario, $pasta.$arquivo)){
        $sql = "UPDATE atividades SET documentoApoio = '$arquivo' where idAtividades = '$idAtividades'"; 
      }
    }
    if($con->query($sql)=== true){ 
      echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
    } else {
         echo "Erro para inserir: " . $con->error; }
  }
$con->close();


?>