<?php



session_start();
include_once('seguranca.php');

include('../conexao/conexao.php');

seguranca_adm();



echo "<br><h2>Olá - ".$_SESSION['usuarionome']."<h2><hr>";





?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<body>
    <h1>Seja Bem vindo! u.u</h1>
    <p>Deseja Ver a lista de clientes?</p>
    <a href="listarclientes.php">Listar clientes</a>
    <p>Ou deseja adicionar um novo?</p>
    <a href="frmcliente.php">Cadastrar cliente</a>
    <p>Se nenhuma das opções acima foi de seu agrado talvez queira adicionar um novo usuario?</p>
    <a href="frmusuario.php">Cadastrar Usuario</a>
    <p>Ou talvez ver a lista de usuários?</p>
    <a href="listarusuarios.php">Listar Usuarios</a>
    <hr>
    <?php echo "<a class='btn btn-outline-warning' href='sair.php'>Deslogar</a>";  ?>
</body>
</html>