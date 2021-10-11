<!-- this file connect the project to the base data -->
<?php

//variables and location of base data
$server = "localhost";
$dbname = "solumini";
$user = "root";
$password = "";

// conexão escolhida por usar a variável conn
if ($conn = mysqli_connect($server, $user, $password, $dbname)) {
    //echo "Conectado";
    mysqli_set_charset( $conn, 'utf8');
}else {
    echo "Erro de conexão";
}

/*
//função para colocar as datas no padrão brasileiro dd/mm/aaaa
function mostra_data($data){
    $d = explode('-', $data); //explode retorna um array
    $escreve = $d[2]."/" .@d[1] ."/" .$d[0]; //troca de lugar dos arrays concatenando eles
    return $escreve;
}
*/



