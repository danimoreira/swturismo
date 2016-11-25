<?php  

	require_once("conexao.php");

	$operacao = "";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	function incluirEmpresa(){

		//inicia o comando SQL
		$sql = "INSERT INTO empresa (";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "nome_empresa";
		$sql = $sql . ",endereco_empresa";
		$sql = $sql . ",bairro_empresa";
		$sql = $sql . ",cidade_empresa";
		$sql = $sql . ",cep_empresa";
		$sql = $sql . ",uf_empresa";
		$sql = $sql . ",tel_fixo_empresa";
		$sql = $sql . ",tel_celular_empresa";
		$sql = $sql . ",email_empresa";
		$sql = $sql . ",site_empresa";
		$sql = $sql . ",cnpj_empresa";
		$sql = $sql . ",data_fundacao_empresa";

		$sql = $sql . ") VALUES (";

		//recupera os valores preenchidos no formulário
		$nome_empresa = $_POST["nome_empresa"];
		$endereco_empresa = $_POST["endereco_empresa"];
		$bairro_empresa = $_POST["bairro_empresa"];
		$cidade_empresa = $_POST["cidade_empresa"];
		$cep_empresa = $_POST["cep_empresa"];
		$uf_empresa = $_POST["uf_empresa"];
		$tel_fixo_empresa = $_POST["tel_fixo_empresa"];
		$tel_celular_empresa = $_POST["tel_celular_empresa"];
		$email_empresa = $_POST["email_empresa"];
		$site_empresa = $_POST["site_empresa"];
		$cnpj_empresa = $_POST["cnpj_empresa"];
		$data_fundacao_empresa = $_POST["data_fundacao_empresa"];
		
		//completa o comando SQL
		$sql = $sql . "'$nome_empresa'";
		$sql = $sql . ",'$endereco_empresa'";
		$sql = $sql . ",'$bairro_empresa'";
		$sql = $sql . ",'$cidade_empresa'";
		$sql = $sql . ",'$cep_empresa'";
		$sql = $sql . ",'$uf_empresa'";
		$sql = $sql . ",'$tel_fixo_empresa'";
		$sql = $sql . ",'$tel_celular_empresa'";
		$sql = $sql . ",'$email_empresa'";
		$sql = $sql . ",'$site_empresa'";
		$sql = $sql . ",'$cnpj_empresa'";
		$sql = $sql . ",'$data_fundacao_empresa'";
			
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


	function alterarEmpresa (){

		//inicia o comando SQL
		$sql = "UPDATE empresa SET ";

		//recupera os valores preenchidos no formulário
		$id_empresa = $_POST["id_empresa"];
		$nome_empresa = $_POST["nome_empresa"];
		$endereco_empresa = $_POST["endereco_empresa"];
		$bairro_empresa = $_POST["bairro_empresa"];
		$cidade_empresa = $_POST["cidade_empresa"];
		$cep_empresa = $_POST["cep_empresa"];
		$uf_empresa = $_POST["uf_empresa"];
		$tel_fixo_empresa = $_POST["tel_fixo_empresa"];
		$tel_celular_empresa = $_POST["tel_celular_empresa"];
		$email_empresa = $_POST["email_empresa"];
		$site_empresa = $_POST["site_empresa"];
		$cnpj_empresa = $_POST["cnpj_empresa"];
		$data_fundacao_empresa = $_POST["data_fundacao_empresa"];

		//compões os campos/valores para alterar os dados da empresa
		$sql = $sql . "nome_empresa='$nome_empresa'";
		$sql = $sql . ",endereco_empresa='$endereco_empresa'";
		$sql = $sql . ",bairro_empresa='$bairro_empresa'";
		$sql = $sql . ",cidade_empresa='$cidade_empresa'";
		$sql = $sql . ",cep_empresa='$cep_empresa'";
		$sql = $sql . ",uf_empresa='$uf_empresa'";
		$sql = $sql . ",tel_fixo_empresa='$tel_fixo_empresa'";
		$sql = $sql . ",tel_celular_empresa='$tel_celular_empresa'";
		$sql = $sql . ",email_empresa='$email_empresa'";
		$sql = $sql . ",site_empresa='$site_empresa'";
		$sql = $sql . ",cnpj_empresa='$cnpj_empresa'";
		$sql = $sql . ",data_fundacao_empresa='$data_fundacao_empresa'";

		//filtra a condição para atualização pelo ID
		$sql = $sql . "WHERE id_empresa=$id_empresa";

		$conexao = conectar();

		if (executar($conexao, $sql)){
			echo "Atualização realizada com sucesso!";
		}
		else {
			echo "Erro ao realizar o cadastro do Turista!";
		}

	}

	function recuperarID (){
		$sql = "SELECT id_empresa FROM empresa";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 0;
		}

		if (mysqli_num_rows($resultado) > 0) {

			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_empresa"];
			}

			return $id;
		}
		else
		{
			return 0;
		}
	}

	if ($operacao=="incluir") {
		if (recuperarID() > 0) {
			alterarEmpresa();
		}
		else {
			incluirEmpresa();
		}
	}

?>