
<?php 
include_once "dao/conexao.php";
include_once "header.php";

$result_Polo ="SELECT * FROM polo where status = 1";
$resultado_Polo= mysqli_query($con, $result_Polo);
?>



<!DOCTYPE html>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.steps.css">

    <form id="cad_projeto" method="post" action="envio_cadastro_aluno.php">
        <div>
            <h3>Informações Pessoais</h3>
            <section>

         <center>   <h3>Informações Pessoais</h3> </center>

            <div class="row">

              <div class="form-group col-md-8">
              <label>Nome Completo </label>
              <input class="form-control" maxlength="100" name="nomeAluno"  required="required" type="text">
              </div>
            

              <div class="form-group col-md-4">
              <label>Data de Nascimento</label>
                <input class="form-control"  name="dtNascimento" required="required" type="date">
            </div>
          </div>


              <div class="row">

                     <div class="form-group col-md-4">
              <label>Sexo</label>
                <Select class="form-control"  name="sexo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
</select>
</div>
            
            <div class="form-group col-md-4">
              <label>RG Aluno (não obrigatório)</label>
                <input class="form-control"  name="rgAluno" maxlength="20"  type="text">
              </div>
            
            <div class="form-group col-md-4">
              <label>CPF Aluno (não obrigatório)</label>
                <input class="form-control"  name="cpfAluno" maxlength="15"   type="text" onkeyup="mascara('###.###.###-##',this,event,true)">
              </div>
            </div>

            <div class="row">

<div class="form-group col-md-6">
<label>Nome Pai </label>
<input class="form-control" maxlength="20" name="nomePai" required="required" type="text">
</div>


<div class="form-group col-md-6">
<label>Nome Mãe</label>
  <input class="form-control"  maxlength="20" name="nomeMae" type="text" required="required" >
</div>
</div>

<div class="row">

<div class="form-group col-md-6">
<label>RG Responsavel</label>
  <input class="form-control"  maxlength="100" name="rgResponsavel" required="required" type="text">
</div>



<div class="form-group col-md-6">
<label>CPF Responsavel</label>
  <input class="form-control"  maxlength="100" name="cpfResponsavel" required="required" type="text" onkeyup="mascara('###.#####.##-#',this,event,true)">
</div>
</div>

<div class="row">
<div class="form-group col-md-6">
<label>Profissão Pai</label>
  <input class="form-control"  maxlength="20" name="profissaoPai" required="required" type="text">
</div>

<div class="form-group col-md-6">
<label>Profissão Mãe</label>
  <input class="form-control"  maxlength="15" name="profissaoMae" type="text" required="required" >
</div>
</div>



            </section>

            <h3>Informações de contato e matrícula</h3>
            <section>

            <center>   <h3>Endereço</h3> </center>

            <div class="row">

<div class="form-group col-md-6">
<label>Endereço Residencial</label>
  <input class="form-control"  maxlength="100" name="enderecoResidencial" required="required" type="text">
</div>

<div class="form-group col-md-6">
<label>Bairro</label>
  <input class="form-control"  maxlength="60" name="bairro" required="required" type="text">
</div>


<div class="form-group col-md-6">
<label>Telefone</label>
  <input class="form-control"  maxlength="100" name="telefoneContato" required="required" type="text" onkeyup="mascara('(##) #####-####',this,event,true)">
</div>

<div class="form-group col-md-6">
<label>Nacionalidade Aluno</label>
  <input class="form-control"  maxlength="100" name="nacionalidadeAluno" required="required" type="text" >
</div>

<div class="form-group col-md-6">
<label>Nacionalidade Responsavel</label>
  <input class="form-control"  maxlength="100" name="nacionalidadeResponsavel" required="required" type="text" >
</div>
</div>


<center>   <h3>Dados para matrícula</h3> </center>        

<div class="row">

<div class="form-group col-md-4">
<label>Data da Matrícula</label>
  <input class="form-control"   name="dtMatricula" required="required" type="date">
</div>

<div class="form-group col-md-4">
              <label>Nome Escola</label>
                <Select class="form-control"  name="escola" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Estadual">Estadual</option>
                  <option value="Feminino">Objetivo</option>
</select>
</div>

<div class="form-group col-md-4">
              <label>Turno</label>
                <Select class="form-control"  name="turnoEscola" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Matutino">Matutino</option>
                  <option value="Vespertino">Vespertino</option>
                  <option value="Noturno">Noturno</option>
                  <option value="Integral">Integral</option>
</select>
</div>


<div class="form-group col-md-4">
              <label>Ano Escola</label>
                <Select class="form-control"  name="anoEscola" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                  <option value="1 Ano">1° Ano</option>
                  <option value="2 Ano">2° Ano</option>
                  <option value="3 Ano">3° Ano</option>
                  <option value="4 Ano">4° Ano</option>
                  <option value="5 Ano">5° Ano</option>
                  <option value="6 Ano">6° Ano</option>
                  <option value="7 Ano">7° Ano</option>
                  <option value="8 Ano">8° Ano</option>
                  <option value="9 Ano">9° Ano</option>
                  <option value="1 Colegial">1° Colegial</option>
                  <option value="2 Colegial">2° Colegial</option>
                  <option value="3 Colegial">3° Colegial</option>
</select>
</div>
<div class="form-group col-md-4">
<label>Turma Escola</label>
  <input class="form-control"  maxlength="100" name="turmaEscola" required="required" type="text" >
</div>


<div class="form-group col-md-4">
  <label for="">Polo do Aluno</label>
                <select class="form-control"  name="idPolo" required="required"  >
        
                <option>Selecione o Polo</option>
  <?php while($rows_Polo = mysqli_fetch_assoc($resultado_Polo)){ ?>

<option value="<?php echo $rows_Polo['idPolo'];?>"><?php echo ($rows_Polo['nomePolo']);?></option>

<?php } ?>  

