<?php
include('../conexao/conexao.php');

try{
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdsistema";
    $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
    $sql = "SELECT * from tblusuarios";
    $qry = $con->query($sql);
    $user = $qry->fetchAll(PDO::FETCH_OBJ);
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
    <title>Listar Usuarios</title>
</head>
<body>
    
<h1>Lista de Usuarios</h1>
<hr>
<a href="frmusuario.php">Novo Cadastro</a>
<hr>
<table class="table">
    <thead>
        <tr>
           <th>id</th> 
           <th>Nome</th>
           <th>Email</th>
           <th>Senha</th> 
           <th>id Situação</th>
           <th>Id Nivel de Acesso</th>
           <th>Criado</th>
           <th>Modificado</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($user as $users) { ?>
        <tr>
            <td><?php echo $users->idusuario ?></td>
            <td><?php echo $users->nome ?></td>
            <td><?php echo $users->email ?></td>
            <td><?php echo $users->senha ?></td>
            <td><?php echo $users->idsituacao ?></td>
            <td><?php echo $users->idnivelacesso ?></td>
            <td><?php echo $users->criado ?></td>
            <td><?php echo $users->modificado ?></td>
            
            <td><a href="frmusuario.php?idusuario=<?php echo $users->idusuario ?>">Editar</a></td>
            <td><a href="frmusuario.php?op=del&idusuario=<?php echo  $users->idusuario ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
<a class="btn btn-outline-info" href="administrador.php">volta</a>
</body>
</html>