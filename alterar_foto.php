<?php
include_once "dao/conexao.php";

$idUsuario = $_POST["idUsuario"];

   if (isset($_FILES['foto'] )){

      $idUsuario = $_POST["idUsuario"];
  
      $extensao1 = strtolower(substr($_FILES['foto']['name'], -4));
      
  
      $novo_nome1 = "foto-".$idUsuario.".".$extensao1; //define o nome do arquivo
   
  
      $diretorio ="upload/"; 
      
      move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome1);
      
  
  
  $sql3 = "UPDATE  usuario SET foto = '$novo_nome1' where idUsuario ='$idUsuario'"; 
  
  } 

  if($con->query($sql3)=== true){ 
    echo "<script>alert('foto alterado com sucesso!');window.location='profile.php'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }
       $con->close();
  ?>