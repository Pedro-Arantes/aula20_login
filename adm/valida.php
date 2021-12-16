<?php

//$usuario = $_POST['txt_usuario'] ;
//$senha = md5($_POST['txt_senha'])  ;

//echo "Usuario: {$usuario} - senha: {$senha} ";



session_start();

include('../conexao/conexao.php');



if((isset($usuario)) && (isset($senha))){

    //verificar se existe comandos de sql-injection

    $usuario = mysqli_real_escape_string($con,$_POST['txt_usuario']);

    $senha = mysqli_real_escape_string($con,$_POST['txt_senha']);

    $senha = md5($senha);



    $procura_usuario = "SELECT * from tblusuarios where email='$usuario' && senha = '$senha'";

    $resultado_usuario = mysqli_query($con,$procura_usuario);



    $resultado = mysqli_fetch_array($resultado_usuario);

    echo "<pre>";

    print_r($resultado);

    if((isset($resultado))){
        $_SESSION['idusuario'] = $resultado['idusuario'];

        $_SESSION['usuarionome'] = $resultado['nome'];

        $_SESSION['idNivelAcesso'] = $resultado['idnivelacesso'];

        $_SESSION['idSituacao'] = $resultado['idsituacao'];

        if ($_SESSION['idNivelAcesso']=="1") {
            header("Location:administrador.php");
        } elseif ($_SESSION['idNivelAcesso']=="2"){
            header("Location:colaborador.php");
        } elseif ($_SESSION['idNivelAcesso']=="3") {
            header("Location:usuario.php");
        } elseif ($_SESSION['idNivelAcesso']=="4") {
            header("Location:fornecedor.php");
        } else{
            $_SESSION['loginErro'] = "Entre em contato com Admin";
            header("Location:login.php");
        }
    } else{
        $_SESSION['loginErro'] = "Usuario ou senha inválido";
        header("Location:login.php");
    } 





}else{

    $_SESSION['loginErro'] = "Usuário ou senha inválido";

    header("Location: login.php");

}