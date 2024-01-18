<?php

include_once "conexao.php";
session_start();
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$nomeAluno = $_POST["nomeAluno"];
$dtNascimento = $_POST["dtNascimento"];
$sexo = $_POST["sexo"];
$nomePai = $_POST["nomePai"];
$nomeMae = $_POST["nomeMae"];
$enderecoResidencial = $_POST["enderecoResidencial"];
$bairro = $_POST["bairro"];
$telefoneContato = $_POST["telefoneContato"];
$idPolo = $_POST["idPolo"];
$escola = $_POST["escola"];
$anoEscola = $_POST["anoEscola"];
$turnoEscola = $_POST["turnoEscola"];
$turmaEscola = $_POST["turmaEscola"];
$dtMatricula = date("d/m/Y");
$numeroEndereco = $_POST["numeroEndereco"];
$telefoneAluno = $_POST["telefoneAluno"];
$telefoneResponsavel = $_POST["telefoneResponsavel"];
$cep = $_POST["cep"];
$token = $_POST['token'];
$idCidade = $_POST['idCidade'];
$cpfAluno = $_POST['cpfAluno'];
$rgAluno = $_POST['rgAluno'];
$cpfResponsavel = $_POST['cpfResponsavel'];
$rgResponsavel = $_POST['rgResponsavel'];

$tipoSanguineo = $_POST['tipoSanguineo'];
$fatorRh = $_POST['fatorRh'];
$emergenciasMedicas = $_POST['emergenciasMedicas'];
$telefoneEmergencia = $_POST['telefoneEmergencia'];
$avisarEmergencia = $_POST['avisarEmergencia'];
$permicao = $_POST['permicao'];
$medContinuos = $_POST['medContinuos'];
$nomeMedicamento = $_POST['nomeMedicamento'];
$equipamentosAuxilio = $_POST['equipamentosAuxilio'];
$oculos = $_POST['oculos'];
$aparelhoDentario = $_POST['aparelhoDentario'];
$marcapasso = $_POST['marcapasso'];
$sonda = $_POST['sonda'];
$aparelhoAudicao = $_POST['aparelhoAudicao'];
$lentesContato = $_POST['lentesContato'];
$alergia = $_POST['alergia'];
$picadaInseto = $_POST['picadaInseto'];
$alergiaMedicamentos = $_POST['alergiaMedicamentos'];
$plantas = $_POST['plantas'];
$alimentos = $_POST['alimentos'];
$outraAlergia = $_POST['outraAlergia'];
$outraAlergiaDesc = $_POST['outraAlergiaDesc'];
$nadar = $_POST['nadar'];
$cardiaco = $_POST['cardiaco'];
$restricoesAlimentos = $_POST['restricoesAlimentos'];
$planoMedico = $_POST['planoMedico'];
$numCarteira = $_POST['numCarteira'];
$distubioComportamento = $_POST['distubioComportamento'];

$select_validade = mysqli_query($con, "SELECT * FROM validade_cadastro where token = '$token'");
$linha_validade = mysqli_fetch_array($select_validade);

if ($linha_validade['quantidadeMax'] == $linha_validade['quantidadeCadastro']) {
    $_SESSION['msg'] = ' <div class="alert alert-danger text-center" role="alert"> <p> Esse link atingiu o máximo de cadastro, solicite um novo link! </div> </p> ';
    echo "<script>window.location='../cadastro.php?tkd=$token'</script>";
    exit();
}

