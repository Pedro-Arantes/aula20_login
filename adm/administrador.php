<?php



session_start();
include_once('seguranca.php');

include('../conexao/conexao.php');

seguranca_adm();









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
        <li class="nav-item">
          <a class="nav-link" href="frmusuario.php">Cadastro de Usuario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Formulários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="frmcliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="../listarreserva.php">Produtos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../frmconsulta.php">Venda</a></li>
            <li><a class="dropdown-item" href="../frmconsulta.php">Vendedores</a></li>
            
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
    <?php echo "<br><h2>Olá - ".$_SESSION['usuarionome']."<h2><hr>"; ?>
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
    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>