<?php

	require_once("alert.php");

	function conectar(){
		return conectarBD("localhost", "swturismo", "root", "");
	}

	function conectarBD($servidor="localhost", $banco, $usuario="root", $senha=""){

		$conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die(mysqli_connect_error);

		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');

		return $conexao;
	}

	function selecionar($conexao, $query){

		$resultado = $conexao->query($query);

		if (mysqli_num_rows($resultado) > 0) {
			return $resultado;
			}

		else {
			return 0;
			}
	}

	function executar($conexao, $sql) {

		if ($conexao->query($sql)) {
			return true;
			}

		else {
			return false;
			}

	}


?>