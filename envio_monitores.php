<?php 

include_once "dao/conexao.php";

$nomeMonitor = $_POST["nomeMonitor"];
$dtNascimento = $_POST["dtNascimento"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$cep = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$idPolo = $_POST["idPolo"];
$tipoAcesso = $_POST['tipoAcesso'];


$sql = "INSERT INTO monitor ( nomeMonitor, dtNascimento, cpf, email, telefone, celular, cep, rua, numero, 
bairro, estado, cidade, idPolo) VALUES ('$nomeMonitor', '$dtNascimento', '$cpf', '$email', '$telefone', '$celular', '$cep',
 '$rua', '$numero', '$bairro', '$estado', '$cidade', $idPolo )";

  

if ($con->query($sql) === TRUE){

    $query = mysqli_query($con, "SELECT Max(idMonitor)  AS codigo FROM monitor");
    $result = mysqli_fetch_array($query);

$idMonitor = $result['codigo'];

$sql2 = "INSERT INTO usuario (nomeUsuario, userAcesso, senha, idMonitor,tipoAcesso) VALUES ('$nomeMonitor', '$cpf', '$cpf','$idMonitor','$tipoAcesso' )";
if ($con->query($sql2) === TRUE)
echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_monitores.php'</script>";
else 
    echo "Erro para inserir: " . $con->error; 
} else {
echo "Erro para inserir: " . $con->error;
}
	
$con->close();

?>