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
    <title>Listar Clientes</title>
</head>
<body>
    
<h1>Lista de Clientes</h1>
<hr>
<a href="frmcliente.php">Novo Cadastro</a>
<hr>
<table border=1>
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
            <td><a href="frmcliente.php?idcliente=<?php echo $cliente->idcliente ?>">Editar</a></td>
            <td><a href="frmcliente.php?op=del&idcliente=<?php echo  $cliente->idcliente ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>