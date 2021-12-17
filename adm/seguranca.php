<?php
	function seguranca_adm(){
		if((empty($_SESSION['idusuario'])) || (empty($_SESSION['idSituacao'])) || (empty($_SESSION['idNivelAcesso']))){		
			$_SESSION['loginErro'] = "Área restrita";
			header("Location: login.php");
		}/*else{
			if($_SESSION['idnivelacesso'] != "1"){
				$_SESSION['loginErro'] = "Área restrita";
				header("Location: login.php");
			}
		}*/
	}
?>