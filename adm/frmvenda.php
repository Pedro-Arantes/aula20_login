<?php 

$idvendas = isset($_GET["idvendas"]) ? $_GET["idvendas"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdsistema";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblvendas where idvendas= :idvendas";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idvendas",$idvendas);
            $stmt->execute();
            header("Location:listarvendas.php");
        }


        if($idvendas){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblvendas where idvendas= :idvendas";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idvendas",$idvendas);
            $stmt->execute();
            $vendas = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($cliente);
        }
        if($_POST){
            if($_POST["idvendas"]){
                $sql = "UPDATE tblvendas SET idvendedor=:idvendedor, idproduto=:idproduto,qtd=:qtd WHERE idvendas =:idvendas";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":idvendedor", $_POST["idvendedor"]);
                $stmt->bindValue(":idproduto", $_POST["idproduto"]);
                $stmt->bindValue(":qtd", $_POST["qtd"]);
                $stmt->bindValue(":idvendas", $_POST["idvendas"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblvendas(idvendedor,idproduto,qtd) VALUES (:idvendedor,:idproduto,:qtd)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":idvendedor",$_POST["idvendedor"]);
                $stmt->bindValue(":idproduto",$_POST["idproduto"]);
                $stmt->bindValue(":qtd",$_POST["qtd"]);
                $stmt->execute(); 
            }
            header("Location:listarvendas.php");
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

    <title>Formulario de Vendas</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Página inicial</a>
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
<h1>Cadastro de Vendas</h1>
<form method="POST">
Numero de Identificação do Vendedor  <input type="text" name="idvendedor"        value="<?php echo isset($vendas) ? $vendas->idvendedor : null ?>">
<br>

Numero de Identificação do produto <input type="text" name="idproduto"       value="<?php echo isset($vendas) ? $vendas->idproduto : null ?>">
<br>

Quantidade <input type="text" name="qtd"       value="<?php echo isset($vendas) ? $vendas->qtd : null ?>">
<br>

<input type="hidden"     name="idvendas"   value="<?php echo isset($vendas) ? $vendas->idvendas : null ?>">
<input  class="btn btn-outline-success"type="submit">
</form>
<a  class="btn btn-outline-info"href="listarvendas.php">volta</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>