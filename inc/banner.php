<?php  

	require_once("conexao.php");

	$operacao = "";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	function incluirBanner(){

		//inicia o comando SQL
		$sql = "INSERT INTO banner (";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "titulo_banner";
		$sql = $sql . ",slogan_banner";
		$sql = $sql . ",img_url";
		$sql = $sql . ",link_banner";
		$sql = $sql . ",colortext";
		$sql = $sql . ",data_expiracao";
		$sql = $sql . ",ativo";	

		$sql = $sql . ") VALUES (";

		//recupera os valores preenchidos no formulário
		$titulo_banner = $_POST["titulo_banner"];
		$slogan_banner = $_POST["slogan_banner"];
		$img_url = $_POST["img_url"];
		$link_banner = $_POST["link_banner"];
		$colortext = $_POST["colortext"];
		$data_expiracao = $_POST["data_expiracao"];
		$ativo = $_POST["ativo"];

		$ativo="S";

		//completa o comando SQL
		$sql = $sql . "'$titulo_banner'";
		$sql = $sql . ",'$slogan_banner'";
		$sql = $sql . ",'$img_url'";
		$sql = $sql . ",'$link_banner'";
		$sql = $sql . ",'$colortext'";
		$sql = $sql . ",'$data_expiracao'";
		$sql = $sql . ",'$ativo'";
			
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

	function recuperarProxIDBanner (){
		$sql = "SELECT id_banner FROM banner";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {

			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_banner"] +1;
			}

			return $id;
		}
		else
		{
			return 1;
		}
	}

	function RecuperarBanner (){
		$sql = "SELECT * FROM banner WHERE data_expiracao > NOW() and ativo = 'S' LIMIT 4 ";

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
		incluirBanner();
	}

?>