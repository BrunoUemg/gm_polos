<?php

include_once "dao/conexao.php";
	// Cria as variáveis com os posts enviados
	$idAluno = $_POST['idAluno'];
	$idEncontro = $_POST['idEncontro'];
	$idPolo = $_POST['idPolo'];
    $idMonitor = $_POST['idMonitor'];
    $date = date("d/m/y");
    

	// Valida se existe algum campo vazio
	// Se ouver, retorna a mensagem de erro
	
		
		// Envia os dados pelo método query
        $sql1 = "INSERT INTO lista_chamda (dataChamada, idAluno, idEncontro, presenca, idMonitor, idPolo) VALUES ('$date', '$idAluno', 	'$idEncontro',	 0 , '$idMonitor', '$idPolo' )";
        if ($con->query($sql1) === TRUE){
        
            
        } else {
            echo "Erro para inserir: " . $con->error; 
        
        }
        $con->close();
        
		// Valida se as informações foram enviadas com sucesso
		

	