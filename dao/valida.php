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
	$nivelAcesso = $linha['nivelAcesso'];	
		
    

    if ($usuario == $user && $senha ==$senha_db  )
    {
        session_start();
        $_SESSION['idUsuario'] = $id;
        $_SESSION['nomeUsuario'] = $nome;
		$_SESSION['nivelAcesso'] = $acesso;
		
		$_SESSION['userAcesso'] = $user;
	header('location: ../pagina_principal.php');
    }
else 
{
	echo "<script>alert('Usuário ou senha incorreta !');window.location='../login.php'</script>";
}

?>