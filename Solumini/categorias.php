<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    //conexão com o arquivo com os dados do banco
    include ('config.php');        
?>

<!-- arquivo para a exibição das empresas com a categoria selecionada -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categorias</title>
        
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <?php
        
        $sql = "SELECT case WHEN expire_date < now() THEN 'expirado' ELSE 'ativo' END situacao_contrato FROM contracts";
        
        ?>
    </body>
</html>
