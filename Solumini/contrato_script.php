<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- Esse arquivo é para o cadastro de novos CONTRATOS no bd -->
<?php
    //conexão com o arquivo com os dados do banco
    include ('config.php');        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>nOVO cONTRATO</title>
    </head>
    <body>
        <?php
            //conexão com o arquivo com os dados do banco
            include ('config.php');   
        
            $company_owner = $_POST['company_owner'];
            $company_id = $_POST['company_id'];       
            $seller_name = $_POST['seller_name'];       
            $expire_date = $_POST['expired_date'];             
            
            $sql = "INSERT INTO `contracts`(`company_owner`, `company_id`, `seller_name`, `expired_date`) VALUES ('$company_owner','$company_id','$seller_name','$expire_date')";
        
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Contrato salvo'); </script>";
            } else {
                echo "<script>alert('Erro'); </script>";
            }
        ?>
        <a href="admin.php" class="btn btn-primary">Voltar</a>
        
    </body>
</html>
