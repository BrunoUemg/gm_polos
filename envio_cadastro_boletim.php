<?php 

include_once "dao/conexao.php";

$dataBoletim = $_POST['dataBoletim'];
$idAluno = $_POST["idAluno"];




    
  
    $sql = "INSERT INTO boletim (dataBoletim,idAluno)VALUES('$dataBoletim','$idAluno')";
    
if($con->query($sql) === true){

    $query = mysqli_query($con, "SELECT Max(idBoletim)  AS codigo FROM boletim");
  $result = mysqli_fetch_array($query);
  
  $idBoletim = $result['codigo'];

    if (isset($_FILES['srcBoletim'] )){

    
    
        $extensao1 = strtolower(substr($_FILES['srcBoletim']['name'], -4));
        
    
        $novo_nome1 = "Boletim-".$idBoletim.".".$extensao1; //define o nome do arquivo
     
    
        $diretorio ="boletim/"; 
        
        move_uploaded_file($_FILES['srcBoletim']['tmp_name'], $diretorio.$novo_nome1);
        
    
    
    $sql5 = "UPDATE  boletim SET srcBoletim = '$novo_nome1' where idBoletim ='$idBoletim'"; 
    
     if($con->query($sql5)===true){
        echo "<script>alert('Boletim cadastrada com sucesso!');window.location='cadastrar_boletim.php'</script>";
        
        }else{
            echo "Erro para inserir: " . $con->error;
            die();
        }
    }

}else{
    echo "Erro para inserir: " . $con->error;
    die();
}

$con->close();

?>