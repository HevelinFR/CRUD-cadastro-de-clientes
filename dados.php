<?php
    session_start();
    include_once("conexao.php");
    

    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        //$sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        

       $cadastro_cliente = "INSERT INTO cliente(nome, cpf, nascimento, sexo) VALUES ('$nome','$cpf', '$nascimento', '$sexo')";
       $resultado_cliente = mysqli_query($conecta_db, $cadastro_cliente);
    }
    

    if(mysqli_insert_id($conecta_db)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: cadastro.php");
    
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'>Falha ao cadastrar Usuário!</p>";
        header("Location: cadastro.php");
    
    }

   
    
    

?>