</select>
                  </div>

</div>
        </section>

        <h3>Ficha Médica</h3>
            <section>

            <center>   <h3>Ficha Médica</h3> </center>

            <div class="row">
            <div class="form-group col-md-4">
              <label>Tipo sanguíneo</label>
                <Select class="form-control"  name="tipoSanguineo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
</select>
</div>
<div class="form-group col-md-4">
              <label>Fator RH</label>
                <Select class="form-control"  name="fatorRh" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Positivo">Positivo</option>
                  <option value="Negativo">Negativo</option>
                  
</select>
</div>


<div class="form-group col-md-4">
<label>Altura</label>
  <input class="form-control"  maxlength="100" name="altura" required="required" type="text" onkeyup="mascara('#,## m',this,event,true)">
</div>

<div class="form-group col-md-4">
<label>Peso</label>
  <input class="form-control"  maxlength="100" name="peso" required="required" type="text" >
</div>

<div class="form-group col-md-4">
              <label>Utiliza os seguintes equipamentos de auxílio</label>
                <Select class="form-control"  name="equipamentosAuxilio" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Não utiliza">Não utiliza</option>
                  <option value="Vespertino">Óculos</option>
                  <option value="lentes de contato">Lentes de contato</option>
                  <option value="Aparelhos dentários">Aparelhos dentários</option>
                  <option value="Sondas">Sondas</option>
                  <option value="Marcapasso">Marcapasso</option>
                  <option value="Aparlhos">Aparlhos de audição</option>
                  <option value="Outros">Outros</option>
</select>
</div>



      


<div class="form-group col-md-10">
              <label>Permitir administrar medicamentos por profissionais em sáude que atuam no Grupo</label>
                <Select class="form-control"  name="permicao" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
</select>
</div>


<div class="form-group col-md-4">
              <label>Emergencias Médicas</label>
                <Select class="form-control"  name="emergenciasMedicas" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Aguardar Acompanhamento dos Pais/Responsavel">Aguardar Acompanhamento dos Pais/Responsável</option>
                  <option value="Aceitar decisões médicas">Aceitar decisões médicas</option>
                  
</select>
</div>


<div class="form-group col-md-4">
              <label>Avisar em Emergências</label>
                <Select class="form-control"  name="avisarEmergencia" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Pais/Responsavel">Pais/Responsável</option>
                  <option value="Outro">Outro</option>
                  
                  
</select>
</div>

<div class="form-group col-md-4">
              <label>Medicamentos em uso(contínuo ou não)</label>
                <Select class="form-control"  name="medContinuos" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>

<div class="form-group col-md-4">
<label>Alergia cite se tiver</label>
  <input class="form-control"  maxlength="100" name="alergia" required="required"  type="text">
</div>


<div class="form-group col-md-4">
<label>Plano médico (Não obrigatório)</label>
  <input class="form-control"  maxlength="100" name="planoMedico" required="required" type="text">
</div>
<div class="form-group col-md-4">
<label>Número carteira plano médico</label>
  <input class="form-control"  maxlength="100" name="numCarteira"  type="text">
</div>



                  </div>
        </section>

        <h3>Ficha Médica Finalização</h3>
            <section>

            <center>   <h3>Ficha Médica Finalização</h3> </center>
            <div class="row">
            <div class="form-group col-md-4">
              <label>Sabe nadar ?</label>
                <Select class="form-control"  name="nadar" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>

<div class="form-group col-md-4">
              <label>É sonâmbulo ?</label>
                <Select class="form-control"  name="sonambulo" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>

<div class="form-group col-md-4">
              <label>Problemas cardíacos</label>
                <Select class="form-control"  name="cardiaco" maxlength="20" required="required" type="">
                  <option >Selecione</option>
                <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  
</select>
</div>


<div class="form-group col-md-4">
<label>Restrições a alimentos ?</label>
  <input class="form-control"  maxlength="100" name="restricoesAlimentos" required="required" type="text" >
</div>

<div class="form-group col-md-4">
<label>Possui impedimento Físico ?</label>
  <input class="form-control"  maxlength="100" name="impedimentoFisico" required="required" type="text" >
</div>
  </div>
  <center><h3>Distúbios psico e deficiências (colocar não se não possuir)</h3></center>
  <div class="row">
    
  <div class="form-group col-md-6">
<label>A presenta Distúbio de comportamento ?</label>
  <input class="form-control"  maxlength="100" name="distubioComportamento" required="required" type="text" placeholder="ex: Conduta, hiperatividade, etc" >
</div>


<div class="form-group col-md-6">
<label>A presenta Distúbio de Alimentar ?</label>
  <input class="form-control"  maxlength="100" name="disturbioAlimentar" required="required" type="text" placeholder="ex: Anorexia nervosa, bulimia nervosa, etc " >
</div>
      
<div class="form-group col-md-6">
<label>A presenta Distúbio de Ansiedade Fóbica ?</label>
  <input class="form-control"  maxlength="100" name="disturbioAnsiedade" required="required" type="text" placeholder="ex: Distúrbio do pânico, agorafobia, etc " >
</div>

<div class="form-group col-md-6">
<label>Deficiências</label>
  <input class="form-control"  maxlength="100" name="deficiencia" required="required" type="text" placeholder="ex: Física, visual, auditiva, intelectual e etc " >
</div>





                  </div>
        </section>

        </div>
    </form>
    <script src="js/mascaras.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/script.js"></script>


    




<?php
include_once("footer.php");

?>