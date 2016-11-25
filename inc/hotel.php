<?php  

	require_once("conexao.php");

	$operacao = "";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	function incluirHotel(){

		//inicia o comando SQL
		$sql = "INSERT INTO hotel (";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "nome_hotel";
		$sql = $sql . ",endereco_hotel";
		$sql = $sql . ",bairro_hotel";
		$sql = $sql . ",cep_hotel";
		$sql = $sql . ",cidade_hotel";
		$sql = $sql . ",uf_hotel";
		$sql = $sql . ",contato_hotel";
		$sql = $sql . ",tel_hotel";
		$sql = $sql . ",site_hotel";	

		$sql = $sql . ") VALUES (";

		//recupera os valores preenchidos no formulário
		$nome_hotel = $_POST["nome_hotel"];
		$endereco_hotel = $_POST["endereco_hotel"];
		$bairro_hotel = $_POST["bairro_hotel"];
		$cep_hotel = $_POST["cep_hotel"];
		$cidade_hotel = $_POST["cidade_hotel"];
		$uf_hotel = $_POST["uf_hotel"];
		$contato_hotel = $_POST["contato_hotel"];
		$tel_hotel = $_POST["tel_hotel"];
		$site_hotel = $_POST["site_hotel"];

		//completa o comando SQL
		$sql = $sql . "'$nome_hotel'";
		$sql = $sql . ",'$endereco_hotel'";
		$sql = $sql . ",'$bairro_hotel'";
		$sql = $sql . ",'$cep_hotel'";
		$sql = $sql . ",'$cidade_hotel'";
		$sql = $sql . ",'$uf_hotel'";
		$sql = $sql . ",'$contato_hotel'";
		$sql = $sql . ",'$tel_hotel'";
		$sql = $sql . ",'$site_hotel'";
			
		//encerra o comando SQL
		$sql = $sql .")";

		var_dump($sql);

		$conexao = conectar();

		if (executar($conexao, $sql)){
			echo "Cadastro efetuado com sucesso!";
		}
		else {
			echo "Erro ao realizar o cadastro do Turista!";
		}

	}

	function recuperarProxID (){
		$sql = "SELECT id_hotel FROM hotel";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {

			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_hotel"] +1;
			}

			return $id;
		}
		else
		{
			return 1;
		}
	}

	if ($operacao=="incluir") {
		incluirHotel();
	}

?>