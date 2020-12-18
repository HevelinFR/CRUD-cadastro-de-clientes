<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="_css/style.css" rel="stylesheet">
    <title>Clientes</title>
</head>
<body>
    
<header>
    <nav class="nav-bar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"> <img src="_img/icone.png"></label>
        <ul>
            <li><a href="index.php">Home</a></li> 
            <li><a href="cadastro.php">Cadastrar</a></li> 
            <li><a href="pesquisa.php">Pesquisar</a></li> 
            <li><a href="contato.php">Contato</a> </li> 
        </ul>
    </nav>
        
</header>
<!--*****************************************************************************************************************-->
    <div class="div-cadastro">
        <div class="main-container">  
        <h1>Cadastro de Clientes</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form class="form-cad" method="post" action="dados.php" id="register-form" >
            <div clss="full-box">
            <!--CAMPO FOTO-->
            <label for="btn_foto"><img src="_img/addfoto.png"></label>
                <input type="file" id="btn_foto" name="foto" style="display: none;">
            </div>
<!--############################################################################################################-->
            <div class="half-box spacing" > <!-- DIV PARA OS INPUTS QUE OCUPAM METADE DO CONTAINER-->
                <!-- CAMPO NOME -->
                <Label for="nome">NOME</Label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required autofocus>

                <!--CAMPO CPF-->
                <Label for="cpf">CPF</Label>
                <input type="text" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="Ex.: 000.000.000-00" required autofocus >
               
            </div>
<!--############################################################################################################-->
            <div class="half-box spacing"> <!-- DIV PARA OS INPUTS QUE OCUPAM METADE DO CONTAINER-->
                <!-- CAMPO DATA DE NASCIMENTO -->
                <Label for="data_nascimento">DATA DE NASCIMENTO</Label>
                <input type="date" name="data_nascimento" id="data_nascimento" required autofocus>
               
                
                <!--CAMPO SEXO-->
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" required autofocus>
                    <option value=""></option>
                    <option value="feminino">Feminino</option>
                    <option value="masculino">Masculino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="full-box">
                <input type="submit" class="btn btn-outline-secondary" name="acao" onclick="location.href='cadastro.php'"value="REGISTRAR" id="btn-registrar">
            </div>
            
<!--############################################################################################################-->
        </form>     
        </div>
    </div> <!--DIV CADASTRO--> 
  
</body>
</html>