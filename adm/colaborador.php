<?php



session_start();

include('../conexao/conexao.php');



echo "Olá - ".$_SESSION['usuarionome']."<hr>";



echo "<a href='login.php'>Sair</a>";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colaborador</title>
</head>
<body>
    <h1>Seja Bem vindo</h1>
</body>
</html>