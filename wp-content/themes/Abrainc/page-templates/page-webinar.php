<?php 
	
	/* Template Name: Webinar */
	
get_header();
get_template_part('common');

?>


<section class="webinar">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>RESERVE SUA AGENDA E JUNTE-SE</h2>

				<h3>ABRAINC CONVIDA PARA FÓRUM</h3>

				<p class="futuro"> Futuro da Securitização no Crédito Imobiliário </p>

				<p class="dia">TERÇA - 11/8 - 16h30 às 18h</p>

				<div class="row palestrantes">
					<div class="col-md-5">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/rubens.png">
						<p class="title">Rubens Menin</p>
						<p>MRV Engenharia e conselheiro abrainc</p>
					</div>
					<div class="col-md-5">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/luiz.png">
						<p class="title">luiz frança</p>
						<p>presidente abrainc</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-webinar">
					<p>Deixe seu nome e e-mail para a confirmar a sua inscrição</p>
					<?php echo do_shortcode('[contact-form-7 id="18789" title="Webinar"]'); ?>
				</div>
			</div>
		</div>
		<div class="row bg-webinar">
			<div class="col-md-6">
				<p class="aguarde">AGUARDE A PROGRAMAÇÃO COMPLETA COM OS CONVIDADOS DO MERCADO FINANCEIRO E DO GOVERNO. </p>
			</div>
		</div>
	</div>
</section>
<?php

get_footer();