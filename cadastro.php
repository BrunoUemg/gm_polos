<?php

include_once "dao/conexao.php";

session_start();

$token = $_GET['tkd'];
$select_validade = mysqli_query($con, "SELECT * FROM validade_cadastro where token = '$token'");
$linha_validade = mysqli_fetch_array($select_validade);

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$result_documentos = "SELECT * FROM documentos  ORDER BY nomeDocumento ";
$resultado_documentos = mysqli_query($con, $result_documentos);

$data_hoje = date("Y-m-d");
$hora_hoje = date("H:i:s");

?>

<head>
    <meta charset="UTF-8" />
    <title>GM POLO - Cadastro Inicial</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="img/logo.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/atlantis.min.css">
    <link rel="stylesheet" href="css/select2.min.css" />
    <link rel="stylesheet" href="css/select2-bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap4.min.css">


    <script src="jquery/jquery.min.js"></script>
    <script src="js/select2.min.js"></script>

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body class="d-flex justify-content-center align-items-center" style="background: #1A2035">
    <div class="container-fluid pt-5 pb-5 d-flex justify-content-center align-items-center" style="background: #1A2035">
        <div class="container h-100">
            <div class="row p-2">
                <div class="col form-group  d-flex justify-content-center align-items-center">
                    <img src="img/logo.png" alt="">
                </div>
            </div>

            <?php
            if ($linha_validade['token'] != null) {
                $dataCompara = strtotime($data_hoje . $hora_hoje);
                $dataVence = strtotime($linha_validade['dataFinal'] . $linha_validade['horaFinal']);
                if ($dataCompara <=  $dataVence) {
                    if (!empty($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    } else {
            ?>
                        <form action="dao/envio_cadastro.php" method="POST" enctype="multipart/form-data">
                            <div class="row w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <?php
                                        if ($linha_validade['quantidadeCadastro'] == $linha_validade['quantidadeMax']) {
                                            echo  '<div class="alert alert-danger" role="alert"> <p> Não será possível realizar o cadastro, pois atingiu a quantidade máxima, solicite um novo link com a administração! </div> </p> ';
                                        }
                                        ?>
                                        <center>
                                            <H3>Dados pessoais</H3>
                                        </center>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label>Nome Completo </label>
                                            <input class="form-control" maxlength="100" hidden name="token" required="required" value="<?php echo $token ?>" type="text">
                                            <input class="form-control" maxlength="100" name="nomeAluno" required="required" type="text">
                                            <input class="form-control" maxlength="100" hidden name="cadastrar_aluno" required="required" value="1" type="text">
                                            <input class="form-control" maxlength="100" hidden name="idCidade" required="required" value="<?php echo $linha_validade['idCidade'] ?>" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label>Data de Nascimento</label>
                                            <input class="form-control" name="dtNascimento" required="required" type="text" placeholder="DD/MM/AAAA" onkeyup="mascara('##/##/####',this,event,true)">
                                        </div>
                                        <div class="col form-group">
                                            <label>Telefone Jovem</label>
                                            <input class="form-control" maxlength="100" name="telefoneAluno" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
                                        </div>
                                        <div class="col form-group">
                                            <label>Sexo</label>
                                            <Select class="form-control" name="sexo" maxlength="20" required="required" type="">
                                                <option>Selecione</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="">CPF do aluno</label>
                                            <input class="form-control" name="cpfAluno" maxlength="15" required="required" type="text" onkeyup="mascara('###.###.###-##',this,event,true)" value="">
                                        </div>
                                        <div class="col form-group">
                                            <label>RG Aluno (não obrigatório)</label>
                                            <input class="form-control" name="rgAluno" maxlength="40" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label>CPF Responsavel</label>
                                            <input class="form-control" maxlength="100" name="cpfResponsavel" required="required" type="text" onkeyup="mascara('###.###.###-##',this,event,true)">
                                        </div>
                                        <div class="col form-group">
                                            <label>RG Responsavel</label>
                                            <input class="form-control" maxlength="40" name="rgResponsavel" required="required" type="text">
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col form-group">
                                            <label>Nome Pai </label>
                                            <input class="form-control" maxlength="50" name="nomePai" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label>Nome Mãe</label>
                                            <input class="form-control" maxlength="50" name="nomeMae" type="text" required="required">
                                        </div>
                                        <div class="col form-group">
                                            <label>Telefone residencial</label>
                                            <input class="form-control" maxlength="100" name="telefoneContato" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
                                        </div>
                                        <div class="col form-group">
                                            <label>Telefone responsável</label>
                                            <input class="form-control" maxlength="100" name="telefoneResponsavel" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
                                        </div>
                                        <script>
                                            function adicionar() {
                                                if (document.getElementById("check").checked) {
                                                    var telefone = document.getElementById("telefone").value;
                                                    document.getElementById("whats").value = telefone;
                                                } else {
                                                    document.getElementById("whats").value = "";
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <center>
                                            <H3>Endereço</H3>
                                        </center>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label>CEP</label>
                                            <input type="text" class="form-control" id="cep" name="cep" onkeyup="mascara('##.###-###',this,event,true)">
                                        </div>

                                        <div class="col form-group">
                                            <label>Endereço Residencial</label>
                                            <input class="form-control" maxlength="100" name="enderecoResidencial" id="rua" required="required" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label>Bairro</label>
                                            <input class="form-control" maxlength="60" name="bairro" id="bairro" required="required" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label>Número</label>
                                            <input class="form-control" maxlength="10" name="numeroEndereco" required="required" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <center>
                                            <h3>Dados para matrícula</h3>
                                        </center>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Nome escola</label>
                                            <select class="form-control" name="escola" required="required">
                                                <option>Selecione a Escola</option>
                                                <?php
                                                $resultado_escola = mysqli_query($con, "SELECT * FROM escola where idCidade = '$linha_validade[idCidade]'");
                                                while ($rows_Escola = mysqli_fetch_assoc($resultado_escola)) { ?>
                                                    <option value="<?php echo $rows_Escola['nomeEscola']; ?>"><?php echo ($rows_Escola['nomeEscola']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="">Pelotão do Aluno</label>
                                            <select class="form-control" name="idPolo" required="required">
                                                <option>Selecione o pelotão</option>
                                                <?php
                                                $resultado_Polo = mysqli_query($con, "SELECT * FROM polo where status = 1 and idCidade = '$linha_validade[idCidade]'");
                                                while ($rows_Polo = mysqli_fetch_assoc($resultado_Polo)) { ?>
                                                    <option value="<?php echo $rows_Polo['idPolo']; ?>"><?php echo $rows_Polo['nomePolo'] . ' - ' . $rows_Polo['localFuncionamento'] . ' - ' . $rows_Polo['enderecoFuncionamento']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <br>
                                </div>
                            </div>
                            <div class="row w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <center>
                                            <h3>Dados para matrícula</h3>
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables2" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descrição</th>
                                                        <th>Inserir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($rows_documentos = mysqli_fetch_assoc($resultado_documentos)) {
                                                        if ($rows_documentos['obrigatorio'] == 'Sim') {
                                                    ?>

                                                            <tr>
                                                                <td><label for=""><?php echo $rows_documentos['nomeDocumento']; ?></label></td>
                                                                <td><input type="file" name="<?php echo $rows_documentos['variavelDocumento']; ?>" class="form-control" required="required" id="">
                                                                </td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td><label for=""><?php echo $rows_documentos['nomeDocumento']; ?></label></td>
                                                                <td><input type="file" name="<?php echo $rows_documentos['variavelDocumento']; ?>" class="form-control" id=""></td>
                                                            </tr>
                                                    <?php }
                                                    } ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <?php if ($linha_validade['quantidadeCadastro'] == $linha_validade['quantidadeMax']) {
                                            } else {  ?>
                                                <button class="btn btn-default" type="submit" name="enviar">Enviar</button>
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <br>
                                </div>
                            </div>
                        </form>
                    <?php }
                } else { ?>
                    <div class="row w-100">
                        <div class="card">
                            <div class="card-header">
                                <div class="alert alert-danger text-center" role="alert">
                                    Token expirou, entre em contato novamente e solicite um novo link !
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="row w-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-danger text-center" role="alert">
                                Token inexistente !
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>




<script src="js/mascaras.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/jquery.steps.js"></script>
<script src="js/script.js"></script>
<script src="js/states.js"></script>

<script src="js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="jquery/jquery-ui-1.9.2.custom.min.js"></script>
<script src="jquery/jquery.ui.touch-punch.min.js"></script>
<script src="js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="jquery/jquery.dcjqaccordion.2.7.js"></script>
<script src="jquery/jquery.scrollTo.min.js"></script>
<script src="jquery/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jQuery Scrollbar -->
<script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script src="js/plugin/datatables/datatables.min.js"></script>
<!-- Atlantis JS -->
<script src="js/atlantis.min.js"></script>


<script>
    //fazendo requisição no bd
    $(function() {
        $('#idCidade').change(function() {
            if ($(this).val()) {

                $.getJSON('processa_escola.php?search=', {
                        idCidade: $(this).val(),
                        ajax: 'true'
                    },
                    // atribuindo ao input os dados do banco
                    function(j) {
                        var options = '<option value="Concluído">Concluído</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                        }
                        $('#idEscola').html(options).show();
                        $('.carregando').hide();
                    });
            } else {
                $('#idEscola').html('<option value="Concluído">Concluído</option>');

            }
        });
    });
</script>

<style>
    #paiAuxilio div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectAuxilio').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiAuxilio').children('div').hide();
            $('#paiAuxilio').children(selectValor).show();
        });
    });
</Script>
<style>
    #paiAlimento div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectAlimento').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiAlimento').children('div').hide();
            $('#paiAlimento').children(selectValor).show();
        });
    });
</Script>
<style>
    #paiAlergia div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectAlergia').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiAlergia').children('div').hide();
            $('#paiAlergia').children(selectValor).show();
        });
    });
</Script>
<style>
    #paiRemedio div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectRemedio').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiRemedio').children('div').hide();
            $('#paiRemedio').children(selectValor).show();
        });
    });
</Script>
<style>
    #paiEncaminhado div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectEncaminhado').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiEncaminhado').children('div').hide();
            $('#paiEncaminhado').children(selectValor).show();

        });
    });
</Script>
<style>
    #paiPlano div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectPlano').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiPlano').children('div').hide();
            $('#paiPlano').children(selectValor).show();

        });
    });
</Script>
<style>
    #paiOrgao div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#selectOrgao').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#paiOrgao').children('div').hide();
            $('#paiOrgao').children(selectValor).show();
            $("#OutroOrgao").prop('disabled', false);

        });
    });
</Script>

<style>
    #pai3 div {
        display: none;
    }
</style>

<Script>
    $(document).ready(function() {

        $('#select3').on('change', function() {

            var selectValor = '#' + $(this).val();
            $('#pai3').children('div').hide();
            $('#pai3').children(selectValor).show();
        });
    });
</Script>