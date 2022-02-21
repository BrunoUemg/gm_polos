<?php
include_once "header.php";

include_once "dao/conexao.php";
$result_consultaAluno = "SELECT A.idAluno,
A.nomeAluno,
A.dtNascimento,
P.idPolo,
P.nomePolo,
A.cpfAluno

from aluno A, polo P, processamento_cadastro V
where A.idPolo = P.idPolo and A.status = 1 and V.idAluno = A.idAluno  ";
$resultado_consultaAluno = mysqli_query($con, $result_consultaAluno);

$result_Escola = "SELECT * FROM escola ";
$resultado_Escola = mysqli_query($con, $result_Escola);


if(isset($_POST['enviar'])){
  $idAluno = $_POST['idAluno'];
  $senha = $_POST['senha'];

  $con->query("UPDATE usuario set senha = '$senha' where idAluno = '$idAluno'");
  echo "<script>alert('Resetado com sucesso!');window.location='consultar_alunos.php'</script>";
}

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Consultar Alunos</h4>
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
                      <th>Data de Nascimento</th>
                      <th>Polo</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php while ($rows_consultaAluno = mysqli_fetch_assoc($resultado_consultaAluno)) {
                    ?>
                      <tr>
                        <td><?php echo $rows_consultaAluno['nomeAluno']; ?></td>

                        <td><?php echo $rows_consultaAluno['dtNascimento']; ?></td>
                        <td><?php echo $rows_consultaAluno['nomePolo']; ?></td>

                        <td>
                          <?php echo "<a class='btn btn-default' title='Vizualizar Tudo' href='visualizar_alunos.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-search"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='Desativar' href='consultar_alunos.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#ModalMaisInfo" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fas fa-minus-square"></i><?php echo "</a>"; ?>
                          
                          <?php echo "<a class='btn btn-default' title='Imprimir ficha completa' href='imprimir_alunos.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-file-pdf"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='Imprimir histórico' href='imprimir_historico.php?idAluno=" . $rows_consultaAluno['idAluno'] . "'>" ?><i class="fa fa-file-archive"></i><?php echo "</a>"; ?>
                          <?php echo "<a class='btn btn-default' title='resetar senha' href='consultar_alunos.php?id=" . $rows_consultaAluno['idAluno'] . "' data-toggle='modal' data-target='#resetar" . $rows_consultaAluno['idAluno'] . "'>" ?>Resetar <?php echo "</a>"; ?>


                          <!-- Modal-->

                          <div class="modal fade" id="ModalAlterar<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Alterar Aluno</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="alterar_aluno.php" method="POST">

                                    <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">
                                    <input type="text" readonly hidden name="status" class="form-control" value="<?php echo $rows_consultaAluno['status']; ?>">
                                    <input type="text" readonly hidden name="dataDesligamento" class="form-control" value="<?php echo $rows_consultaAluno['dataDesligamento']; ?>">

                                    <label>Nome</label>
                                    <input type="text" class="form-control" required name="nomeAluno" value="<?php echo $rows_consultaAluno['nomeAluno']; ?>">





                                    <label>Data de Nascimento</label>
                                    <input type="date" class="form-control" required name="dtNascimento" value="<?php echo $rows_consultaAluno['dtNascimento']; ?>">


                                    <label>Nacionalidade Aluno</label>
                                    <input type="text" class="form-control" required name="nacionalidadeAluno" value="<?php echo $rows_consultaAluno['nacionalidadeAluno']; ?>">


                                    <label>RG Aluno</label>
                                    <input type="text" class="form-control" required name="rgAluno" value="<?php echo $rows_consultaAluno['rgAluno']; ?>">

                                    <label>CPF Aluno</label>
                                    <input type="text" class="form-control" required name="cpfAluno" value="<?php echo $rows_consultaAluno['cpfAluno']; ?>">






                                    <label>Endereço Residencial</label>
                                    <input type="text" class="form-control" required id="bairro" name="enderecoResidencial" required="required" value="<?php echo $rows_consultaAluno['enderecoResidencial']; ?>">

                                    <label>Telefone</label>
                                    <input type="text" class="form-control" required name="telefoneContato" value="<?php echo $rows_consultaAluno['telefoneContato']; ?>" onkeyup="mascara('(##)####-####',this,event,true)">


                                    <label>Nome Pai</label>
                                    <input type="text" class="form-control" required name="nomePai" value="<?php echo $rows_consultaAluno['nomePai']; ?>">

                                    <label>Profissão do Pai</label>
                                    <input type="text" class="form-control" required name="profissaoPai" value="<?php echo $rows_consultaAluno['profissaoPai']; ?>">

                                    <label>Nome Mãe</label>
                                    <input type="text" class="form-control" required name="nomeMae" value="<?php echo $rows_consultaAluno['nomeMae']; ?>">

                                    <label>Profissão da Mãe</label>
                                    <input type="text" class="form-control" required name="profissaoMae" value="<?php echo $rows_consultaAluno['profissaoMae']; ?>">

                                    <label>RG Responsável</label>
                                    <input type="text" class="form-control" required name="rgResponsavel" value="<?php echo $rows_consultaAluno['rgResponsavel']; ?>">
                                    <label>CPF Responsável</label>

                                    <input type="text" class="form-control" required name="cpfResponsavel" value="<?php echo $rows_consultaAluno['cpfResponsavel']; ?>">
                                    <label>Nacionalidade Responsável</label>
                                    <input type="text" class="form-control" required name="nacionalidadeResponsavel" value="<?php echo $rows_consultaAluno['nacionalidadeResponsavel']; ?>">

                                    <label>Endereço Residencial</label>
                                    <input type="text" class="form-control" required name="enderecoResidencial" value="<?php echo $rows_consultaAluno['enderecoResidencial']; ?>">

                                    <label>Bairro</label>
                                    <input type="text" class="form-control" required name="bairro" value="<?php echo $rows_consultaAluno['bairro']; ?>">

                                    <label>Sexo</label>
                                    <input type="text" class="form-control" required name="sexo" value="<?php echo $rows_consultaAluno['sexo']; ?>">
                                    <label>Escola</label>
                                    <select class="form-control" required name="escola">
                                      <option value="">Selecione a Escola</option>
                                      <?php
                                      $resultado_Escola = mysqli_query($con, "SELECT * FROM escola");
                                      while ($row_Escola = mysqli_fetch_assoc($resultado_Escola)) { ?>
                                        <option value="<?php echo $row_Escola['nomeEscola']; ?>" <?php if ($rows_consultaAluno['escola'] == $row_Escola['nomeEscola']) echo 'selected'; ?>><?php echo $row_Escola['nomeEscola']; ?></option>
                                      <?php } ?>
                                    </select>


                                    <label>Ano de Escola</label>
                                    <input type="text" class="form-control" required name="anoEscola" value="<?php echo $rows_consultaAluno['anoEscola']; ?>">

                                    <label>Turma Escola</label>
                                    <input type="text" class="form-control" required name="turmaEscola" value="<?php echo $rows_consultaAluno['turmaEscola']; ?>">

                                    <label>Turno Escola</label>
                                    <input type="text" class="form-control" required name="turnoEscola" value="<?php echo $rows_consultaAluno['turnoEscola']; ?>">

                                    <label>Data de Matrícula</label>
                                    <input type="date" class="form-control" required name="dtMatricula" value="<?php echo $rows_consultaAluno['dtMatricula']; ?>">


                                    <label>Polo</label>
                                    <select class="form-control" required name="idPolo">
                                      <option value="">Selecione o Polo</option>
                                      <?php
                                      $resultado_Polos = mysqli_query($con, "SELECT * FROM polo");
                                      while ($row_Polos = mysqli_fetch_assoc($resultado_Polos)) { ?>
                                        <option value="<?php echo $row_Polos['idPolo']; ?>" <?php if ($rows_consultaAluno['idPolo'] == $row_Polos['idPolo']) echo 'selected'; ?>><?php echo $row_Polos['nomePolo']; ?></option>
                                      <?php } ?> } ?>
                                    </select>

                                    <label>Tipo Sanguineo</label>
                                    <input type="text" class="form-control" required name="tipoSanguineo" value="<?php echo $rows_consultaAluno['tipoSanguineo']; ?>">

                                    <label>Fator RH</label>
                                    <input type="text" class="form-control" required name="fatorRh" value="<?php echo $rows_consultaAluno['fatorRh']; ?>">

                                    <label>Altura</label>
                                    <input type="text" class="form-control" required name="altura" value="<?php echo $rows_consultaAluno['altura']; ?>">

                                    <label>peso</label>
                                    <input type="text" class="form-control" required name="peso" value="<?php echo $rows_consultaAluno['peso']; ?>">

                                    <label>Equipamentos Auxilio</label>
                                    <input type="text" class="form-control" required name="equipamentosAuxilio" value="<?php echo $rows_consultaAluno['equipamentosAuxilio']; ?>">

                                    <label>Permição</label>
                                    <input type="text" class="form-control" required name="permicao" value="<?php echo $rows_consultaAluno['permicao']; ?>">

                                    <label>Emergências Médicas</label>
                                    <input type="text" class="form-control" required name="emergenciasMedicas" value="<?php echo $rows_consultaAluno['emergenciasMedicas']; ?>">

                                    <label>Avisar Emergências</label>
                                    <input type="text" class="form-control" required name="avisarEmergencia" value="<?php echo $rows_consultaAluno['avisarEmergencia']; ?>">

                                    <label>Telefone Emergência</label>
                                    <input type="text" class="form-control" required name="telefoneEmergencia" value="<?php echo $rows_consultaAluno['telefoneEmergencia']; ?>">

                                    <label>Medicação Continua</label>
                                    <input type="text" class="form-control" required name="medContinuos" value="<?php echo $rows_consultaAluno['medContinuos']; ?>">

                                    <label>Alergia</label>
                                    <input type="text" class="form-control" required name="alergia" value="<?php echo $rows_consultaAluno['alergia']; ?>">

                                    <label>plano Médico</label>
                                    <input type="text" class="form-control" required name="planoMedico" value="<?php echo $rows_consultaAluno['planoMedico']; ?>">

                                    <label>Número Carteira</label>
                                    <input type="text" class="form-control" required name="numCarteira" value="<?php echo $rows_consultaAluno['numCarteira']; ?>">

                                    <label>Nadar</label>
                                    <input type="text" class="form-control" required name="nadar" value="<?php echo $rows_consultaAluno['nadar']; ?>">

                                    <label>Sonambulo</label>
                                    <input type="text" class="form-control" required name="sonambulo" value="<?php echo $rows_consultaAluno['sonambulo']; ?>">

                                    <label>Cardiaco</label>
                                    <input type="text" class="form-control" required name="cardiaco" value="<?php echo $rows_consultaAluno['cardiaco']; ?>">

                                    <label>Restrições alimentos</label>
                                    <input type="text" class="form-control" required name="restricoesAlimentos" value="<?php echo $rows_consultaAluno['restricoesAlimentos']; ?>">

                                    <label>Impedimento Fisíco</label>
                                    <input type="text" class="form-control" required name="impedimentoFisico" value="<?php echo $rows_consultaAluno['impedimentoFisico']; ?>">

                                    <label>Disturbio Comportamento</label>
                                    <input type="text" class="form-control" required name="distubioComportamento" value="<?php echo $rows_consultaAluno['distubioComportamento']; ?>">

                                    <label>Disturbio Alimentar</label>
                                    <input type="text" class="form-control" required name="disturbioAlimentar" value="<?php echo $rows_consultaAluno['disturbioAlimentar']; ?>">

                                    <label>Disturbio Ansiedade</label>
                                    <input type="text" class="form-control" required name="disturbioAnsiedade" value="<?php echo $rows_consultaAluno['disturbioAnsiedade']; ?>">
                                    <label>Deficiência</label>
                                    <input type="text" class="form-control" required name="deficiencia" value="<?php echo $rows_consultaAluno['deficiencia']; ?>">

                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                  <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </td>

                        <div class="modal fade" id="resetar<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja resetar?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="" method="POST">

                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">
                                  <input type="text" readonly hidden name="senha" class="form-control" value="<?php echo $rows_consultaAluno['cpfAluno']; ?>">



                                  <div class="alert alert-warning" role="alert">
                                    A senha resetada será o cpf:<?php echo $rows_consultaAluno['cpfAluno'] ?>
                                  </div>





                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Não</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Sim">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>


                        <div class="modal fade" id="ModalMaisInfo<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desligar Aluno</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="desligar_aluno.php" method="POST">
                                  <label>Status</label>
                                  <Select class="form-control col-md-7 col-xs-12" name="status" maxlength="50" required="required" type="text">

                                    <option value='1' <?php if ($rows_consultaAluno['status'] == '1') echo 'selected'; ?>>Ativado</option>
                                    <option value='0'>Desligar</option>
                                  </select>
                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">

                                  <input type="text" readonly hidden class="form-control" required name="nomeAluno" value="<?php echo $rows_consultaAluno['nomeAluno']; ?>">

                                  <input type="text" readonly hidden class="form-control" required name="cpfResponsavel" value="<?php echo $rows_consultaAluno['cpfResponsavel']; ?>">
                                  <input type="date" readonly hidden class="form-control" required name="dtMatricula" value="<?php echo $rows_consultaAluno['dtMatricula']; ?>">
                                  <input type="text" readonly hidden class="form-control" required name="rgResponsavel" value="<?php echo $rows_consultaAluno['rgResponsavel']; ?>">
                                  <input type="text" readonly hidden class="form-control" required name="nacionalidadeResponsavel" value="<?php echo $rows_consultaAluno['nacionalidadeResponsavel']; ?>">

                                  <input type="text" readonly hidden class="form-control" required name="nacionalidadeAluno" value="<?php echo $rows_consultaAluno['nacionalidadeAluno']; ?>">



                                  <input type="text" readonly hidden class="form-control" required name="rgAluno" value="<?php echo $rows_consultaAluno['rgAluno']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="cpfAluno" value="<?php echo $rows_consultaAluno['cpfAluno']; ?>">


                                  <input type="date" readonly hidden class="form-control" required name="dtNascimento" value="<?php echo $rows_consultaAluno['dtNascimento']; ?>">









                                  <input type="text" readonly hidden class="form-control" required id="bairro" name="enderecoResidencial" required="required" value="<?php echo $rows_consultaAluno['enderecoResidencial']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="telefoneContato" value="<?php echo $rows_consultaAluno['telefoneContato']; ?>" onkeyup="mascara('(##)####-####',this,event,true)">


                                  <input type="text" readonly hidden class="form-control" required name="nomePai" value="<?php echo $rows_consultaAluno['nomePai']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="profissaoPai" value="<?php echo $rows_consultaAluno['profissaoPai']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="nomeMae" value="<?php echo $rows_consultaAluno['nomeMae']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="profissaoMae" value="<?php echo $rows_consultaAluno['profissaoMae']; ?>">

                                  <input type="text" readonly hidden class="form-control" required name="enderecoResidencial" value="<?php echo $rows_consultaAluno['enderecoResidencial']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="bairro" value="<?php echo $rows_consultaAluno['bairro']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="sexo" value="<?php echo $rows_consultaAluno['sexo']; ?>">

                                  <input type="text" readonly hidden class="form-control" required name="escola" value="<?php echo $rows_consultaAluno['escola']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="anoEscola" value="<?php echo $rows_consultaAluno['anoEscola']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="turmaEscola" value="<?php echo $rows_consultaAluno['turmaEscola']; ?>">


                                  <input type="text" readonly hidden class="form-control" required name="turnoEscola" value="<?php echo $rows_consultaAluno['turnoEscola']; ?>">


                                  <select class="form-control" readonly hidden required name="idPolo">
                                    <option value="">Selecione o Polo</option>
                                    <?php
                                    $resultado_Polos = mysqli_query($con, "SELECT * FROM polo");
                                    while ($row_Polos = mysqli_fetch_assoc($resultado_Polos)) { ?>
                                      <option value="<?php echo $row_Polos['idPolo']; ?>" <?php if ($rows_consultaAluno['idPolo'] == $row_Polos['idPolo']) echo 'selected'; ?>><?php echo $row_Polos['nomePolo']; ?></option>
                                    <?php } ?> } ?>
                                  </select>





                                  <label>Data de desligamento</label>
                                  <input type="date" class="form-control" required name="dataDesligamento">



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                        <div class="modal fade" id="Modaldocu<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">

                                  <label>RG aluno</label>
                                  <input type="file" class="form-control" name="rgalunodigi">

                                  <label>CPF Aluno</label>
                                  <input type="file" class="form-control" name="cpfalunodigi" value="<?php echo $rows_consultaAluno['cpfalunodigi']; ?>">

                                  <label>CPF Responsavel</label>
                                  <input type="file" class="form-control" name="cpfrespdigi" value="<?php echo $rows_consultaAluno['cpfrespdigi']; ?>">

                                  <label>CPF responsável</label>
                                  <input type="file" class="form-control" name="cpfresp2digi">

                                  <label>RG Responsável</label>
                                  <input type="file" class="form-control" name="rgrespdigi">

                                  <label>RG Reponsável segundo</label>
                                  <input type="file" class="form-control" name="rgresp2digi">

                                  <label>Comprovante Residência</label>
                                  <input type="file" class="form-control" name="comprovanteresidigi">

                                  <label>Atestado Escolar</label>
                                  <input type="file" class="form-control" name="atestadoescolardigi">

                                  <label>Outro</label>
                                  <input type="file" class="form-control" name="outro">

                                  <label>Foto Aluno</label>
                                  <input type="file" class="form-control" name="fotoAluno">



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                        <div class="modal fade" id="ModalMaisInfo<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desligar Aluno</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="" method="POST">





                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                        <div class="modal fade" id="Modaldocu<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">

                                  <label>RG aluno</label>
                                  <input type="file" class="form-control" name="rgalunodigi">

                                  <label>CPF Aluno</label>
                                  <input type="file" class="form-control" name="cpfalunodigi" value="<?php echo $rows_consultaAluno['cpfalunodigi']; ?>">

                                  <label>CPF Responsavel</label>
                                  <input type="file" class="form-control" name="cpfrespdigi" value="<?php echo $rows_consultaAluno['cpfrespdigi']; ?>">

                                  <label>CPF responsável</label>
                                  <input type="file" class="form-control" name="cpfresp2digi">

                                  <label>RG Responsável</label>
                                  <input type="file" class="form-control" name="rgrespdigi">

                                  <label>RG Reponsável segundo</label>
                                  <input type="file" class="form-control" name="rgresp2digi">

                                  <label>Comprovante Residência</label>
                                  <input type="file" class="form-control" name="comprovanteresidigi">

                                  <label>Atestado Escolar</label>
                                  <input type="file" class="form-control" name="atestadoescolardigi">

                                  <label>Outro</label>
                                  <input type="file" class="form-control" name="outro">

                                  <label>Foto Aluno</label>
                                  <input type="file" class="form-control" name="fotoAluno">



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>

                        <div class="modal fade" id="Modalvisu<?php echo $rows_consultaAluno['idAluno']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                  <input type="text" readonly hidden name="idAluno" class="form-control" value="<?php echo $rows_consultaAluno['idAluno']; ?>">

                                  <label><?php echo $rows_consultaAluno['desArquivo1'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['rgalunodigi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo2'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['cpfalunodigi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo3'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['cpfrespdigi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo4'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['cpfresp2digi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo5'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['rgrespdigi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo6'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['rgresp2digi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo7'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['comprovanteresidigi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo8'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['atestadoescolardigi'] .  '' ?>" width="445" height="400" type='application/pdf'>

                                  <label><?php echo $rows_consultaAluno['desArquivo9'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['fotoAluno'] .  '' ?>" width="445" height="400" type='application/pdf'>
                                  <label><?php echo $rows_consultaAluno['desArquivo10'] ?></label>
                                  <embed src="<?php echo 'digitalizados/' . $rows_consultaAluno['outro'] .  '' ?>" width="445" height="400" type='application/pdf'>



                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviar" class="btn btn-success" value="Salvar">
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                        </td>





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


  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="js/states.js"></script>
  <script src="js/mascaras.js"></script>


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



  <?php
  include_once("footer.php");

  ?>