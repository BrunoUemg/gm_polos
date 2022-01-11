<?php
include_once "dao/conexao.php";
include_once "header.php";

$result_Polo = "SELECT * FROM polo where status = 1";
$resultado_Polo = mysqli_query($con, $result_Polo);

$result_Escola = "SELECT * FROM escola ";
$resultado_Escola = mysqli_query($con, $result_Escola);

$result_profissao = "SELECT * FROM profissao ";
$resultado_profissao = mysqli_query($con, $result_profissao);



$result_documentos = "SELECT * FROM documentos  ORDER BY nomeDocumento ";
$resultado_documentos = mysqli_query($con, $result_documentos);

$result_documentos2 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos2 = mysqli_query($con, $result_documentos2);

$result_documentos3 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos3 = mysqli_query($con, $result_documentos3);

$result_documentos4 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos4 = mysqli_query($con, $result_documentos4);

$result_documentos5 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos5 = mysqli_query($con, $result_documentos5);

$result_documentos6 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos6 = mysqli_query($con, $result_documentos6);

$result_documentos7 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos7 = mysqli_query($con, $result_documentos7);

$result_documentos8 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos8 = mysqli_query($con, $result_documentos8);

$result_documentos9 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos9 = mysqli_query($con, $result_documentos9);

$result_documentos10 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos10 = mysqli_query($con, $result_documentos10);

$result_documentos11 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos11 = mysqli_query($con, $result_documentos11);

$result_documentos12 = "SELECT * FROM documentos ORDER BY nomeDocumento ";
$resultado_documentos12 = mysqli_query($con, $result_documentos12);

$query = mysqli_query($con, "SELECT Max(cpfIntegrante_composicao)  AS codigo FROM composicao_familiar WHERE status = 0 ");
$result = mysqli_fetch_array($query);

$cpfIntegrante_composicao = $result['codigo'];

$result_consultaComposicao = "SELECT C.idComposicao_familiar,
C.idAluno,
C.nomeIntegrante,
C.renda,
C.parentesco,
C.profissao,
C.escolaridade,
C.idade,
C.estadoCivil,
C.cpfIntegrante_composicao,
C.status

from composicao_familiar C
where  C.status = 0  ";
$resultado_consultaComposicao = mysqli_query($con, $result_consultaComposicao);

$res = $con->query($result_consultaComposicao);
$linha = $res->fetch_assoc();




?>



<!DOCTYPE html>

<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/jquery.steps.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    a {
        text-decoration: none;

    }
</style>
<form id="cad_projeto" method="post" action="envio_cadastro_aluno_inicial.php" enctype="multipart/form-data">
    <div>








        <h3>Informações Pessoais</h3>
        <section>

            <center>
                <h3>Informações Pessoais</h3>
            </center>

            <div class="row">

                <div class="form-group col-md-8">
                    <label>Nome Completo </label>
                    <input class="form-control" maxlength="100" name="nomeAluno" required="required" type="text">
                    <input class="form-control" maxlength="100" hidden name="cadastrar_aluno" required="required" value="1" type="text">
                </div>


                <div class="form-group col-md-4">
                    <label>Data de Nascimento</label>
                    <input class="form-control" name="dtNascimento" required="required" type="text" onkeyup="mascara('##/##/####',this,event,true)">
                </div>
                <div class="form-group col-md-4">
                    <label>Telefone Jovem</label>
                    <input class="form-control" maxlength="100" name="telefoneAluno" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
                </div>
                <div class="form-group col-md-4">
                    <label>Sexo</label>
                    <Select class="form-control" name="sexo" maxlength="20" required="required" type="">
                        <option>Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
            </div>



            <div class="row">

                
                <div class="form-group col-md-6">
                    <label>Nome Pai </label>
                    <input class="form-control" maxlength="50" name="nomePai" type="text">
                </div>

                <div class="form-group col-md-6">
                    <label>Nome Mãe</label>
                    <input class="form-control" maxlength="50" name="nomeMae" type="text" required="required">
                </div>
                <div class="form-group col-md-4">
                    <label>Telefone residencial</label>
                    <input class="form-control" maxlength="100" name="telefoneContato" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
                </div>
                <div class="form-group col-md-4">
                    <label>Telefone responsável</label>
                    <input class="form-control" maxlength="100" name="telefoneResponsavel" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
                </div>



            </div>


            <center>
                <h3>Endereço</h3>
            </center>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep"  onkeyup="mascara('##.###-###',this,event,true)">
                </div>

                <div class="form-group col-md-6">
                    <label>Endereço Residencial</label>
                    <input class="form-control" maxlength="100" name="enderecoResidencial" id="rua" required="required" type="text">
                </div>

                <div class="form-group col-md-4">
                    <label>Bairro</label>
                    <input class="form-control" maxlength="60" name="bairro" id="bairro" required="required" type="text">
                </div>

                <div class="form-group col-md-4">
                    <label>Número</label>
                    <input class="form-control" maxlength="10" name="numeroEndereco" required="required" type="text">
                </div>


               

            </div>


            <center>
                <h3>Dados para matrícula</h3>
            </center>

            <div class="row">

                <div class="form-group col-md-4">
                    <label>Data da Matrícula</label>
                    <input class="form-control" name="dtMatricula" required="required" type="text" onkeyup="mascara('##/##/####',this,event,true)">
                </div>

                <div class="form-group col-md-4">
                    <label for="">Nome escola</label>
                    <select class="form-control" name="escola" required="required">

                        <option>Selecione a Escola</option>
                        <?php while ($rows_Escola = mysqli_fetch_assoc($resultado_Escola)) { ?>

                            <option value="<?php echo $rows_Escola['nomeEscola']; ?>"><?php echo ($rows_Escola['nomeEscola']); ?></option>

                        <?php } ?>

                    </select>
                </div>

                

              


                <div class="form-group col-md-4">
                    <label for="">Pelotão do Aluno</label>
                    <select class="form-control" name="idPolo" required="required">

                        <option>Selecione o pelotão</option>
                        <?php while ($rows_Polo = mysqli_fetch_assoc($resultado_Polo)) { ?>

                            <option value="<?php echo $rows_Polo['idPolo']; ?>"><?php echo ($rows_Polo['nomePolo']); ?></option>

                        <?php } ?>

                    </select>
                </div>
               

            </div>

            <div class="modal fade" id="carregar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Por favor aguarde carregamento...</h5>

                        </div>
                        <div class="modal-body">
                            <div class="progress">
                                <div class="progress-bar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>



        </section>










    </div>
