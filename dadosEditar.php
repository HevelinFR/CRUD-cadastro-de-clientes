<?php
    session_start();
    include_once("conexao.php");
    

    if(isset($_POST['acao'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        

       $cadastro_cliente = "UPDATE cliente SET nome='$nome', cpf='$cpf', nascimento='$nascimento', sexo='$sexo' WHERE id='$id'";
       $resultado_cliente = mysqli_query($conecta_db, $cadastro_cliente);
    }
    

    if(mysqli_affected_rows($conecta_db)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso!</p>";
        header("Location: pesquisa.php");
    
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'>Falha ao editar usuário!</p>";
        header("Location: editarcliente.php?id=$id");
    
    }

   
    
    

?>