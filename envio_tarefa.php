<?php 

include_once "dao/conexao.php";

session_start();

$idAluno = $_SESSION['idAluno'];
$idAtividades = $_POST["idAtividades"];
$idUsuario = $_POST["idUsuario"];
$dataEntrega = date('Y-m-d');


//$sql = "INSERT INTO tarefa (idAluno,idAtividade)values($idAluno,$idAtividades)";
$sql = "INSERT INTO tarefa (idAluno,idAtividade,dataEntrega, idUsuario)VALUES('$idAluno','$idAtividades','$dataEntrega', '$idUsuario')";
if($con->query($sql) === true){

    if (isset($_FILES['pdfAtividade'] )){

    
    
        $extensao1 = strtolower(substr($_FILES['pdfAtividade']['name'], -4));
        
    
        $novo_nome1 = "pdfAtividade-".$idAtividades."-".$idAluno.".".$extensao1; //define o nome do arquivo
     
    
        $diretorio ="tarefas_concluidas/"; 
        
        move_uploaded_file($_FILES['pdfAtividade']['tmp_name'], $diretorio.$novo_nome1);
        
    
    
    $sql5 = "UPDATE tarefa SET pdfAtividade = '$novo_nome1' where idAtividade ='$idAtividades' and idAluno = '$idAluno'"; 
    
     if($con->query($sql5)===true){
        $query = mysqli_query($con, "SELECT Max(idTarefa)  AS codigo FROM tarefa where idAluno = '$idAluno' and idAtividade = '$idAtividades'");
        $result = mysqli_fetch_array($query);
        $idTarefa = $result['codigo'];
        $sql2 = "UPDATE  tarefa_atividade set idTarefa = '$idTarefa', status = 1 where idAluno = '$idAluno' and idAtividade = '$idAtividades'";
     
if($con->query($sql2) === true){

    echo "<script>alert('Tarefa enviada com sucesso!');window.location='tarefas_atribuidas.php'</script>";

} else{
    echo "Erro para inserir: " . $con->error;
}
     }
    }

}
 else{
    echo "Erro para inserir: " . $con->error;
}
$con->close();
?>
