<?php
include_once "dao/conexao.php";
include_once "header.php";
if ($_SESSION['monitor']  != 0) {
    echo "<script>alert('Você não tem acesso ao cadastro de funcionários!');window.location='index.php'</script>";
}

?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Start Content -->
                            <div class="card-title">Cadastro de Administrativo</div>
                        </div>
                        <form class="form-horizontal style-form" id="cadUsuario" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                                <input type="text" class="form-control" name="nome" required="required">
                            </div>



                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">CPF</label>
                                <input type="text" class="form-control" name="cpf" required="required" onkeyup="mascara('###.###.###-##',this,event,true)">
                            </div>


                            <div class="card-action">
                                <button type="submit" class="btn btn-danger" onClick="window.location.href='Index.php'">Cancelar</button>

                                <button type="submit" class="btn btn-theme">Cadastrar</button>
                            </div>
                        </form>
                        <!-- End Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="js/states.js"></script>
<script src="js/mascaras.js"></script>

<script>
    $(document).ready(function() {
        $("#cadUsuario").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                method: "POST",
                url: "envio_cadastro_administrativo.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response){
                        alert("Enviado com sucesso");
                        location.reload();
                    }else{
                        alert("Não foi possivel");
                        location.reload();
                    }
                      
                    
                }
            })
        });
    });
</script>

<?php
include_once "footer.php";
?>