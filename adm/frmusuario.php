<?php 

$idusuario = isset($_GET["idusuario"]) ? $_GET["idusuario"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdsistema";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblusuarios where idusuario= :idusuario";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idusuario",$idusuario);
            $stmt->execute();
            header("Location:listarusuarios.php");
        }


        if($idusuario){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblusuarios where idusuario= :idusuario";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idusuario",$idusuario);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($cliente);
        }
        if($_POST){
            if($_POST["idusuario"]){
                $sql = "UPDATE tblusuarios SET nome=:nome, email=:email , senha=:senha , idsituacao=:idsituacao, idnivelacesso=:idnivelacesso , criado=:criado, modificado=:modificado WHERE idusuario =:idusuario";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":nome", $_POST["nome"]);
                $stmt->bindValue(":email", $_POST["email"]);
                $stmt->bindValue(":senha", $_POST["senha"]);
                $stmt->bindValue(":idsituacao", $_POST["idsituacao"]);
                $stmt->bindValue(":idnivelacesso", $_POST["idnivelacesso"]);
                $stmt->bindValue(":criado", $_POST["criado"]);
                $stmt->bindValue(":modificado", $_POST["modificado"]);
                $stmt->bindValue(":idusuario", $_POST["idusuario"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblusuarios(nome,email,senha,idsituacao,idnivelacesso,criado,modificado) VALUES (:nome,:email,:senha,:idsituacao,:idnivelacesso,:criado,:modificado)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":nome", $_POST["nome"]);
                $stmt->bindValue(":email", $_POST["email"]);
                $stmt->bindValue(":senha", md5($_POST["senha"]) );
                $stmt->bindValue(":idsituacao", $_POST["idsituacao"]);
                $stmt->bindValue(":idnivelacesso", $_POST["idnivelacesso"]);
                $stmt->bindValue(":criado", $_POST["criado"]);
                $stmt->bindValue(":modificado", $_POST["modificado"]);
                $stmt->execute(); 
            }
            header("Location:listarusuarios.php");
        } 
    } catch(PDOException $e){
         echo "erro".$e->getMessage;
        }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Criar Usuario</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="administrador.php">Página inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="conexao.php">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmcliente.php">Clientes</a></li>
            <li><a class="dropdown-item" href="frmprodutos.php">Produtos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="frmvendedores.php">Vendedores</a></li>
            <li><a class="dropdown-item" href="frmvenda.php">Vendas</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Busca</button>
      </form>
    </div>
  </div>
</nav>
<div class="container">
<h1>Cadastro de Usuarios</h1>
<form method="POST">
    <div class="row mb-3">
        <div class="col">
        Nome  <input  class="form-control" type="text" name="nome"        value="<?php echo isset($user) ? $user->nome : null ?>"><br>
        </div>
        <div class="col">
        Email <input class="form-control" type="text" name="email"       value="<?php echo isset($user) ? $user->email : null ?>"><br>
        </div>
        <div class="col">
        Senha <input class="form-control" type="text" name="senha"       value="<?php echo isset($user) ? $user->senha : null ?>"><br>
        </div>

    </div>
    <div class="row mb-3">
        <div class="col">
        Id Situação <input class="form-control" type="text" name="idsituacao"       value="<?php echo isset($user) ? $user->idsituacao : null ?>"><br>
        </div>
        <div class="col">
        Nivel de Acesso <input class="form-control" type="text" name="idnivelacesso"       value="<?php echo isset($user) ? $user->idnivelacesso : null ?>"><br>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
        Data de Criaçao <input class="form-control" type="date" name="criado"       value="<?php echo isset($user) ? $user->criado : null ?>"><br>
        </div>
        <div class="col">
        Data de Modificação <input class="form-control" type="date" name="modificado"       value="<?php echo isset($user) ? $user->modificado : null ?>"><br>
        </div>
    </div>












<input type="hidden"     name="idusuario"   value="<?php echo isset($user) ? $user->idusuario : null ?>">
<input  class="btn btn-outline-success" type="submit">
</form>
<a class="btn btn-outline-info" href="administrador.php">volta</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>