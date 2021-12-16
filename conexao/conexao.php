<?php

    $servidor = "localhost";

    $usuario = "root";

    $senha = "";

    $dbname = "bdsistema";

    

    //Criar a conexão

    $con = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(!$con){

        die("Falha na conexao: " . mysqli_connect_error());

    }else{

        //echo "Conexao realizada com sucesso";

    }

?>

Pressione Shift + Tab para acessar o histórico do bate-papo.
