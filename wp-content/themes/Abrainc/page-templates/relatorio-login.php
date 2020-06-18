<?php
	session_start();

	if (isset($_SESSION['usuario_log'])) {
		header('Location: /relatorio-analitico-minha-casa-minha-vida/');
		die();
	}

	include_once ("config.php");
	include_once ("conection.php");
	include_once ("funcao.php");

	if (isset($_POST['entrar'])){
		$conn = DBConect();
		$usuario = mysqli_escape_string($conn, $_POST['usuario']);
		$senha = mysqli_escape_string($conn, $_POST['senha']);

		$teste = DBQuery('wp_cadastro', "WHERE Usuário = '$usuario' AND Senha = '$senha'");

		if ($teste){
			$_SESSION['usuario_log'] = true;
			header('Location: /relatorio-analitico-minha-casa-minha-vida/');
		}else {
			echo '<script type="text/javascript">alert("Usuário ou senha inválidos");</script>';
		}
	}
?>

<?php 
	
	/* Template Name: Relatório Login */
	
get_header();
get_template_part('common');

?>

	<section class="noticias artigos indicadores eventos estudos">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="relatorio">
							Relatório Analítico <br />Minha Casa Minha Vida
						</h1>
					</div>
					<div class="col-md-4 img-relatorio">
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-relatorio.png">
					</div>
				</div>	
			</div>	
	</section>

	<section>
		<div class="container">
			<div class="formulario-relatorio">
				<div class="row">
					<div class="col-md-12">
						<p class="intro">Para ter acesso, preencha os seus dados no formulário de cadastro;</p>
						<p class="intro">
						Após o primeiro cadastro, você terá acesso ao relatório analítico minha casa minha vida, inserindo login e senha no formulário abaixo:</p>
					</div>
					<div class="col-md-6">
						<form id="form_login" action="" method="POST">
							<p>Login</p>
								<div class="agenda-nome">
									
									<input type="text" name="usuario" placeholder="Usuário*" id="nome_relatorio" required />
								</div>
								<div class="agenda-email">	
									<input type="password" name="senha" placeholder="Senha*" id="email_login" required />
								</div>
								<div class="agenda-email">	
									<label for="email"><a href="/recuperar-senha/">Esqueci minha senha</a></label><input type="submit" name="entrar" value="Entrar" class="bt_azul">
								</div>
								
						</form>
					</div>
					<div class="col-md-6">
						<form name="form_cadastro" id="form_cadastro">
							<p>Cadastro</p>
								<div class="agenda-nome">
									<input type="text" name="name" placeholder="Nome *" id="nome_cadastro" class="input-form">
								</div>
								<div class="agenda-email">	
									<input type="text" name="email" placeholder="E-mail *" id="email_cadastro" class="input-form">
								</div>

								<div class="cel">
									<input type="text" name="telefone" placeholder="Celular *" id="telefone_cadastro" class="input-form">
								</div>

								<div class="cel">
									<input type="text" name="usuario" placeholder="Usuário *" id="login_cadastro" class="input-form">
								</div>

								<div class="cel">
									<input type="password" name="senha" placeholder="Senha *" id="senha_cadastro" class="input-form">
								</div>

								<div class="cel">
									<input type="text" name="profissao" placeholder="Profissão *" id="profissao_cadastro" class="input-form">
								</div>

								<input type="button" name="enviar" id="envia_email" class="bt_azul" value="enviar" onclick="EnviaCadastro('cadastro');">
						</form>
						<div id="sucesso-cadastro">
							<div class="msg-sucesso">
								<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/close.png" class="fechar">
								
								<p class="icone-whats">Cadastro Concluído com sucesso.</p>
								
								<form id="form_login" action="" method="POST">
									<p>Login</p>
										<div class="agenda-nome">
											<label for="name">Usuário *</label><br/>
											<input type="text" name="usuario" id="nome_relatorio" required />
										</div>
										<div class="agenda-email">	
											<label for="email">Senha *</label><br/>
											<input type="password" name="senha" id="email_login" required />
										</div>
										<div class="agenda-email">	
											<label for="email"><a href="/recuperar-senha/">Esqueci minha senha</a></label><br/>
										</div>
										<input type="submit" name="entrar" value="Entrar" class="bt_azul">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php

get_footer();