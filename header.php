<?php
include_once "dao/conexao.php";
session_start();
if (isset($_SESSION['projoc'])) {
    //login ok!
} else {
    header('location: ./login.php');
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' .$filename. '"');
    header('Content-Transfer-Encoding; binary');
    header('Accept-Ranges; bytes');
}

$result = mysqli_query($con, "SELECT foto from usuario where idUsuario = '$_SESSION[idUsuario] '");
$resultado_final = mysqli_fetch_array($result);



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>PROJOC</title>
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
	window.onload = function(){
		$(".loader").fadeOut("slow");
	};
</script>

<body data-background-color="white">
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">

                <a href="pagina_principal.php" class="logo">
            <!--        <img src="img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
                    <font color="white"> <strong>PROJOC</strong></font>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="img/logo.png" alt="..." class="avatar-img rounded-circle" title="Perfil">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="<?php echo 'upload/'. $resultado_final['foto'] .'' ?>" alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['nomeUsuario']; ?></h4>
                                             <!--   <p class="text-muted"><?php echo $_SESSION['email']; ?> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="./profile.php">Meu Perfil</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#alterar_senha">Alterar senha</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#alterar_foto">Alterar foto perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="./logout.php">Sair</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="<?php echo 'upload/'. $resultado_final['foto'] .'' ?>" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" aria-expanded="true">
                                <span>
                                    <?php echo $_SESSION['nomeUsuario']; ?>
                                    
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="pagina_principal.php">
                                <i class="fas fa-home"></i>
                                <p>Menu Principal</p>
                            </a>
                        </li>

                        <?php
                        if ($_SESSION['idMonitor'] == 0 && $_SESSION['idAluno'] != 0) {
                            echo '<li class="nav-item">
                            <a data-toggle="collapse" href="#faltas">
                          
                                <p>Minhas presenças </p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="faltas">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="minha_presenca.php">
                                            <span class="sub-item">Consultar</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#historico">
                          
                                <p>Histórico </p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="historico">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="meu_historico.php">
                                            <span class="sub-item">Consultar</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                        <a data-toggle="collapse" href="#tarefas">
                      
                            <p>Tarefas </p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tarefas">
                            <ul class="nav nav-collapse">
                            
                            <li>
                            <a href="tarefas_atribuidas.php">
                                <span class="sub-item">Atribuídas</span>
                            </a>
                        </li>
                            
                            
                            <li>
                                    <a href="tarefas_concluidas.php">
                                        <span class="sub-item">Concluídas</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>

                        <li class="nav-item">
                        <a data-toggle="collapse" href="#boletim">
                      
                            <p>Boletim </p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="boletim">
                            <ul class="nav nav-collapse">
                            
                            <li>
                            <a href="cadastrar_boletim.php">
                                <span class="sub-item">Cadastrar</span>
                            </a>
                        </li>
                            
                            
                          
                               
                            </ul>
                        </div>
                    </li>

                       ';
                        } 

                        if ($_SESSION['idMonitor'] != 0 && $_SESSION['idAluno'] == 0 && $_SESSION['tipoAcesso'] == 'Comandante') {
                            echo '
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#consultas">
                            <i class="fas fa-user"></i>
                                <p>Alunos</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="consultas">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="presenca_alunos.php">
                                            <span class="sub-item">Presença</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="consultar_boletim.php">
                                            <span class="sub-item">Consultar boletim</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                        
                        <li class="nav-item">
                        <a data-toggle="collapse" href="#atividades">
                        <i class="fa fa-address-book"></i>
                            <p>Atividades</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="atividades">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="cadastrar_atividades.php">
                                        <span class="sub-item">Cadastrar</span>
                                    </a>
                                </li>

                                <li>
                                <a href="consultar_atividade.php">
                                    <span class="sub-item">Consultar</span>
                                </a>
                            </li>

                                
                           
                       
                            </ul>
                        </div>
                    </li>
                        
                        <li class="nav-item">
                        <a data-toggle="collapse" href="#cargos">
                            <i class="fas fa-plus-square"></i>
                            <p>Encontros</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cargos">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="consultar_encontros.php">
                                        <span class="sub-item">Ver Encontros</span>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>
                    </li>
                        ';
                        }

                        if ($_SESSION['idMonitor'] != 0 && $_SESSION['idAluno'] == 0 && $_SESSION['tipoAcesso'] == 'Subcomandante') {
                            echo '
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#consultas">
                            <i class="fas fa-user"></i>
                                <p>Alunos</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="consultas">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="presenca_alunos.php">
                                            <span class="sub-item">Presença</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Consultar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                        
                      
                        
                        <li class="nav-item">
                        <a data-toggle="collapse" href="#cargos">
                            <i class="fas fa-plus-square"></i>
                            <p>Encontros</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cargos">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="consultar_encontros.php">
                                        <span class="sub-item">Ver Encontros</span>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>
                    </li>
                        ';
                        }
                        
                        if ($_SESSION['idMonitor'] == 0 && $_SESSION['idAluno'] == 0  )
                        {
                            echo ' 

                        
                           

                            <li class="nav-item">
                                <a data-toggle="collapse" href="#alunos">
                                <i class="fas fa-users"></i>
                                    <p>Alunos</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="alunos">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="cadastro_aluno_inicial.php">
                                                <span class="sub-item">Inicial</span>
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <a href="cadastro_aluno_pendente.php">
                                                <span class="sub-item">Cadastros pendentes</span>
                                            </a>
                                        </li>
    
                                        
                                        <li>
                                            <a href="consultar_alunos.php">
                                                <span class="sub-item">Consultar</span>
                                            </a>
                                        </li>
    
                                        <li>
                                        <a href="alunos_desligados.php">
                                            <span class="sub-item">Desligados</span>
                                        </a>
                                    </li>

                                    <li>
                                    <a href="relatorio_alunos.php">
                                        <span class="sub-item">Relatórios</span>
                                    </a>
                                </li>

                                <li>
                                <a href="consultar_boletim.php">
                                    <span class="sub-item">Consultar Boletim</span>
                                </a>
                            </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                            <a data-toggle="collapse" href="#atividades">
                            <i class="fa fa-address-book"></i>
                                <p>Atividades</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="atividades">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="cadastrar_atividades_gerais.php">
                                            <span class="sub-item">Cadastrar atividades gerais</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cadastrar_atividades.php">
                                            <span class="sub-item">Cadastrar atividades para polo especifico</span>
                                        </a>
                                    </li>

                                    <li>
                                    <a href="consultar_atividade_gerais.php">
                                        <span class="sub-item">Consultar todas</span>
                                    </a>
                                </li>
                                 
    
                                    
                               
                           
                                </ul>
                            </div>
                        </li>




                            <li class="nav-item">
                            <a data-toggle="collapse" href="#consultas">
                            <i class="fas fa-user"></i>
                                <p>Comandantes</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="consultas">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="cadastrar_monitores.php">
                                            <span class="sub-item">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="consultar_monitores.php">
                                            <span class="sub-item">Consultar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>                
                        
                        <li class="nav-item">
                        <a data-toggle="collapse" href="#cargos">
                            <i class="fas fa-plus-square"></i>
                            <p>Encontro</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cargos">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="cadastrar_encontro.php">
                                        <span class="sub-item">Cadastrar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="consultar_encontros.php">
                                        <span class="sub-item">Consultar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                            
                            
                            <li class="nav-item">
                            <a data-toggle="collapse" href="#pacientes">
                            <i class="fas fa-map-marker-alt"></i>
                                <p>PROJOC</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="pacientes">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="cadastrar_polos.php">
                                            <span class="sub-item">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="consultar_polos.php">
                                            <span class="sub-item">Consultar</span>
                                        </a>
                                    </li>
                                    <li>
                                    <a href="polos_desativados.php">
                                        <span class="sub-item">Desativados</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li>
                            <li class="nav-item">
                            <a data-toggle="collapse" href="#rela">
                            <i class="fas fa-file-pdf"></i>
                                <p>Relatórios</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="rela">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="relatorio_geral_aluno.php">
                                            <span class="sub-item">Relatório geral dos alunos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="relatorio_aniversariante_mes.php">
                                            <span class="sub-item">Relatório aniversariante do mês</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                     
                       

                   '
                        ;
                        } ?>
  
                     





                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="alterar_senha" role="dialog" tabindex="-1" id="alterar_senha" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Alteração de senha.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="./alterar_senha.php" method="post">
                        <div class="modal-body">
                            <p>Digite sua senha atual</p>
                            <input type="password" name="senha_atual" autocomplete="off" class="form-control placeholder-no-fix" required>
                        </div>

                        <div class="modal-body">
                            <p>Digite sua nova senha</p>
                            <input type="password" name="nova_senha" id="nova_senha" autocomplete="off" class="form-control placeholder-no-fix" required>
                        </div>

                        <div class="modal-body">
                            <p>Confirme sua nova senha</p>
                            <input type="password" name="confirma_senha" id="confirma_senha" autocomplete="off" class="form-control placeholder-no-fix" required>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                            <button class="btn btn-theme" type="submit" type="button">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- modal -->
     <div aria-hidden="true" aria-labelledby="alterar_foto" role="dialog" tabindex="-1" id="alterar_foto" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Alterar foto de prefil.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="alterar_foto.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <p>Foto de Perfil</p>
                            <input type="file" name="foto" autocomplete="off" class="form-control placeholder-no-fix" required>
                        </div>

                       
                            <input type="text" hidden name="idUsuario" autocomplete="off" class="form-control placeholder-no-fix" value=" <?php echo $_SESSION['idUsuario'];?>" >
                        

                     
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                            <button class="btn btn-theme" type="submit" type="button">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 
        <div aria-hidden="true" aria-labelledby="procurar_prontuario" role="dialog" tabindex="-1" id="procurar_prontuario" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Procurar prontuário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <li>
                                        <a href="ficha_socioeconomica.php">
                                            <span class="sub-item">Ficha socioeconômica</span>
                                        </a>
                                    </li>
                    <form action="./prontuario.php" method="get">
                        <div class="modal-body">
                            <p>Selecione um paciente</p>
                            <select name="pacID" id="pacID" required class="form-control" style="width: 100%">
                                <option></option>
                                <?php
                                $resultado_pront = mysqli_query($con, "SELECT * FROM paciente");
                                while ($row_pront = mysqli_fetch_array($resultado_pront)) { ?>
                                    <option value="<?php echo $row_pront['idPaciente']; ?>"><?php echo $row_pront['nomePaciente']; ?></option>
                                <?php } ?> } ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                            <button class="btn btn-theme" type="submit" type="button">Pesquisar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        modal -->
        <script>
            $("#pacID").select2({
                placeholder: "Selecione um Paciente",
                allowClear: true,
                theme: "bootstrap"
            });
        </script> 
        <script>
            var password = document.getElementById("nova_senha"),
                confirm_password = document.getElementById("confirma_senha");

            function validatePassword() {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("A nova senha e a confirmação estão diferentes!");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>