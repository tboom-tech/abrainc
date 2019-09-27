

<?php 
	
	/* Template Name: Recuperar Senha */
	
get_header();
get_template_part('common');

?>

<section>
	<div class="container">
		<div class="formulario">
			<div class="row">
				<div class="col-md-12">
					<form id="form_senha" name="form_senha">
						<p>Recuperar senha</p>
							<div class="agenda-nome">
								<label for="name">Informe seu e-mail *</label><br/>
								<input type="email" name="email" id="email_senha" class="input-form" />
							</div>
							<input type="button" name="Enviar" value="Entrar" class="bt_azul" onclick="RecuperaSenha('senha');">
					</form>
					<div id="sucesso-recuperar">
						<div class="msg-sucesso">
							<p class="icone-whats">
								Senha envia para o email
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

get_footer();