<?php 

	require_once("inc/seguranca.php");

	if (validarPermissao()) {

		require_once("html/header.html");

		require_once("html/menuadministrativo.html");

		require_once("html/configurabanner.html");

		require_once("html/footer.html");

	}
	else {
		header("location:index.php");
	}

?>