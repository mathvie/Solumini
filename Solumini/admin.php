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
        <title>Administrador</title>
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body>
        
        <?php
            //para buscar no banco, se usa o comando LIKE (não será usado nesse projeto)
            $sql = "SELECT * FROM companies";
            
            //variavel para receber as tuplas encontradas
            $dados = mysqli_query($conn, $sql);  
        ?>
        
        <!-- exibição de todas as empresas cadastradas em formato de tabela -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Empresa</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>   
                            <?php
            
                                //laço que percorre o vetor e marca o próximo e guarda nas linhas da tabela
                                while($linha = mysqli_fetch_assoc($dados)){
                                    $id = $linha['id'];
                                    $name = htmlspecialchars($linha['name']);
                                    $category_id = $linha['category_id'];
                                    $city = $linha['city'];
                                    $state = $linha['state'];
                                    $description = $linha['description'];
                                    $address = $linha['address']; 
                                    
                                    //exibição dos itens na tabela
                                    echo "<tr>
                                                <th scope='row'>$name</th>
                                                <td>$category_id</td>
                                                <td>$city</td>
                                                <td>$state</td>
                                                <td>$description</td>
                                                <td>$address</td>
                                                <td width=150px>
                                                    <a href='cadastro_edit.php?id=$id'  class='btn btn-success btn-sm'>Editar<a/> 
                                                    <a href='#'<button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" .'""' ."pegar_dados($id, '$name')" .'"'."></button>Excluir</a>
                                                </td>
                                            </tr>"; //para confirmar exclusão, decidir usar um modal para haver confirmação 
                                                    // concatenei muito por causa do sinal de " e '
                                }   
                            ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
        
        
        <!-- Modal pata confirmação de exclusão -->
        <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="cadastro_delete_script.php" method="post">
                    <p> Deseja realmente excluir essa empresa? </p>
                    <b id="nome_empresa">Nome da empresa</b><!-- identificador js para saber o nome -->
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="name" id="nome_empresa_1" value=""><!-- nome_empresa_1 porque já foi criado a mesma variável acima -->
                    <input type="text" name="id" id="id_empresa" value="">
                    <input type="submit" class="btn btn-danger" value="Sim">
              </form>
              </div>
            </div>
          </div>
        </div>
        

        <!-- formulário para cadastro de novas empresas -->
        <div class="container">
            <div class ="row">
                <div class="col">
                    <h2>Novo Cadastro de Empresa</h2>
                    <form action="cadastro_script.php" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
            
                        <div >
                            <label>Categoria</label>
                            <select id="category_id" name="category_id" class="form-select" required>
                            <option selected="">Selecione...</option>
                                    <?php
                                    //select no banco por id e exibição do nome das categorias
                                    $sql = "SELECT id, name FROM company_categories ORDER BY name ";
                                    $resultado = mysqli_query($conn, $sql);
                    
                                    //se tiver resultado e enquanto tiver, mostra todos com id trocado por nome
                                    if(mysqli_num_rows($resultado) > 0){
                                        while ($dados = mysqli_fetch_array($resultado))
                                        {                  
                                            echo "<option value='".$dados['id']."'>".$dados['name']."</option>";          
                                        }              
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="city" required>
                        </<div>
                         
                        <div class="form-group">    
                            <label>Estado</label>
                            <input type="text" class="form-control" name="state" required>
                        </div>
            
                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                            <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"">Salvar</button>  
                        </div>
                    </form>
                </div>
            </div>
        </<div>

        <div class="container">
            <div class="align-items-end">
                <div class="col align-self-center">
                    <a href="index.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="align-items-end">
                <div class="col align-self-center">
                    <a href="contrato.php" class="btn btn-secondary">Contratos</a>
                </div>
            </div>
        </div>    
     
    <!-- script js para escrever o nome da empresa na modal e passar o id quando for excluir -->
    <script type="text/javascript">
        function pegar_dados(id_empresa, name){
            document.getElementById('nome_empresa').innerHTML = name;
            document.getElementById('nome_empresa_1').value = name;
            document.getElementById('id_empresa').value = id_empresa; //propriedade valor, não html
        }
    </script>
            
    </body>
</html>
