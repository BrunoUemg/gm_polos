<?php
include_once "dao/conexao.php";

$idAluno = $_POST["idAluno"];
$desArquivo1 = $_POST["desArquivo1"];
$desArquivo2 = $_POST["desArquivo2"];
$desArquivo3 = $_POST["desArquivo3"];
$desArquivo4 = $_POST["desArquivo4"];
$desArquivo5 = $_POST["desArquivo5"];
$desArquivo6 = $_POST["desArquivo6"];
$desArquivo7 = $_POST["desArquivo7"];
$desArquivo8 = $_POST["desArquivo8"];
$desArquivo9 = $_POST["desArquivo9"];
$desArquivo10 = $_POST["desArquivo10"];


$sql1 = "UPDATE aluno SET desArquivo1 = '$desArquivo1', desArquivo2 = '$desArquivo2',
desArquivo3 = '$desArquivo3', desArquivo4 = '$desArquivo4', desArquivo5 = '$desArquivo5', desArquivo6 = '$desArquivo6',
desArquivo7 = '$desArquivo7', desArquivo8 = '$desArquivo8', desArquivo9 = '$desArquivo9',
desArquivo10 = '$desArquivo10' where idAluno = '$idAluno' ";


if($con->query($sql1)=== true){ 
  echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
} else {
     echo "Erro para inserir: " . $con->error; }

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
      echo "<script>alert('Documento alterado com sucesso!');window.location='consultar_alunos.php'</script>";
    } else {
         echo "Erro para inserir: " . $con->error; }

    }
    

  
    $con->close();
                 
  ?>