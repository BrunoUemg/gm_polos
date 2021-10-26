
<?php
 include_once "dao/conexao.php";

 

 $idEncontros = $_POST['idEncontro'];
 $idMonitor = $_POST['idMonitor'];
 session_start();
 if($_SESSION['idMonitor'] != 0){
 $result_consultaJovem = "SELECT E.idEncontro,
 E.nomeEncontro,
 E.descricao,
 E.dt,
 E.horaInicio,
 E.horaFinal,
 E.idPolo,
 M.idPolo,
 M.idMonitor,
 A.idAluno,
 A.nomeAluno,
 A.idPolo,
 A.status,
 A.dtNascimento
 from monitor M, encontro E, aluno A
 where M.idMonitor = '$idMonitor'  and A.idPolo = E.idPolo and M.idPolo = A.idPolo and  E.idPolo = M.idPolo and A.status = 1 and E.idEncontro = $idEncontros   ";
$resultado_consultaJovem = mysqli_query($con, $result_consultaJovem);
 }
 else{
	$resultado_consultaJovem = mysqli_query($con,"SELECT A.nomeAluno,A.dtNascimento, A.idAluno, E.idEncontro, P.idPolo FROM aluno A INNER JOIN polo P ON P.idPolo = A.idPolo INNER JOIN encontro E ON E.idPolo = P.idPolo where E.idEncontro = $idEncontros");
 }

$data = date("Y-m-d");
$sql6 = $con->query(" SELECT * FROM  lista_chamda where  dataChamada = '$data' and idEncontro = '$idEncontros'");

if(mysqli_num_rows($sql6) > 0){
  echo "<script>alert('Chamada já registrada!');window.location='chamada_alunos.php?idEncontro=$idEncontros'</script>";
}else{
 while ($rows_consultaJovem = mysqli_fetch_assoc($resultado_consultaJovem)) {
 
  
$sql5 = "INSERT INTO lista_chamda (idAluno, presenca, dataChamada, idMonitor , idEncontro, idPolo ) VALUES ('$rows_consultaJovem[idAluno]', 0,'$data','$idMonitor',
'$rows_consultaJovem[idEncontro]',' $rows_consultaJovem[idPolo]'  )";



if($con->query($sql5)=== true){ 
    echo "<script>alert('Chamada feita com sucesso!');window.location='chamada_alunos.php?idEncontro=$idEncontros'</script>";
  } else {
       echo "Erro para inserir: " . $con->error; }
  
	   
	
	 
	   if(isset($_POST['pres'])){
	   $a['pres'] =  $_POST['pres'];
	 
	 foreach($a['pres'] as $valor){
		for ($controle = 0; $controle < $valor; $controle++){
			$sql = "UPDATE lista_chamda set presenca = 1 where idAluno = $valor and idEncontro = '$idEncontros' ";
		}
		if($con->query($sql) === true){
		
		}
		}
	}
	}
		

}
$con->close();

?>