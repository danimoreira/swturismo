<?php  

	require_once("conexao.php");	

	$operacao = "";

	if (isset($_POST["operacao"])) {
		$operacao = $_POST["operacao"];
	}

	if (isset($_POST["tela_anterior"])) {
		$tela_anterior = $_POST["tela_anterior"];
	}

	function incluirTurista(){

		//inicia o comando SQL
		$sql = "INSERT INTO passageiro (";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "nome_passageiro,";
		$sql = $sql . "data_nasc_passageiro,";
		$sql = $sql . "tel_fixo_passageiro,";
		$sql = $sql . "tel_cel_passageiro,";
		$sql = $sql . "endereco_passageiro,";
		$sql = $sql . "bairro_passageiro,";
		$sql = $sql . "cidade_passageiro,";
		$sql = $sql . "cep_passgeiro,";
		$sql = $sql . "uf_passageiro,";
		$sql = $sql . "doc_rg_passageiro,";
		$sql = $sql . "doc_cpf_passageiro,";
		$sql = $sql . "email_passageiro,";
		$sql = $sql . "responsavel_passageiro";

		$sql = $sql . ") VALUES (";

		//recupera os valores preenchidos no formulário
		$nome_passageiro = $_POST["nome_passageiro"];
		$data_nasc_passageiro = $_POST["data_nasc_passageiro"];
		$tel_fixo_passageiro = $_POST["tel_fixo_passageiro"];
		$tel_cel_passageiro = $_POST["tel_cel_passageiro"];
		$endereco_passageiro = $_POST["endereco_passageiro"];
		$bairro_passageiro = $_POST["bairro_passageiro"];
		$cidade_passageiro = $_POST["cidade_passageiro"];
		$cep_passgeiro = $_POST["cep_passgeiro"];
		$uf_passageiro = $_POST["uf_passageiro"];
		$doc_rg_passageiro = $_POST["doc_rg_passageiro"];
		$doc_cpf_passageiro = $_POST["doc_cpf_passageiro"];
		$email_passageiro = $_POST["email_passageiro"];
		$responsavel_passageiro = $_POST["responsavel_passageiro"];

		//completa o comando SQL
		$sql = $sql . "'$nome_passageiro'";
		$sql = $sql . ",'$data_nasc_passageiro'";
		$sql = $sql . ",'$tel_fixo_passageiro'";
		$sql = $sql . ",'$tel_cel_passageiro'";
		$sql = $sql . ",'$endereco_passageiro'";
		$sql = $sql . ",'$bairro_passageiro'";
		$sql = $sql . ",'$cidade_passageiro'";
		$sql = $sql . ",'$cep_passgeiro'";
		$sql = $sql . ",'$uf_passageiro'";
		$sql = $sql . ",'$doc_rg_passageiro'";
		$sql = $sql . ",'$doc_cpf_passageiro'";
		$sql = $sql . ",'$email_passageiro'";
		$sql = $sql . ",$responsavel_passageiro";

		//encerra o comando SQL
		$sql = $sql .")";

		var_dump($sql);

		$conexao = conectar();

		if (executar($conexao, $sql)){
			header('location:../' .$_POST["tela_anterior"] .'?id=' .$_POST["id_passageiro"]);
			exibeMsg("Dados atualizados com sucesso!");
		}
		else {			
			header('location:../' .$_POST["tela_anterior"] .'?id=' .$_POST["id_passageiro"]);
			exibeMsg("Erro ao realizar a atualização dos dados do Turista!");	
		}
	}

	function alterarTurista(){

		//inicia o comando SQL
		$sql = "UPDATE passageiro SET ";

		//compõe os campos que serão afetados pelo SQL
		$sql = $sql . "nome_passageiro = '" .$_POST["nome_passageiro"] ."',";
		$sql = $sql . "data_nasc_passageiro= '" .$_POST["data_nasc_passageiro"] ."',";
		$sql = $sql . "tel_fixo_passageiro= '" .$_POST["tel_fixo_passageiro"] ."',";
		$sql = $sql . "tel_cel_passageiro= '" .$_POST["tel_cel_passageiro"] ."',";
		$sql = $sql . "endereco_passageiro= '" .$_POST["endereco_passageiro"] ."',";
		$sql = $sql . "bairro_passageiro= '" .$_POST["bairro_passageiro"] ."',";
		$sql = $sql . "cidade_passageiro= '" .$_POST["cidade_passageiro"] ."',";
		$sql = $sql . "cep_passgeiro= '" .$_POST["cep_passgeiro"] ."',";
		$sql = $sql . "uf_passageiro= '" .$_POST["uf_passageiro"] ."',";
		$sql = $sql . "doc_rg_passageiro= '" .$_POST["doc_rg_passageiro"] ."',";
		$sql = $sql . "doc_cpf_passageiro= '" .$_POST["doc_cpf_passageiro"] ."',";
		$sql = $sql . "email_passageiro= '" .$_POST["email_passageiro"] ."',";
		$sql = $sql . "responsavel_passageiro = " .$_POST["responsavel_passageiro"];

		$sql = $sql . " WHERE id_passageiro = " .$_POST["id_passageiro"];
		
		$conexao = conectar();

		if (executar($conexao, $sql)){
			header('location:../' .$_POST["tela_anterior"] .'?id=' .$_POST["id_passageiro"]);
			exibeMsg("Dados atualizados com sucesso!");
		}
		else {			
			header('location:../' .$_POST["tela_anterior"] .'?id=' .$_POST["id_passageiro"]);
			exibeMsg("Erro ao realizar a atualização dos dados do Turista!");	
		}

	}

	function excluirTurista(){

		//inicia o comando SQL
		$sql = "DELETE FROM passageiro ";
		$sql = $sql . " WHERE id_passageiro = " .$_POST["id_passageiro"];
		
		$conexao = conectar();
		if (executar($conexao, $sql)){
			header('location:../' .$_POST["tela_anterior"] .'?id=' .$_POST["id_passageiro"]);
			exibeMsg("Dados atualizados com sucesso!");
		}
		else {
			header('location:../' .$_POST["tela_anterior"] .'?id=' .$_POST["id_passageiro"]);
			exibeMsg("Erro ao realizar a exclusão dos dados do Turista!");	
		}

	}

	function recuperarProxID (){
		$sql = "SELECT id_passageiro FROM passageiro";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {

			while ($row = $resultado->fetch_assoc()) {
				$id = $row["id_passageiro"] +1;
			}

			return $id;
		}
		else
		{
			return 1;
		}
	}

	function recuperarTuristas (){
		$sql = "SELECT * FROM passageiro";

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {			
			return $resultado;
		}
		else
		{
			return 1;
		}
	}

	function recuperarTurista ($id){
		$sql = "SELECT * FROM passageiro WHERE id_passageiro = " .$id;

		$conexao = conectar();
		$resultado = selecionar($conexao, $sql);

		if (is_int($resultado)) {
			return 1;
		}

		if (mysqli_num_rows($resultado) > 0) {			
			return $resultado;
		}
		else
		{
			return 1;
		}
	}

	if ($operacao=="incluir") {
		incluirTurista();
	} elseif ($operacao=="alterar"){
		alterarTurista();
	} elseif ($operacao=="excluir"){
		excluirTurista();
	}

?>