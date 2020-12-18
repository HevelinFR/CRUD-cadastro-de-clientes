<?php
    session_start();
    include_once("conexao.php");
    $id= filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
    if(!empty($id)){
        $result_apagar = "DELETE FROM cliente WHERE id='$id'";
        $resultado_apagar = mysqli_query($conecta_db, $result_apagar);

        if(mysqli_affected_rows($conecta_db)){
            $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso!</p>";
            header("Location: pesquisa.php");
        
        }
        else{
            $_SESSION['msg'] = "<p style='color:red;'>Falha ao apagar usuário!</p>";
            header("Location:  pesquisa.php");
        }

    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário!</p>";
        header("Location:  pesquisa.php");
    
    }


?>