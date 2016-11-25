<?php  

	require_once("conexao.php");

	$operacao = "";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	function incluirTransporte(){

		//inicia o comando SQL
		$sql = "INSERT INTO transporte (";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "nome_transporte";
		$sql = $sql . ",modelo_transporte";
		$sql = $sql . ",descricao_transporte";
		$sql = $sql . ",qtd_lugares";
		$sql = $sql . ",id_empresa";	

		$sql = $sql . ") VALUES (";

		//recupera os valores preenchidos no formulário
		$nome_transporte = $_POST["nome_transporte"];
		$modelo_transporte = $_POST["modelo_transporte"];
		$descricao_transporte = $_POST["descricao_transporte"];
		$qtd_lugares = $_POST["qtd_lugares"];
		$id_empresa = $_POST["id_empresa"];
		
		if ($id_empresa=="")
			$id_empresa=0;

		//completa o comando SQL
		$sql = $sql . "'$nome_transporte'";
		$sql = $sql . ",'$modelo_transporte'";
		$sql = $sql . ",'$descricao_transporte'";
		$sql = $sql . ",$qtd_lugares";
		$sql = $sql . ",$id_empresa";
			
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
		$sql = "SELECT id_transporte FROM transporte";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {

			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_transporte"] +1;
			}

			return $id;
		}
		else
		{
			return 1;
		}
	}

	if ($operacao=="incluir") {
		incluirTransporte();
	}

?>