<?php 

$idvendedor = isset($_GET["idvendedor"]) ? $_GET["idvendedor"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdsistema";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblvendedores where idvendedor = :idvendedor";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idvendedor",$idvendedor);
            $stmt->execute();
            header("Location:listarvendedores.php");
        }


        if($idvendedor){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblvendedores where idvendedor= :idvendedor";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idvendedor",$idvendedor);
            $stmt->execute();
            $vendedor = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($cliente);
        }
        if($_POST){
            if($_POST["idvendedor"]){
                $sql = "UPDATE tblvendedores SET vendedor=:vendedor, dataadmissao=:dataadmissao, salario=:salario WHERE idvendedor =:idvendedor";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":vendedor", $_POST["vendedor"]);
                $stmt->bindValue(":dataadmissao", $_POST["dataadmissao"]);
                $stmt->bindValue(":salario", $_POST["salario"]);
                $stmt->bindValue(":idvendedor", $_POST["idvendedor"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblvendedores(vendedor,dataadmissao,salario) VALUES (:vendedor,:dataadmissao,:salario)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":vendedor",$_POST["vendedor"]);
                $stmt->bindValue(":dataadmissao",$_POST["dataadmissao"]);
                $stmt->bindValue(":salario",$_POST["salario"]);
                $stmt->execute(); 
            }
            header("Location:listarvendedores.php");
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

    <title>Formulario de Vendedores</title>
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
<h1>Cadastro de Vendedores</h1>
<form method="POST">
Vendedor <input type="text" name="vendedor"        value="<?php echo isset($vendedor) ? $vendedor->vendedor : null ?>"><br>
Data de admissão <input type="data" name="dataadmissao"       value="<?php echo isset($vendedor) ? $vendedor->dataadmissao : null ?>"><br>
Salário <input type="text" name="salario"       value="<?php echo isset($vendedor) ? $vendedor->salario : null ?>"><br>
<input type="hidden"     name="idvendedor"   value="<?php echo isset($vendedor) ? $vendedor->idvendedor : null ?>">
<input class="btn btn-outline-success" type="submit">
</form>
<a class="btn btn-outline-info" href="listarvendedores.php">volta</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>