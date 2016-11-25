<?php  

	require_once("conexao.php");

	$operacao = "";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	function incluirViagem(){

		//inicia o comando SQL
		$sql = "INSERT INTO viagem (";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "nome_viagem";
		$sql = $sql . ",data_ida_viagem";
		$sql = $sql . ",data_retorno_viagem";
		$sql = $sql . ",valor_pacote_adulto";
		$sql = $sql . ",valor_pacote_infantil";
		$sql = $sql . ",descricao_viagem";
		$sql = $sql . ",img_url";		

		$sql = $sql . ") VALUES (";

		//recupera os valores preenchidos no formulário
		$nome_viagem = $_POST["nome_viagem"];
		$data_ida_viagem = $_POST["data_ida_viagem"];
		$data_retorno_viagem = $_POST["data_retorno_viagem"];
		$valor_pacote_adulto = $_POST["valor_pacote_adulto"];
		$valor_pacote_infantil = $_POST["valor_pacote_infantil"];
		$descricao_viagem = $_POST["descricao_viagem"];
		$img_url = $_POST["img_url"];
		
		//completa o comando SQL
		$sql = $sql . "'$nome_viagem'";
		$sql = $sql . ",'$data_ida_viagem'";
		$sql = $sql . ",'$data_retorno_viagem'";
		$sql = $sql . ",$valor_pacote_adulto";
		$sql = $sql . ",$valor_pacote_infantil";
		$sql = $sql . ",'$descricao_viagem'";
		$sql = $sql . ",'$img_url'";
		
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
		$sql = "SELECT id_viagem FROM viagem";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {

			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_viagem"] +1;
			}

			return $id;
		}
		else
		{
			return 1;
		}
	}

	function recuperarProxViagens () {
		$sql = "SELECT * FROM viagem WHERE data_ida_viagem > Now() Order By data_ida_viagem ASC LIMIT 4";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 0;
		}

		if (mysqli_num_rows($resultado) > 0) {
			return $resultado;
		}
		else
		{
			return 0;
		}
	}

	function recuperarViagensFuturas () {
		$sql = "SELECT * FROM viagem WHERE data_ida_viagem > Now() Order By data_ida_viagem ASC ";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 0;
		}

		if (mysqli_num_rows($resultado) > 0) {
			return $resultado;
		}
		else
		{
			return 0;
		}
	}

	function RecuperaViagem ($id) {
		$sql = "SELECT * FROM viagem WHERE id_viagem = $id";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 0;
		}

		if (mysqli_num_rows($resultado) > 0) {
			return $resultado;
		}
		else
		{
			return 0;
		}
	}

	if ($operacao=="incluir") {
		incluirViagem();
	}

?>