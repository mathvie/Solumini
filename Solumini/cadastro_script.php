<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- Esse arquivo é para o cadastro de novas empresas no bd, onde ficará salvo os dados e enviados -->
<?php
    //conexão com o arquivo com os dados do banco
    include ('config.php');        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //conexão com o arquivo com os dados do banco
            include ('config.php');   
        
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];       
            $city = $_POST['city'];       
            $state = $_POST['state'];         
            $description = $_POST['description'];        
            $address = $_POST['address'];
            
            $sql = "INSERT INTO `companies`(`name`, `category_id`, `city`, `state`, `description`, `address`) VALUES ('$name','$category_id','$city','$state','$description','$address')";
        
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Empresa salva'); </script>";
            } else {
                echo "<script>alert('Erro'); </script>";
            }
        ?>
        <a href="admin.php" class="btn btn-primary">Voltar</a>
        
    </body>
</html>
