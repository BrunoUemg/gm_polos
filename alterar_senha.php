<?php
include_once "dao/conexao.php";
session_start();
$senha_atual = $_POST['senha_atual'];
$nova_senha = $_POST['nova_senha'];
$confirma_senha = $_POST['confirma_senha'];

if ($nova_senha == $confirma_senha) {
    $sql = $con->query("SELECT * FROM usuario WHERE userAcesso = '$_SESSION[userAcesso]' AND senha = '$senha_atual'");

    if (mysqli_num_rows($sql) < 1) {
        echo "<script>alert('Senha Incorreta!');window.location='index.php'</script>";
        exit();
    } else {
        !$con->query("UPDATE usuario SET senha = '$nova_senha' WHERE userAcesso = '$_SESSION[userAcesso]'");
        echo "<script>alert('Senha Atualizada com sucesso.');window.location='pagina_principal.php'</script>";
    }
} else {
    echo "<script>alert('Senha e confirmação incorreta!');window.location='pagina_principal.php'</script>";
    exit();
}
