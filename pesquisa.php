<?php
session_start();
include_once("conexao.php");
$num_pag = 0


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
        <div class="pesquisar">
            <h1>Pesquisar Clientes</h1>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form method="POST" action="">
                <!-- <Label for="pesuisaClienteNome">Nome:</Label> -->
                <input type="text" id="txtbusca" name="pesuisaClienteNome" placeholder="Digite o nome do cliente"  required autofocus >
                <!-- <label for="pesquisar"><img src="_img/pesquisar.png"></label> -->
                <input type="submit" class="btn btn-outline-success" id="btnBusca"name="pesquisar"value="BUSCAR">

            </form>
        <?php
        echo "<table class='table table-striped table-bordered table-condensed table-hover'>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data nascimento</th>
            <th>Sexo</th>
            <th>Acão</th>
            </tr>";


        $pesquisarcliente = filter_input(INPUT_POST,'pesuisaClienteNome', FILTER_SANITIZE_STRING);
        if($pesquisarcliente){
            $nome = filter_input(INPUT_POST, 'pesuisaClienteNome', FILTER_SANITIZE_STRING);
            // $sobrenome = filter_input(INPUT_POST, 'pesuisaClienteNome', FILTER_SANITIZE_STRING);
            
                $reultado_pesquisa = "SELECT * FROM cliente WHERE nome LIKE '%$nome%' ";
                $resultado_encontrado = mysqli_query($conecta_db, $reultado_pesquisa);
              
                while($row_cliente = mysqli_fetch_assoc($resultado_encontrado)){
                    $id =  $row_cliente['id'];
                    $nome =  $row_cliente['nome'];
                    $cpf =  $row_cliente['cpf'];
                    // $nascimento =  $row_cliente['nascimento'];
                    $nascimento= date_format(new DateTime($row_cliente['nascimento']), "d/m/Y");
                    $sexo =  $row_cliente['sexo'];


                    echo "<tr>";
                    echo"<td>$id</td>";
                    echo"<td>$nome</td>";
                    echo"<td>$cpf</td>";
                    echo"<td>$nascimento</td>";
                    echo"<td>$sexo</td>";
                    echo"<td><a class='btn btn-outline-danger btn-sm' href='dadosApagar.php?id=$id'" . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><a class='btn btn-outline-success btn-sm' href='editarcliente.php?id=$id'>Editar</a>";
                    
                    echo"</tr>";


                }
             

        }

        echo "</table>";
        ?>
            

        </div>

        
            </nav>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="_js/personalizado.js"></script>	

    </body>
</html>