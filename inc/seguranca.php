<?php

	session_start();

	function validarPermissao() {

		if ($_SESSION["logado"]=="true"){
			return true;
		}
		else {
			return false;
		}

	}

	function incluirSession($idusuario, $usuario, $login) {
		$_SESSION["logado"] = "true";
		$_SESSION["usuario"] = $usuario;
		$_SESSION["login"] = $login;
		$_SESSION["id_usuario"] = $idusuario;
	}

	function limparSession() {
		unset($_SESSION["logado"]);
		$_SESSION["usuario"] = "";
		$_SESSION["login"] = "";
		$_SESSION["id_usuario"] = "";
	}


 ?>