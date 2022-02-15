<?php 
include_once "conexao.php";

session_start();
$usuario = $_POST['user'];
$senha = $_POST['senha'];



$sql = "SELECT * FROM usuario WHERE userAcesso = '$usuario' and senha = '$senha'  ";
	
$res = $con->query($sql);
$linha = $res->fetch_assoc();
	
$id = $linha['idUsuario'];
	$nome = $linha['nomeUsuario'];
    $user = $linha['userAcesso'];
    $senha_db = $linha['senha'];
	$idMonitor = $linha['idMonitor'];
	$idAluno = $linha['idAluno'];	
	$tipoAcesso = $linha['tipoAcesso'];
    $idCidade = $linha['idCidade'];	
    

    if ($usuario == $user && $senha ==$senha_db  )
    {
        session_start();
        $_SESSION['idUsuario'] = $id;
        $_SESSION['nomeUsuario'] = $nome;
		$_SESSION['idMonitor'] = $idMonitor;
		$_SESSION['idAluno'] = $idAluno;
        $_SESSION['userAcesso'] = $user;
        $_SESSION['tipoAcesso'] = $tipoAcesso;
        $_SESSION['idCidade'] = $idCidade;
        $_SESSION['projoc'] = true;
	header('location: ../pagina_principal.php');
    }
else 
{
	echo "<script>alert('Usuário ou senha incorreta !');window.location='../login.php'</script>";
}

?>