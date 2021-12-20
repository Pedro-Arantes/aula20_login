<?php 

$idcliente = isset($_GET["idcliente"]) ? $_GET["idcliente"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdsistema";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblclientes where idcliente= :idcliente";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idcliente",$idcliente);
            $stmt->execute();
            header("Location:listarclientes.php");
        }


        if($idcliente){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblclientes where idcliente= :idcliente";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idcliente",$idcliente);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($cliente);
        }
        if($_POST){
            if($_POST["idcliente"]){
                $sql = "UPDATE tblclientes SET cliente=:cliente, email=:email WHERE idcliente =:idcliente";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":cliente", $_POST["cliente"]);
                $stmt->bindValue(":email", $_POST["email"]);
                $stmt->bindValue(":idcliente", $_POST["idcliente"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblclientes(cliente,email) VALUES (:cliente,:email)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":cliente",$_POST["cliente"]);
                $stmt->bindValue(":email",$_POST["email"]);
                $stmt->execute(); 
            }
            header("Location:listarclientes.php");
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

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="icon.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Adm
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="administrador.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Formulários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmcliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="frmreserva.php">Produtos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="frmvenda.php">Venda</a></li>
            <li><a class="dropdown-item" href="frmvendedores.php">Vendedores</a></li>
            
          </ul>
        </li>
        <!--Itens separados na navbar-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Listas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="listarclientes.php">Cliente</a></li>
            <li><a class="dropdown-item" href="listarprodutos.php">Produto</a></li>
            <li><hr class="dropdown-divider"></li>

            <li><a class="dropdown-item" href="listarvendas.php">Vendas</a></li>
            <li><a class="dropdown-item" href="listarvendedores.php">Vendedor</a></li>
            <li><a class="dropdown-item" href="listarusuarios.php">Usuario</a></li>
          </ul>
        </li>
        
          
        
      </ul>
      <form class="d-flex">
        
        <button href="<?php echo "<a class='btn btn-outline-warning' href='sair.php'>Deslogar</a>";  ?>" class="btn btn-outline-warning" type="submit">Deslogar</button>
      </form>
    </div>
  </div>
</nav>
<div class="container">
<h1>Cadastro de Clientes</h1>
<form method="POST">
Nome  <input type="text" name="cliente"        value="<?php echo isset($cliente) ? $cliente->cliente : null ?>"><br>
email <input type="text" name="email"       value="<?php echo isset($cliente) ? $cliente->email : null ?>"><br>
<input type="hidden"     name="idcliente"   value="<?php echo isset($cliente) ? $cliente->idcliente : null ?>">
<input  class="btn btn-outline-success" type="submit">
</form>
<a class="btn btn-outline-info" href="administrador.php">volta</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>