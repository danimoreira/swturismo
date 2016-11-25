<?php  

	require_once("conexao.php");

	$operacao = "logar";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	function ValidarUsuario(){

		$usuario = "";
		$senha = "";

		//tratamento SQL Injection
		if (isset($_POST["usrname"])) {
			$usuario = addslashes($_POST["usrname"]);
			$senha = addslashes($_POST["psw"]);
		}

		if ($usuario=="") {
			echo "Informe o login do Usuário.";
			return 0;
		}

		if ($senha=="") {
			echo "Informe a Senha do Usuário.";
			return 0;
		}		
		
		//inicia o comando SQL
		$sql = "SELECT * FROM usuario ";

		$sql = $sql . " WHERE login_usuario = '$usuario' ";
		$sql = $sql . "	AND senha_usuario = '$senha' ";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			header("location:../index.php");
			return 0;
		}

		if (mysqli_num_rows($resultado) > 0) {
			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_usuario"];
				$usuario = $row["nome_usuario"];
				$login = $row["senha_usuario"];
			}

			require_once("seguranca.php");

			incluirSession($id, $usuario, $login);			

			header("location:../areaadministrativa.php");
		}
		else
		{
			header("location:../index.php");
			return 0;
		}

	}	

	if ($operacao=="logar") {
		ValidarUsuario();
	}
	
?>