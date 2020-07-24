<?php 
	
	/* Template Name: Fale Conosco */
	
get_header();
get_template_part('common');

?>
	<section class="noticias artigos indicadores contato">
		<div class="bg-indicadores" style="background-image: url('<?php the_field('imagem'); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>
							Fale Conosco
							<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page-white.png">
						</h1>
					</div>
				</div>	
			</div>	
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-8 content-indicadores">
					<p class="desc_associe">Fortaleça o setor e contribuia para <br />o desenvolvimento sustentável<br />do país e de suas cidades.</p>
					<div class="bt-associe">
						<a data-toggle="modal" href="#associe-se">
							Associe-se
						</a>
					</div>
				</div>

				<div class="col-md-4 text-right logo-sobre">
					
				</div>
				<div class="col-md-6 content-indicadores">
					<p class="telefone">+55 11 <span>2737-1400</span></p>
					<p class="email">abrainc@abrainc.org.br</p>
				</div>

				<div class="col-md-6 text-right logo-sobre">
					<p>Esse canal dedica-se a esclarecer somente dúvidas sobre o setor de incorporação. Não fazemos ou intermediamos negócios. E não temos acesso ao banco de oportunidades de trabalho de nossos associados, portanto não encaminhamos currículos. Para outros tipos de demandas, por favor, dirigir-se diretamente às empresas de seu interesse.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<div class="redes-contato">
						<span>Siga-nos nas redes sociais</span>
						<a href="https://www.linkedin.com/company/abrainc/?originalSubdomain=pt" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/linkedin-contato.png">
						</a>
						<a href="https://www.facebook.com/ABRAINC/" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/facebook-contato.png">
						</a>					
						<a href="https://www.instagram.com/abraincoficial/" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/instagram-contato.png">
						</a>						
						<a href="https://twitter.com/abraincoficial" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/twitter-contato.png">
						</a>						
						<a href="https://www.youtube.com/channel/UCZkZpkd_yY7WDJKRPLOC9PA" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/youtube-contato.png">
						</a>	
					</div>				
				</div>
			</div>
		</div>
	</section>

	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>Envie uma mensagem</h2>
					<?php echo do_shortcode('[contact-form-7 id="7329" title="Fale Conosco"]' ); ?>
				</div>

				<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.6029186466712!2d-46.685317985619285!3d-23.582700684672265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5769b6478abf%3A0x682e43d4262cf172!2sR.+Iguatemi%2C+448+-+14%C2%BA+Andar+%E2%80%93+Cj.+1402+-+Itaim+Bibi%2C+S%C3%A3o+Paulo+-+SP%2C+01453-100%2C+Brasil!5e0!3m2!1spt-BR!2sit!4v1542602110821" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

					<!-- <p class="desc_associe">Fortaleça o setor e contribuia para <br />o desenvolvimento sustentável<br />do país e de suas cidades.</p>
					<div class="bt-associe">
						<a data-toggle="modal" href="#associe-se">
							Associe-se
						</a>
					</div> -->
				</div>				
			</div>
		</div>
	</section>

	<section id="newsletter" class="desktop">
		<div class="container">
			<div class="row content-news">
				<div class="col-md-2 no-padding">
					<h4>NEWSLETTER</h4>
					<p>Receba as principais notícias do mercado imobilário.</p>
				</div>

				<div class="col-md-10 form-news no-padding">
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-newsletter.jpg">
					<?php echo do_shortcode('[contact-form-7 id="5174" title="Cadastro Newsletter"]' ); ?>
				</div>
			</div>
		</div>
	</section>
<?php

get_footer(); ?>

<script>
	document.addEventListener('wpcf7mailsent', function(event) {
	 	window.dataLayer.push({
			 'event': 'gaTriggerEvent',
			 'gaEventCategory': 'conversao',
			 'gaEventAction': 'contato',
			 'gaEventLabel': 'email',
			 'formId' : event.detail.contactFormId,
			 'response' : event.detail.inputs
	 	})
	}); 
</script>