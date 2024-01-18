<?php

include_once "dao/conexao.php";
if(isset($_POST['idAluno']))
{
$idAluno = $_POST['idAluno'];    
$idComposicao_familiar = $_POST["idComposicao_familiar"];
$cpfAluno_composicao = $_POST["cpfAluno_composicao"];
$nomeIntegrante = $_POST["nomeIntegrante"];
$renda = $_POST["renda"];
$parentesco = $_POST["parentesco"];
$idade = $_POST["idade"];
$profissao = $_POST["profissao"];
$escolaridade = $_POST["escolaridade"];
$estadoCivil = $_POST["estadoCivil"];




$sql = "UPDATE  composicao_familiar SET nomeIntegrante = '$nomeIntegrante', idAluno = '$idAluno', renda = '$renda', idade = '$idade',
 profissao = '$profissao', parentesco = '$parentesco', escolaridade = '$escolaridade', estadoCivil = '$estadoCivil', cpfAluno_composicao = '$cpfAluno_composicao' where idComposicao_familiar = '$idComposicao_familiar' "; 

if($con->query($sql)=== true){
  
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='dados_alterar_composicao.php?idAluno=$idAluno'</script>";
        }else{
            echo "Erro para inserir: " . $con->error;
        
        }

}else{

    $idComposicao_familiar = $_POST["idComposicao_familiar"];
    $cpfAluno_composicao = $_POST["cpfAluno_composicao"];
    $nomeIntegrante = $_POST["nomeIntegrante"];
    $renda = $_POST["renda"];
    $parentesco = $_POST["parentesco"];
    $idade = $_POST["idade"];
    $profissao = $_POST["profissao"];
    $escolaridade = $_POST["escolaridade"];
    $estadoCivil = $_POST["estadoCivil"];

    $sql = "UPDATE  composicao_familiar SET nomeIntegrante = '$nomeIntegrante', renda = '$renda', idade = '$idade',
 profissao = '$profissao', parentesco = '$parentesco', escolaridade = '$escolaridade', estadoCivil = '$estadoCivil', cpfAluno_composicao = '$cpfAluno_composicao' where idComposicao_familiar = '$idComposicao_familiar' "; 
if($con->query($sql)=== true){
  
    echo "<script>alert('Cadastro alterado com sucesso!');window.location='cadastrar_composicao.php?cpfAluno_composicao=$cpfAluno_composicao'</script>";
        }else{
            echo "Erro para inserir: " . $con->error;
        
        }

}



$con->close();
?>