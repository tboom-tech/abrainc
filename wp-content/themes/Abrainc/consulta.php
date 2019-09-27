<?php

	include_once('page-templates/config.php');
	include_once('page-templates/conection.php');
	include_once('page-templates/funcao.php');
	include_once('phpmailer/PHPMailerAutoload.php');

	$conn = DBConect();
	$email = $_POST['email'];

	$teste = DBQuery('wp_cadastro', "WHERE email = '$email' limit 1");

	if ($teste) {

		foreach ($teste as $fields) {
			$senha = $fields['senha'];
		}

		// $senha = DBQuery('wp_cadastro', "WHERE senha = '$senha'");	

		$html = 'Sua senha é: ' .$senha;

		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->SMTPDebug = 1;
		$mailer->Port = 587;
		$mailer->Host = 'mail.exchangecorp.com.br';
		$mailer->SMTPAuth = true;
		$mailer->Username = 'alexandre.yokota@tboom.net';
		$mailer->Password = '123@mergulhe';
		$mailer->setFrom('alexandre.yokota@tboom.net', 'Alexandre Yokota');
		$mailer->addAddress($email);
		$mailer->Subject = 'Recuperação de senha';
		$mailer->CharSet = 'UTF-8';
		$mailer->Body = $html;
		$mailer->IsHTML(true); 	

		if(!$mailer->Send()){
			echo '0';
		}else{
			echo '1';
		}
	}else{
		echo 'não encontrado';
	}	
	
?>