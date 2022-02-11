<?php 

include_once "dao/conexao.php";

$nomeCidade = $_POST['nomeCidade'];

$selec_cidade = mysqli_query($con,"SELECT * FROM cidade where nomeCidade = '$nomeCidade'");

if(mysqli_num_rows($selec_cidade) < 1){
$con->query("INSERT INTO cidade (nomeCidade)VALUES('$nomeCidade')");

echo "<script>window.location='pagina_principal.php'</script>";
}else{
    echo "<script>window.location='pagina_principal.php'</script>";
}