$confirma = $con->query("INSERT INTO aluno (nomeAluno, dtNascimento, sexo, nomePai, nomeMae, enderecoResidencial, bairro, telefoneContato, idPolo, escola, anoEscola, turmaEscola, turnoEscola, dtMatricula, numeroEndereco, telefoneAluno, telefoneResponsavel, status, cep, idCidade, cpfAluno, rgAluno, cpfResponsavel, rgResponsavel, tipoSanguineo, fatorRh, emergenciasMedicas, telefoneEmergencia, avisarEmergencia, permicao, medContinuos, equipamentosAuxilio, oculos, aparelhoDentario, marcapasso, sonda, aparelhoAudicao, lentesContato, alergia, picadaInseto, alergiaMedicamentos, plantas, alimentos, outraAlergia, outraAlergiaDesc, nadar, cardiaco, restricoesAlimentos, planoMedico, numCarteira, distubioComportamento)
VALUES ('$nomeAluno', '$dtNascimento', '$sexo', '$nomePai', '$nomeMae', '$enderecoResidencial', '$bairro', '$telefoneContato', '$idPolo', '$escola', '$anoEscola', '$turmaEscola', '$turnoEscola', '$dtMatricula', '$numeroEndereco', '$telefoneAluno', '$telefoneResponsavel', 1, '$cep', '$idCidade', '$cpfAluno', '$rgAluno', '$cpfResponsavel', '$rgResponsavel', '$tipoSanguineo', '$fatorRh', '$emergenciasMedicas', '$telefoneEmergencia', '$avisarEmergencia', '$permicao', '$medContinuos', '$equipamentosAuxilio', '$oculos', '$aparelhoDentario', '$marcapasso', '$sonda', '$aparelhoAudicao', '$lentesContato', '$alergia', '$picadaInseto', '$alergiaMedicamentos', '$plantas', '$alimentos', '$outraAlergia', '$outraAlergiaDesc', '$nadar', '$cardiaco', '$restricoesAlimentos', '$planoMedico', '$numCarteira', '$distubioComportamento')");
$quantidadeNova = $linha_validade['quantidadeCadastro'] + 1;

$update = $con->query("UPDATE validade_cadastro set quantidadeCadastro = '$quantidadeNova' where token = '$token'");

$query = mysqli_query($con, "SELECT Max(idAluno)  AS codigo FROM aluno");
$result = mysqli_fetch_array($query);

$idAluno = $result['codigo'];

$sql_documentos = "SELECT * FROM documentos";
$sql_resultado_documento = mysqli_query($con, $sql_documentos);

while ($rows_documentos = mysqli_fetch_assoc($sql_resultado_documento)) {

    $variavelDocumento = $rows_documentos['variavelDocumento'];
    $nomeDocumento = $rows_documentos['nomeDocumento'];
    if (!empty($_FILES[$variavelDocumento]["name"])) {
        $pasta_arquivo = "digitalizados/";


        $formatos = array("png", "jpeg", "jpg", "pdf", "PNG", "JPEG", "JPG");
        $extensao = pathinfo($_FILES[$variavelDocumento]['name'], PATHINFO_EXTENSION);

        if (in_array($extensao, $formatos)) {
            $pasta = "../digitalizados/";
            $temporario = $_FILES[$variavelDocumento]['tmp_name'];
            $novo_nome = $idAluno . "-" . $variavelDocumento . "." . $extensao; //define o nome do arquivo

            if (move_uploaded_file($temporario, $pasta . $novo_nome)) {
                $con->query("INSERT INTO repositorio_aluno (idAluno,srcDocumento,descricao)VALUES('$idAluno','$novo_nome','$nomeDocumento')");
            }
        } else {
            echo "Erro para inserir: " . $con->error;
        }
    } else {
        echo "n existe";
    }
}

$con->query("INSERT INTO processamento_cadastro (etapa,status,idAluno)VALUES('Continuação cadastro',0,'$idAluno')");

if ($confirma === true) {
    $_SESSION['msg'] = ' <div class="alert alert-success text-center" role="alert"> <p> Cadastrado com sucesso! </div> </p> ';
    echo "<script>window.location='../cadastro.php?tkd=$token'</script>";
    exit();
} else {
    echo "<script>alert('Erro, entre em contato com o suporte!');window.location='../cadastro.php?tkd=$token'</script>";
    exit();
}
