

<?php

include_once "dao/conexao.php";

$idAluno = $_GET["idAluno"];

$sql4 = "SELECT A.idAluno,
  A.nomeAluno,
  M.idAluno,
  A.outro
  from aluno A, movimentacao M
  where A.idAluno = M.idAluno  and A.idAluno = $idAluno ";
  
  $res = $con-> query($sql4);
  $linha = $res->fetch_assoc();
  
  $html .='<table border=1>';
  $html .= '<thead>';
  $html .='<tr>';
  $html .='<td>Nome do Aluno</td>';
  $html .='<td> Data de movimentação</td>';
  $html .='<td> Descrição </td>';
  
  $html .='</tr>';
  $html .= '</thead>';
  
  $result_consultaMovimentacao = "SELECT M.dataMovimentacao,
  M.descricao,
  M.idAluno,
  A.idAluno,
  A.nomeAluno
  from movimentacao M, aluno A
  where M.idAluno = '$idAluno' and M.idAluno = A.idAluno  ";
  $resultado_consultaMovimentacao = mysqli_query($con, $result_consultaMovimentacao);
  
  $result_pessoa = "SELECT status,renda, SUM(renda)/SUM(status) AS rendaPercapita from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno";
  
  $res = $con-> query($result_pessoa);
  $linha3 = $res->fetch_assoc();
  
  while ($rows_consultaMovimentacao = mysqli_fetch_assoc($resultado_consultaMovimentacao)) { 
         $html .= '<tbody>';
         $html .=  '<tr> <td>' . $rows_consultaMovimentacao['nomeAluno']. '</td>'; 
         $html .= ' <td>'  . $rows_consultaMovimentacao['dataMovimentacao']. '</td>';
         $html .=  ' <td>' . $rows_consultaMovimentacao['descricao']. '</td></tr>';
         $html .= '</tbody>';
  }
  
  $html .= '</table>';
  
  
  $result_gastos = "SELECT valorResidencia,valorAgua,valorEnergia,gastosMedicamentosValor,valorEscola,valorIdioma,valorInformatica,valorAlimentacao, SUM(valorResidencia)+SUM(valorAgua)+ SUM(valorEnergia)+SUM(gastosMedicamentosValor)+SUM(valorEscola)+SUM(valorIdioma)+SUM(valorInformatica)+SUM(valorAlimentacao) AS gastos from ficha_social where idAluno = '$idAluno' GROUP BY idAluno";
  
  $res = $con-> query($result_gastos);
  $linha4 = $res->fetch_assoc();
  
  $result_renda = "SELECT renda, SUM(renda) AS somaRenda from composicao_familiar where idAluno = '$idAluno' GROUP BY idAluno";
  
    
  $res = $con-> query($result_renda);
  $linha5 = $res->fetch_assoc();
  
  
  
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  $data = strftime('%d de %B de %Y',strtotime('today'));
  
  use Dompdf\Dompdf;
  
  // include autoloader
  require_once 'dompdf/autoload.inc.php';
  
  $dompdf = new Dompdf();
  $dompdf->loadHtml(' <div align="right"> Página 1 de 1 </div>
  <h3 style="position:absolute; top:0px; left:150px;">Ficha de inscrição Nº '. $linha['idAluno'] .' </h3> <img src=digitalizados/'. $linha['outro'] .' style="position:absolute; top:0px; left:480px; width: 10.0000%;" style="width: 10.0000%;"  >
  
  <center><h2><u>Histórico do aluno</u></h2></center> 
  

   
       
      <p><h3> &nbsp; &nbsp; 1. Dados Aluno:</h3>
  
      <br>
      <h3> &nbsp; &nbsp; 1.1 Histórico geral:</h3>
    '. $html . '
    <br>
    
  
  
  
 
      
  
      <img style="position:fixed; bottom:150px; left:-48px;" src="img/footer3.png">
  
     
  
  
          
      
  
  
          
  
  ');
  
  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');
  ob_clean();
  // Render the HTML as PDF
  $dompdf->render();
  
  // Output the generated PDF to Browser
  $dompdf->stream('Histórico de '.$linha['nomeAluno']. '.pdf',
  array ("Attachment" =>true //para realizar o download somente alterar para true
  )
  );


  ?>