</form>

<div class="modal fade" id="Modalvisu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Composição Familiar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <?php
                $result_profissao = "SELECT * FROM profissao ";
                $resultado_profissao = mysqli_query($con, $result_profissao); ?>


                <form action="cadastrar_alunos.php" method="POST">
                    <label for="">CPF do Integrante</label>
                    <input type="text" name="cpfIntegrante_composicao" class="form-control" onkeyup="mascara('###.###.###-##',this,event,true)">

                    <label for="">Nome integrante</label>
                    <input type="text" name="nomeIntegrante" class="form-control">

                    <label for="">Renda</label>
                    <input type="text" name="renda" class="form-control" maxlength="5">

                    <label for="">Idade</label>
                    <input type="number" name="idade" class="form-control">

                    <label for="">Parentesco</label>

                    <select class="form-control" name="parentesco" id="">
                        <option value="">Selecione</option>
                        <option value="Pai">Pai</option>
                        <option value="Mãe">Mãe</option>
                        <option value="Filho">Filho</option>
                        <option value="Irmão">Irmão</option>
                        <option value="Irmã">Irmã</option>
                        <option value="Avó">Avó</option>
                        <option value="Avô">Avô</option>
                        <option value="Tio">Tio</option>
                        <option value="Tia">Tia</option>
                        <option value="Primo">Primo</option>
                        <option value="Prima">Prima</option>
                        <option value="Bisavó">Bisavó</option>
                        <option value="Bisavô">Bisavô</option>
                    </select>

                    <label>Escolaridade</label>
                    <select class="form-control" name="escolaridade" id="">
                        <option>Selecione</option>
                        <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                        <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                        <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                        <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                        <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                        <option value="Ensino Superior Completo">Ensino Superior Completo</option>

                    </select>


                    <label for="">Profissão</label>
                    <select class="form-control" name="profissao" required="required">

                        <option>Selecione a Profissão</option>
                        <?php while ($rows_profissao = mysqli_fetch_assoc($resultado_profissao)) { ?>

                            <option value="<?php echo $rows_profissao['nomeProfissao']; ?>"><?php echo ($rows_profissao['nomeProfissao']); ?></option>

                        <?php } ?>

                    </select>

                    <label for="">Estado Civil</label>

                    <select class="form-control" name="estadoCivil" id="">
                        <option value="Nenhum">Selecione</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Viúvo(a)">Viúvo(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>

                    </select>


            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                </form>

            </div>
        </div>
    </div>
</div>




<script src="js/mascaras.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/jquery.steps.js"></script>
<script src="js/script.js"></script>
<script src="js/states.js"></script>

<script>
    $(document).on('submit', 'form', function(e) {
        e.preventDefault();
        //Receber os dados
        $form = $(this);
        var formdata = new FormData($form[0]);

        //Criar a conexao com o servidor
        var request = new XMLHttpRequest();

        //Progresso do Upload
        $('#carregar').modal('show');
        request.upload.addEventListener('progress', function(e) {
            var percent = Math.round(e.loaded / e.total * 100);
            $form.find('.progress-bar').width(percent + '%').html(percent + '%');
        });

        //Upload completo limpar a barra de progresso
        request.addEventListener('load', function(e) {
            $form.find('.progress-bar').addClass('progress-bar-success').html('upload completo...');
            //Atualizar a página após o upload completo
            setTimeout("window.open(self.location, '_self');", 1000);
        });

        //Arquivo responsável em fazer o upload da imagem
        request.open('post', 'envio_cadastro_aluno_inicial.php');
        request.send(formdata);
    });
</script>

<style>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif') 50% 40% no-repeat transparent;
        border-color: transparent;
    }
</style>
<div id="loader" class="loader"></div>
<script>
    window.onload = function() {
        $(".loader").fadeOut("slow");
    };
</script>




<script>
    function disableTxt() {
        document.getElementById("myText").disabled = true;
        document.getElementById("myText").value = "Não possui";
    }




    function undisableTxt() {
        document.getElementById("myText").disabled = false;
    }
</script>

<script language="javascript">
    function moeda(a, e, r, t) {
        let n = "",
            h = j = 0,
            u = tamanho2 = 0,
            l = ajd2 = "",
            o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
        for (l = ""; h < u; h++)
            -
            1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "0" + r + "0" + l),
            2 == u && (a.value = "0" + r + l),
            u > 2) {
            for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                    j = 0),
                ajd2 += l.charAt(h),
                j++;
            for (a.value = "",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }
</script>





<?php
include_once("footer.php");

?>