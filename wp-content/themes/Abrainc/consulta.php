<?php

	include_once('page-templates/config.php');
	include_once('page-templates/conection.php');
	include_once('page-templates/funcao.php');
	include_once('phpmailer/PHPMailerAutoload.php');

	$conn = DBConect();
	$email = $_POST['email'];

	$teste = DBQuery('wp_cadastro', "WHERE Email = '$email' limit 1");

	if ($teste) {

		foreach ($teste as $fields) {
			$usuario = $fields['Usuário'];
			$senha = $fields['Senha'];
		}

		// $senha = DBQuery('wp_cadastro', "WHERE senha = '$senha'");	

		$html = 'Seu usuário é: ' .$usuario;
		$html .= '<br />Sua senha é: ' .$senha;

		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->SMTPDebug = 1;
		$mailer->Port = 587;
		$mailer->Host = 'email-ssl.com.br';
		$mailer->SMTPAuth = true;
		$mailer->Username = 'abrainc@domesmolado.com.br';
		$mailer->Password = '123@Abrainc!';
		$mailer->setFrom('abrainc@domesmolado.com.br', 'Abrainc');
		$mailer->addAddress($email);
		$mailer->Subject = 'Recuperação de senha.';
		$mailer->CharSet = 'UTF-8';
		$mailer->Priority   = 1;     
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