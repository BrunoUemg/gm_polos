<?php

include_once("header.php");

?>
<?php
if ($_SESSION['idMonitor'] == 0 && $_SESSION['idAluno'] == 0) { ?>
  <div class="main-panel">
    <div class="content">
      <div class="page-inner">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

                <!-- Start Content -->
                <center>
                  <div class="card-title">Cadastros Básicos</div>
                </center>
                <div class="card-title">Cadastro de escola</div>
              </div>

              <form action="envio_cadastro_escola.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                <div class="item form-group">
                  <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da Escola
                  </label>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeEscola" required="required" type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Cidade
                  </label>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <?php $select_cidade = mysqli_query($con, "SELECT * FROM cidade order by nomeCidade asc"); ?>
                    <select name="idCidade" required class="form-control col-md-7 col-xs-12" id="">
                      <option value="">Selecione</option>
                      <?php while ($rows_cidade = mysqli_fetch_assoc($select_cidade)) { ?>
                        <option value="<?php echo $rows_cidade['idCidade'] ?>"><?php echo $rows_cidade['nomeCidade'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>








                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href='MenuPrincipal.php' " value="Cancelar">
                    <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                    <a href="atualizar_escola.php"> <input type="button" name="cancelar" class="btn btn-primary" value="Atualizar"></a>
                  </div>
                </div>
              </form>


              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">

                      <div class="card-title">Cadastro da cidade</div>
                    </div>

                    <form action="envio_cadastro_cidade.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                      <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome da cidade
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeCidade" required="required" type="text">
                        </div>

                      </div>








                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href='MenuPrincipal.php' " value="Cancelar">
                          <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                          <!--<a href="atualizar_documentos.php"> <input type="button" name="cancelar" class="btn btn-primary" value="Atualizar"></a> -->
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">

                            <div class="card-title">Cadastro de Documentos</div>
                          </div>

                          <form action="envio_cadastro_documento.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                            <div class="item form-group">
                              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do documento
                              </label>
                              <div class="col-md-10 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeDocumento" required="required" type="text">
                              </div>
                              <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Obrigatorio
                              </label>
                              <div class="col-md-10 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" maxlength="100" name="obrigatorio" required="required">
                                  <option value="">Selecione</option>
                                  <option value="Sim">Sim</option>
                                  <option value="Não">Não</option>
                                </select>
                              </div>
                            </div>








                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-3">
                                <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href='MenuPrincipal.php' " value="Cancelar">
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                <a href="atualizar_documentos.php"> <input type="button" name="cancelar" class="btn btn-primary" value="Atualizar"></a>
                              </div>
                            </div>
                          </form>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header">

                                  <div class="card-title">Cadastro de Documentos</div>
                                </div>

                                <form action="envio_cadastro_profissao.php" method="POST" onsubmit="return(verifica())" class="form-horizontal form-label-left">

                                  <div class="item form-group">
                                    <label class="control-label col-md-6 col-sm-3 col-xs-12" for="nome">Nome do documento
                                    </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12" maxlength="100" name="nomeProfissao" required="required" type="text">
                                    </div>
                                  </div>








                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                      <input type="button" name="cancelar" class="btn btn-danger" onClick="window.location.href='MenuPrincipal.php' " value="Cancelar">
                                      <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                      <a href="atualizar_documentos.php"> <input type="button" name="cancelar" class="btn btn-primary" value="Atualizar"></a>
                                    </div>
                                  </div>
                                </form>









                              </div>
                            </div>

                          </div>
                        </div> <?php } ?>



                      <?php
                      if ($_SESSION['idAluno'] != 0) {



                        $select_aluno = mysqli_query($con, "SELECT idPolo FROM aluno WHERE idAluno = $_SESSION[idAluno]");
                        $aluno = mysqli_fetch_array($select_aluno);
                        $idPolo = $aluno['idPolo'];
                        $result_consultaEncontro = "SELECT * from  encontro E where E.idPolo = $idPolo and funcionamento = 'Aberto' ";
                        $resultado_consultaEncontro = mysqli_query($con, $result_consultaEncontro);
                      ?>
                        <div class="main-panel">
                          <div class="content">
                            <div class="page-inner">
                              <div class="page-header">
                                <h4 class="page-title">Meus eventos</h4>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                          <thead>
                                            <tr>
                                              <th>Nome</th>

                                              <th>Data do encontro</th>
                                              <th>Hora de início</th>
                                              <th>Hora final</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php while ($rows_encontro = mysqli_fetch_assoc($resultado_consultaEncontro)) { ?>
                                              <tr>
                                                <td><?php echo $rows_encontro['nomeEncontro'] ?></td>
                                                <td><?php echo date("d/m/Y", strtotime($rows_encontro['dt'])); ?></td>
                                                <td><?php echo $rows_encontro['horaInicio'] ?></td>
                                                <td><?php echo $rows_encontro['horaFinal'] ?></td>
                                              </tr>
                                            <?php } ?>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>


                          <script>
                            $(document).ready(function() {
                              $('#basic-datatables').DataTable({
                                "language": {
                                  "sEmptyTable": "Nenhum registro encontrado",
                                  "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                                  "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                                  "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                                  "sInfoPostFix": "",
                                  "sInfoThousands": ".",
                                  "sLengthMenu": "_MENU_ resultados por página",
                                  "sLoadingRecords": "Carregando...",
                                  "sProcessing": "Processando...",
                                  "sZeroRecords": "Nenhum registro encontrado",
                                  "sSearch": "Pesquisar",
                                  "oPaginate": {
                                    "sNext": "Próximo",
                                    "sPrevious": "Anterior",
                                    "sFirst": "Primeiro",
                                    "sLast": "Último"
                                  },
                                  "oAria": {
                                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                                    "sSortDescending": ": Ordenar colunas de forma descendente"
                                  }
                                }
                              });
                            });
                          </script>
                        <?php } ?>


                        <script src="js/mascaras.js"></script>



                        <?php

                        include_once("footer.php");
                        ?>