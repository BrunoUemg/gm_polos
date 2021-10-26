<?php 

include_once "dao/conexao.php";
session_start();
$nomeAtividade = $_POST['nomeAtividade'];
$descricao = $_POST["descricao"];
$dataAtividade = $_POST["dataAtividade"];
$dataEntrega = $_POST["dataEntrega"];
$valorPontos = $_POST["valorPontos"];

$result_polo = "SELECT * FROM  polo";
$resultado_consultaPolo = mysqli_query($con, $result_polo);
$res = $con->query($result_polo);
$linha = $res->fetch_assoc();
$nomeDocumento = uniqid();

    
while ($rows_consultaPolo = mysqli_fetch_assoc($resultado_consultaPolo)) {
    $sql = "INSERT INTO atividades (nomeAtividade,descricao,dataAtividade,dataEntrega,tipoAtividade,idPolo, valorPontos, idUsuario)VALUES('$nomeAtividade','$descricao','$dataAtividade','$dataEntrega','Geral',$rows_consultaPolo[idPolo], '$valorPontos', '$_SESSION[idUsuario]')";
    
if($con->query($sql) === true){

    $query = mysqli_query($con, "SELECT Max(idAtividades)  AS codigo FROM atividades");
  $result = mysqli_fetch_array($query);
  
  $idAtividades = $result['codigo'];

    if (isset($_FILES['documentoApoio'] )){

    
    
        $extensao1 = strtolower(substr($_FILES['documentoApoio']['name'], -4));
        
    
        $novo_nome1 = "documentoApoio-".$nomeDocumento.".".$extensao1; //define o nome do arquivo
     
    
        $diretorio ="documento_apoio/"; 
        
        move_uploaded_file($_FILES['documentoApoio']['tmp_name'], $diretorio.$novo_nome1);
        
    
    
    $sql5 = "UPDATE  atividades SET documentoApoio = '$novo_nome1' where idAtividades ='$idAtividades'"; 
    
     if($con->query($sql5)===true){
      
      
        $result_Aluno = "SELECT * FROM aluno where idPolo = $rows_consultaPolo[idPolo]";
        $resultado_consultaAluno = mysqli_query($con, $result_Aluno);
        $res = $con->query($result_Aluno);
        $linha2 = $res->fetch_assoc();
        
        while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAluno)) {
            
           

            $sql2 = "INSERT INTO tarefa_atividade (idAtividade,idAluno,idPolo,status)values('$idAtividades',$rows_consultaAluno[idAluno],$rows_consultaAluno[idPolo],0)";
        if($con->query($sql2) === true){
            echo "<script>alert('Atividade cadastrada com sucesso!');window.location='cadastrar_atividades_gerais.php'</script>";
        }
        }
         
        }else{
            echo "Erro para inserir: " . $con->error;
        
        }
    }

}else{
    echo "Erro para inserir: " . $con->error;
    die();
}
}


$con->close();

?>