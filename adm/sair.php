<?php

	session_start();

	unset(

		$_SESSION['idusuario'],

		$_SESSION['usuarionome'],

		$_SESSION['idNivelAcesso'] ,

		$_SESSION['idSituacao']

	);

	

	$_SESSION['loginDeslogado'] = "Deslogado com Sucesso";

	header("Location: login.php");

?>