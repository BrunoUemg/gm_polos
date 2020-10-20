<?php
include_once "dao/conexao.php";
include_once("header.php");

$idAluno = $_GET['idAluno'];

$result_consultaAluno = "SELECT A.idAluno,
A.nomeAluno,
A.dtNascimento,
A.nomePai,
A.profissaoPai,
A.nomeMae,
A.profissaoMae,
A.sexo,
A.enderecoResidencial,
A.bairro,
A.numeroEndereco,
A.telefoneContato,
A.escola,
A.anoEscola,
A.turmaEscola,
A.turnoEscola,
A.status,
A.dataDesligamento,
A.nacionalidadeAluno,
A.nacionalidadeResponsavel,
A.rgAluno,
A.cpfAluno,
A.rgResponsavel,
A.cpfResponsavel,
A.dtMatricula,
A.tipoSanguineo,
A.fatorRh,
A.altura,
A.peso,
A.equipamentosAuxilio,
A.permicao,
A.emergenciasMedicas,
A.avisarEmergencia,
A.telefoneEmergencia,
A.medContinuos,
A.alergia,
A.planoMedico,
A.numCarteira,
A.nadar,
A.sonambulo,
A.cardiaco,
A.restricoesAlimentos,
A.impedimentoFisico,
A.distubioComportamento,
A.disturbioAlimentar,
A.disturbioAnsiedade,
A.deficiencia,
A.rgalunodigi,
A.cpfalunodigi,
A.cpfrespdigi,
A.cpfresp2digi,
A.rgrespdigi,
A.rgresp2digi,
A.comprovanteresidigi,
A.atestadoescolardigi,
A.outro,
A.fotoAluno,
A.desArquivo1,
A.desArquivo2,
A.desArquivo3,
A.desArquivo4,
A.desArquivo5,
A.desArquivo6,
A.desArquivo7,
A.desArquivo8,
A.desArquivo9,
A.desArquivo10,
P.idPolo,
P.nomePolo
from aluno A, polo P
where A.idPolo = P.idPolo and A.status = 1 and A.idAluno = '$idAluno' ";
$res = $con-> query($result_consultaAluno);
$linha = $res->fetch_assoc();

?>

         
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <!-- Start Content -->
              <div class="card-title">Visualizar Documentos</div>
            </div>
            <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data" onsubmit="return(verifica())" class="form-horizontal form-label-left">
            <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Descrição</th>
                    <th>Inserir documento novo</th>
                    <th>Visualizar documento</th>
                    </tr>
                  </thead>
                
                  <tbody>

              
             
                <div class="form-group">  
                  
                  <input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
                
           <tr>         
<div class="row">

            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo1">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo1'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="rgalunodigi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo1'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['rgalunodigi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo2">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo2'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="cpfalunodigi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu2' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo2'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['cpfalunodigi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo3">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo3'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="cpfrespdigi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu3' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo3'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['cpfrespdigi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo4">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo4'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="cpfresp2digi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu4' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo4'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['cpfresp2digi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo5">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo5'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="rgrespdigi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu5' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo5'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['rgrespdigi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                              
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

        

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo6">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo6'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="rgresp2digi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu6' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo6'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['rgresp2digi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                              
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo7">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo7'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="comprovanteresidigi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu7' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo7'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['comprovanteresidigi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                              
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo8">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo8'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="atestadoescolardigi"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu8' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo8'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['atestadoescolardigi'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                              
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
            <select class="form-control"  name="desArquivo9">
                                      <option value="">Selecione a descrição</option>
                                      <?php
                                        $resultado_documentos = mysqli_query($con, "SELECT * FROM documentos");
                                        while ($row_documentos = mysqli_fetch_assoc($resultado_documentos)) { ?>
                                        <option value="<?php echo $row_documentos['nomeDocumento']; ?>" <?php if ($linha['desArquivo9'] == $row_documentos['nomeDocumento']) echo 'selected'; ?>><?php echo $row_documentos['nomeDocumento']; ?></option>
                                      <?php } ?> 
                                    </select>
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="fotoAluno"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu9' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo9'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['fotoAluno'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                              
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              <tr>         
<div class="row">
<input class="form-control" maxlength="100" name="idAluno" hidden required="required" type="text"  value="<?php echo $linha['idAluno']; ?>">
            <td>  <div class="form-group ">
              
              <input class="form-control" maxlength="100" name="desArquivo10"  type="text"  value="<?php echo $linha['desArquivo10']; ?>">
              </div> </td>  
             <td> <div class="form-group ">
             
              <input class="form-control" maxlength="100" name="outro"  type="file" >
              </div></td>
          <td>  <div class="form-group ">
            
              <input class="form-control" class="btn btn-default" data-toggle='modal' data-target='#Modalvisu10' maxlength="100" name="nomeAluno" required="required" type="button" value="Ver Documento">
              </div>
              <div class="modal fade" id="Modalvisu10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Documentos digitalizados</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="alterar_documentos.php" method="POST" enctype="multipart/form-data">

                 
                  
                  <label><?php echo $linha['desArquivo10'] ?></label>
                  <embed src="<?php echo 'digitalizados/'. $linha['outro'] .  '' ?>"  width="445" height="400" type='application/pdf' >
                  
                                  

                              



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                              
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
              </div> </td> </tr>

              </tbody>
                </table>
              </div>
            </div>
          </div>
        
 




   

         

              
              


          <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <input type="button" name="cancelar" class="btn btn-primary" onClick="window.location.href='consultar_alunos.php'" value="Cancelar">
                <input type="submit" name="enviar" class="btn btn-success" value="Alterar">
              </div>
            </div>


              <div>
            
           
    
             
</form>




              
                       </div>

              </div>
</div> 

<script src="js/mascaras.js"></script>
    




<?php
include_once("footer.php");

?>