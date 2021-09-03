<style>
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif') 50% 50% no-repeat white;
	}
</style>
<div id="loader" class="loader"></div>
<script>
	window.onload = function(){
		$(".loader").fadeOut("slow");
	};
</script>
<?php 

include_once "dao/conexao.php";
session_start();
$nomeAluno = $_POST["nomeAluno"];
$dtNascimento = $_POST["dtNascimento"];
$sexo = $_POST["sexo"];
$nomePai = $_POST["nomePai"];
$profissaoPai = $_POST["profissaoPai"];
$nomeMae = $_POST["nomeMae"];
$profissaoMae = $_POST["profissaoMae"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$telefoneContato = $_POST["telefoneContato"];
$idPolo = $_POST["idPolo"];
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$turnoEscola = $_POST["turnoEscola"];
$nacionalidadeAluno = $_POST["nacionalidadeAluno"];
$nacionalidadeResponsavel = $_POST["nacionalidadeResponsavel"];
$rgAluno = $_POST["rgAluno"];
$cpfAluno = $_POST["cpfAluno"];
$rgResponsavel = $_POST["rgResponsavel"];
$cpfResponsavel = $_POST["cpfResponsavel"];
$dtMatricula = $_POST["dtMatricula"];
$numeroEndereco = $_POST["numeroEndereco"];
$graduacao = $_POST['graduacao'];
$dataInicioGraduacao = $_POST['dataInicioGraduacao'];

if(isset($_POST['cadastrar_aluno'])){
  $select = mysqli_query($con, "SELECT * FROM aluno where cpfAluno = '$cpfAluno'");

  if(mysqli_num_rows($select) > 1){
    echo "<script>alert('Jovem ja cadastrado!');window.location='cadastrar_alunos.php'</script>";
    exit();
  }
}


$con->query("INSERT INTO aluno ( nomeAluno, dtNascimento, nomePai, profissaoPai, nomeMae, profissaoMae, sexo, enderecoResidencial, bairro, idPolo, telefoneContato, escola, anoEscola, turmaEscola, turnoEscola,
nacionalidadeAluno, nacionalidadeResponsavel, rgAluno, cpfAluno, rgResponsavel, cpfResponsavel, dtMatricula, status, numeroEndereco, graduacao ) VALUES ('$nomeAluno', '$dtNascimento', '$nomePai', '$profissaoPai', '$nomeMae', '$profissaoMae', 
'$sexo', '$enderecoResidencial', '$bairro', '$idPolo', '$telefoneContato','$escola', '$anoEscola', '$turmaEscola', '$turnoEscola',
'$nacionalidadeAluno', '$nacionalidadeResponsavel', '$rgAluno', '$cpfAluno', '$rgResponsavel', '$cpfResponsavel','$dtMatricula', 1, '$numeroEndereco', '$graduacao' )");





  $query = mysqli_query($con, "SELECT Max(idAluno)  AS codigo FROM aluno");
  $result = mysqli_fetch_array($query);
  
  $idAluno = $result['codigo'];
  
  
    
  $sql_documentos = "SELECT * FROM documentos";
  $sql_resultado_documento = mysqli_query($con, $sql_documentos);
  
  while($rows_documentos = mysqli_fetch_assoc($sql_resultado_documento)){ 
    
    $variavelDocumento = $rows_documentos['variavelDocumento'];
    $nomeDocumento = $rows_documentos['nomeDocumento'];
    if(!empty($_FILES[$variavelDocumento]["name"])){
      $pasta_arquivo = "digitalizados/";
      
      
      $formatos = array("png","jpeg","jpg","pdf","PNG","JPEG","JPG");
      $extensao = pathinfo($_FILES[$variavelDocumento]['name'], PATHINFO_EXTENSION);
      
      if(in_array($extensao, $formatos)){
        $pasta = "digitalizados/";
        $temporario = $_FILES[$variavelDocumento]['tmp_name'];
        $novo_nome = $idAluno."-".$variavelDocumento.".".$extensao; //define o nome do arquivo
      
        if(move_uploaded_file($temporario, $pasta.$novo_nome)){
        $con->query("INSERT INTO repositorio_aluno (idAluno,srcDocumento,descricao)VALUES('$idAluno','$novo_nome','$nomeDocumento')");
        }
      }
      else {
         echo "Erro para inserir: " . $con->error; }
      }
  } 
   
    
   
  
  $con->query("INSERT INTO historico_graduacao (graduacao, idAluno, dataInicio)VALUES('$graduacao', '$idAluno', '$dataInicioGraduacao')");
  

$sql7 = "INSERT INTO movimentacao (dataMovimentacao, descricao,idAluno) VALUES ('$dtMatricula', 'Matricula do Aluno', '$idAluno' )";


if ($con->query($sql7)=== TRUE ){


$con->query("INSERT INTO processamento_cadastro (etapa, status, idAluno)VALUES('Finalização', '0', '$idAluno')");


  } 
  
 
 

else{
	echo "Erro para inserir: " . $con->error; 

}



 

$sql8 = " INSERT INTO usuario (nomeUsuario, userAcesso, senha,idAluno) VALUES ('$nomeAluno', '$cpfAluno', '$cpfAluno', '$idAluno')";
if ($con->query($sql8)=== TRUE ){


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
    
  } else {
       echo "Erro para inserir: " . $con->error; }

  }


}
else{
	echo "Erro para inserir: " . $con->error; 

}


echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastrar_alunos.php'</script>";

?>

<style>
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif') 50% 50% no-repeat white;
	}
</style>
<div id="loader" class="loader"></div>
<script>
	window.onload = function(){
		$(".loader").fadeOut("slow");
	};
</script>