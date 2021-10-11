<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- Esse arquivo é para a alteração de contratos no bd -->
<?php
    //conexão com o arquivo com os dados do banco
    include ('config.php');        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração de Cadastro</title>
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            //operador ternário para buscar o id
            $id = $_GET['id'] ?? ''; //quando for feito o POST do botão, será perdido esse GET, pos isso será criado um hidden button
            
            $sql = "SELECT * FROM contracts WHERE id = $id"; 
            
            $dados = mysqli_query($conn, $sql);
            $linha = mysqli_fetch_assoc($dados);
        ?>
        
        <!-- Campos para alteração -->
        <div class="container">
            <div class ="row">
                <div class="col">
                    <h2>Alteração de Cadastro</h2>
                    <form action="contrato_edit_script.php" method="post">
                        <div class="form-group">
                            <label>Nome do empresário</label>
                            <input type="text" class="form-control" name="companyt_owner" required value="<?php echo $linha['company_owner'];?>">
                        </div>
            
                        <div >
                            <label>Empresa</label>
                            <select id="company_id" name="company_id" class="form-select" required value="">
                            <option selected=""><?php echo $linha['company_id'];?></option>
                                    <?php
                                    //select no banco por id e exibição do nome das empresas
                                    $sql = "SELECT id, name FROM companies ORDER BY id ";
                                    $resultado = mysqli_query($conn, $sql);
                    
                                    //se tiver resultado e enquanto tiver, mostra todos com id trocado por nome
                                    if(mysqli_num_rows($resultado) > 0){
                                        while ($dados = mysqli_fetch_array($resultado))
                                        {                  
                                            echo "<option value='".$dados['id']."'>".utf8_encode($dados['name'])."</option>";          
                                        }              
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Vendedor</label>
                            <input type="text" class="form-control" name="city" required value="<?php echo $linha['seller_name'];?>">
                        </<div>
                         
                        <div class="form-group">    
                            <label>Data de Expiração</label>
                            <input type="text" class="form-control" name="state" value="<?php echo $linha['expire_date'];?>">
                        </div>
            
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary"></button>
                            <input type="hidden" name="id" value="<?php echo $linha['id'];?>"> <!-- input hidden para passar o id para cadastro_edit_script.php -->
                        </div>
                    </form>
                </div>
            </div>
        </<div>
            
        <div class="container">
            <div class="align-items-end">
                <div class="col align-self-center">
                    <a href="contrato.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
        
    </body>
</html>
