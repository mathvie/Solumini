<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- Esse arquivo é recebido as alterações das empresas e as salva em bd -->
<?php
    //conexão com o arquivo com os dados do banco
    include ('config.php');        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração de Contratos</title>
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <?php
            //conexão com o arquivo com os dados do banco
            include ('config.php');   
            $id = $_POST['id'];
            $company_owner = $_POST['company_owner'];
            $company_id = $_POST['company_id'];       
            $seller_name = $_POST['seller_name'];       
            $expire_date = $_POST['expire_date'];         
                    
            $sql = "UPDATE `contracts` set `company_owner` = '$company_owner', `company_id` = '$company_id', `seller_name` = '$seller_name', `expire_date` = '$expire_date' WHERE id = $id";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Contrato alterado'); </script>";
            } else {
                echo "<script>alert('Erro'); </script>";
            }
        ?>
        <a href="admin.php" class="btn btn-primary">Voltar</a>
        
    </body>
</html>
