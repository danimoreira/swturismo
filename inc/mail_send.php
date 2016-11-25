<?php 
	
	function pegarValor($index) {
		return $_POST[$index];
	}


	function validarEmail($email){
		return filter_var($email);
	}

	function enviarEmail(){

		//recupera os campos
		$email_origem = pegarValor("contato_email");
		$assunto = pegarValor("assunto_email");
		$mensagem = pegarValor("mensagem");

		//valida o email
		validarEmail($email_origem);

		//preenche o headers
		$email_servidor = "up.mktdgt@gmail.com";
		
		$headers = "From: $email_origem\r\n" .
					"Reply-To: $email_servidor\r\n" .
					"X-Mailer: PHP/" . phpversion() . "\r\n";
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	    //envia o email
	    mail($email_origem, $assunto, nl2br($mensagem), $headers);

	    headers("location:contato.php");

	}

	enviarEmail();



 ?>