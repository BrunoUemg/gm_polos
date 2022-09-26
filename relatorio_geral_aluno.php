<?php
include_once "header.php";

include_once "dao/conexao.php";





if(!empty($_POST['idPolo'])){
    $idPolo = $_POST['idPolo'];
    $select_aluno = mysqli_query($con,"SELECT * FROM aluno A INNER JOIN polo P ON P.idPolo = A.idPolo where A.idPolo = '$idPolo'");
    
}

?>



<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Relatório geral dos alunos</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <form action="" method="post">
                    <label for="">Selecione o pelotão</label>
                    <?php $select_Polo = mysqli_query($con, "SELECT * FROM polo where status = 1"); ?>
                          <select name="idPolo" required class="form-control" id="">
                              <option value="">Selecione</option>
                             <?php while($rwos_polo = mysqli_fetch_assoc($select_Polo)){ 
                                 
                               
                               ?>
                                <option value="<?php echo $rwos_polo['idPolo']; ?>"><?php echo $rwos_polo['nomePolo']; ?></option>
                                <?php } ?>
                          </select>
                          <br>
                          <input type="submit" class="btn btn-primary" name="" value="Pesquisar" id="">
                </form>
</div>
</div>
          <div class="card">
            <div class="card-header">
           

      
      
      </div>
      
      


            <div class="card-body">
            <?php
                          if(!empty($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
				             } ?>
           
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nome aluno</th>
                     
                      <th>Pelotão</th>
                      <th>Endereço</th>
                      <th>Bairro</th>
                      <th>idade</th>
                      <th>Data Nascimento</th>
                      <th>Telefone</th>
                 
                    </tr>
                  </thead>
                
                  <tbody>


                    <?php 
                    if(!empty($_POST['idPolo'])){
                    while ($rows_aluno = mysqli_fetch_assoc($select_aluno)) {
                        $dtNascimento = str_replace('/', '-', $rows_aluno['dtNascimento']);
                        $ano = substr($dtNascimento,6,9);
                        $dia = substr($dtNascimento,0,2);
                        $mes = substr($dtNascimento,2,3);
                        $dtNascimento = $ano."".$mes."-".$dia;


                        
                           


                      ?>
                      <tr>
                      <td><?php echo $rows_aluno['nomeAluno']; ?></td>
                      
                      <td><?php echo $rows_aluno['nomePolo']; ?></td>
                      <td><?php echo $rows_aluno['enderecoResidencial']; echo " ".$rows_aluno['numeroEndereco'] ?></td>
                      <td><?php echo $rows_aluno['bairro']; ?></td>
                      <td><?php echo  (calcularIdade($dtNascimento)); echo " anos" ?></td>
                      <td><?php echo  date("d/m/Y", strtotime($rows_aluno['dtNascimento'])); ?></td>
                      <td><?php echo $rows_aluno['telefoneContato']; ?></td>
                     
                             
                      </tr>
                    <?php   } } 
                    
                    function calcularIdade($data){
                        $idade = 0;
                        $data_nascimento = date('Y-m-d', strtotime($data));
                        list($anoNasc, $mesNasc, $diaNasc) = explode('-', $data_nascimento);
                        
                           $idade      = date("Y") - $anoNasc;
                           if (date("m") < $mesNasc){
                               $idade -= 1;
                           } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
                               $idade -= 1;
                           }
                        
                           return $idade;
                       }
                    
                    ?>
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

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
   <!--   Core JS Files   -->
<script src="js/core/jquery.3.2.1.min.js"></script>
<script src="js/core/popper.min.js"></script>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>





<script>






           $(document).ready(function() {
    $('#basic-datatables').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'print',{
            extend: 'pdf',
            text: 'PDF',
            title: "Relatório geral do aluno",
            key: {
                key: 'p',
                altkey: true
            }
            
            
        },

        'excel'
      
        ],"language": {
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
    } );
} );

</script>





<!-- Atlantis JS -->
<script src="js/atlantis.min.js"></script>


</body>

</html>