<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
$resultado = "SELECT * FROM cliente WHERE id = '$id'";
$result2 = mysqli_query($conecta_db, $resultado);
$lerResultado = mysqli_fetch_assoc($result2);
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="_css/style.css" rel="stylesheet">
    <title>Editar Clientes</title>
</head>
<body>
    
<header>
    <nav  class="nav-bar">
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
        <h1>Editar Cliente</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form class="form-cad" method="post" action="dadosEditar.php" id="register-form" >
            <div clss="full-box">
            <!--CAMPO FOTO-->
            <input type="hidden" name="id" value="<?php echo $lerResultado['id']; ?>">
            <label for="btn_foto"><img src="_img/addfoto.png"></label>
                <input type="file" id="btn_foto" name="foto" style="display: none;">
            </div>
<!--############################################################################################################-->
            <div class="half-box spacing" > <!-- DIV PARA OS INPUTS QUE OCUPAM METADE DO CONTAINER-->
                <!-- CAMPO NOME -->
                <Label for="nome">NOME</Label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" value="<?php echo 
                $lerResultado['nome']; ?>" required autofocus>

                <!--CAMPO CPF-->
                <Label for="cpf">CPF</Label>
                <input type="text" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="Ex.: 000.000.000-00" value="<?php echo 
                $lerResultado['cpf']; ?>" required autofocus >
               
            </div>
<!--############################################################################################################-->
            <div class="half-box spacing"> <!-- DIV PARA OS INPUTS QUE OCUPAM METADE DO CONTAINER-->
                <!-- CAMPO DATA DE NASCIMENTO -->
                <Label for="data_nascimento">DATA DE NASCIMENTO</Label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo 
                $lerResultado['nascimento']; ?>" required autofocus>
               
                
                <!--CAMPO SEXO-->
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" required autofocus>
                    <option value="<?php echo $lerResultado['sexo']; ?>"><?php echo $lerResultado['sexo']; ?></option>
                    <option value="">Feminino</option>
                    <option value="">Masculino</option>
                    <option value="">Outro</option>
                </select>
            </div>
            <div class="full-box">
                <input type="submit" name="acao" value="EDITAR" id="btn-registrar">
            </div>
            
<!--############################################################################################################-->
        </form>     
        </div>
    </div> <!--DIV CADASTRO--> 
  
</body>
</html>