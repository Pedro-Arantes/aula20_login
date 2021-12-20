<?php
include('../conexao/conexao.php');

try{
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdsistema";
    $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
    $sql = "SELECT * from tblclientes";
    $qry = $con->query($sql);
    $clientes = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($clientes);
    //die();
} catch(PDOException $e){
    echo $e->getMessage();

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Listar Clientes</title>
</head>
<body>
    
<h1>Lista de Clientes</h1>
<hr>
<a  class="btn btn-outline-success"href="frmcliente.php">Novo Cadastro</a>
<hr>
<table class="table table-dark table-striped ">
    <thead>
        <tr>
           <th>id</th> 
           <th>Cliente</th>
           <th>email</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente) { ?>
        <tr>
            <td><?php echo $cliente->idcliente ?></td>
            <td><?php echo $cliente->cliente ?></td>
            <td><?php echo $cliente->email ?></td>
            <td><a class="btn btn-outline-primary" href="frmcliente.php?idcliente=<?php echo $cliente->idcliente ?>">Editar</a></td>
            <td><a class="btn btn-outline-danger" href="frmcliente.php?op=del&idcliente=<?php echo  $cliente->idcliente ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
<a class="btn btn-outline-info" href="administrador.php">volta</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>