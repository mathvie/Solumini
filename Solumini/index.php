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

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", initial-scale=1, shrink-to-fit="no">
        <title>Solumini</title>
        
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body>
        
        <div class="container">
          <div class="row">
            <div class="col">
                <a href="index.php" class="home"><h1>Home</h1></b></a>
            </div>
            <div class="col">
                <a href="admin.php">
                    <button name="admin" class="btn btn-primary">Admin</button>
                </a>
            </div>
          </div>
        </div>
       
        <?php
        //seleciona o nome da tabela de categorias
        $consulta_categoria = "SELECT name FROM company_categories";
        
        //função para o mysql fazer a consulta
        $con_categoria = $conn->query($consulta_categoria) or die($conn->error); 
        
        //select para fazer a conta de categorias, c e cc são abreviações das tabelas
        $sql = "SELECT 
                cc.name
                ,cc.id
                ,COUNT(c.category_id) total
        FROM company_categories cc
        INNER JOIN companies c ON cc.id = c.category_id
        GROUP BY cc.id
        order by total desc";
        
        $categorias = mysqli_query($conn, $sql);       
        ?>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Categorias</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($categorias->num_rows > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($categorias)) : ?>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['total'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="3" class="font-weight-bold text-danger">Nenhum registro encontrado</td>
                            </tr>
                            <?php endif ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div> 
    </body>
</html>
