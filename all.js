$(function(){
    // Executa assim que o botão de salvar for clicado
    $('#but_salvar').click(function(e){
        
        // Cancela o envio do formulário
        e.preventDefault();

        // Pega os valores dos inputs e coloca nas variáveis
  

        var idAluno = $('#idAluno').val();
        var idEncontro = $('#idEncontro').val();
        var idMonitor = $('#idMonitor').val();
        var idPolo = $('#idPolo').val();
        
       


        // Método post do Jquery
        $.post('salvar_chamada.php', {
            idAluno:idAluno,
            idEncontro:idEncontro,
            idMonitor:idMonitor,
            idPolo:idPolo
            
        
        }, function(resposta){
            // Valida a resposta
            if(resposta == 1){
                // Limpa os inputs
               
                alert('Mensagem enviada com sucesso.');
            }else {
                alert(resposta);
            }
        });
        
    });
});